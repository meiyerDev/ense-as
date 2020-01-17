import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';

import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faTrashRestore, faPowerOff } from '@fortawesome/free-solid-svg-icons';

import PreguntarEstudiante from './components/PreguntarEstudiante';
import Modulo from './components/Modulo';
import BotonTest from './components/BotonTest';
import Juego from './components/Juego';

export default function Index() {

	const [preguntarEstudiante, guardarPreguntarEstudiante] = useState(true);
	const [estudiantes, crearEstudiantes] = useState([]);
	const [estudianteActivo, guardarEstudianteActivo] = useState({});

	const [datosModulo, crearDatosModulo] = useState([]);
	
	const [juego, crearJuego] = useState({});
	const [preguntarJuego, crearPreguntarJuego] = useState(true);
	
	const [testActivo, activarTest] = useState(false);

	const cargarEstudiantes = async () => {
		let res = await fetch(`http://${window.location.host}/api/estudiantes`);
		let data = await res.json();
		crearEstudiantes(data);
		// console.log(data)
	}

	const cargarModulos = async id => {
		let res = await fetch(`http://${window.location.host}/api/modulos/${id}`);
		let data = await res.json();
		crearDatosModulo(data);
		// console.log(data)
	}

	const reiniciarJuego = async () => {
		let res = await fetch(`http://${window.location.host}/api/puntaje/reiniciar/${estudianteActivo.id}`)
		let data = await res.json();
		cargarModulos(estudianteActivo.id)
	}

	const cambiarJugador = () => {
		guardarEstudianteActivo({});
		crearDatosModulo([]);
		activarTest(false);
		guardarPreguntarEstudiante(true);
	}

	useEffect(()=>{
		if(preguntarEstudiante){
			cargarEstudiantes()
		}else{
			cargarModulos(estudianteActivo.id)
		}

	},[preguntarEstudiante, preguntarJuego])

  return (
    <div className="container App">
    	{
    		(preguntarEstudiante)

					? <PreguntarEstudiante
							estudiantes={estudiantes}
							guardarPreguntarEstudiante={guardarPreguntarEstudiante}
							guardarEstudianteActivo={guardarEstudianteActivo}
						/>

					: (preguntarJuego)
						
						?	
							<div className="mt-2">
								<button
									className="btn btn-lg btn-success ml-n5"
									title="Cambiar Jugador"
									onClick={()=>(cambiarJugador())}
								>
									<h3>
										<FontAwesomeIcon icon={faPowerOff} size="lg"/>
									</h3>
								</button>

				    	 	<button
									className="btn btn-lg btn-success float-right ml-1 mr-n5"
									title="Reiniciar Puntaje"
									onClick={()=>(reiniciarJuego())}
								>
									<h3>
										<FontAwesomeIcon icon={faTrashRestore} size="lg"/>
									</h3>
								</button>
			    	
				    	 	<div className="row mt-n5 ml-3 text-center justify-content-center">
				    	  	{datosModulo.map(dato => (
						    		<Modulo
						    			key={dato.id}
											dato={dato}
											testActivo={testActivo}
											crearJuego={crearJuego}
											crearPreguntarJuego={crearPreguntarJuego}
						    		/>
				    			))}
							    <BotonTest
										activarTest={activarTest}
										testActivo={testActivo}
							    />
				    	 	</div>
			    	 	</div>
			    	: (
			    			<div className="mt-1">
				    			<Juego
				    				juego={juego}
				    				estudiante={estudianteActivo}
				    				testActivo={testActivo}
				    				activarTest={activarTest}
				    				crearPreguntarJuego={crearPreguntarJuego}
				    			/>
			    			</div>
			    	  )
	    }
    </div>
  );
}

if (document.getElementById('root')) {
	ReactDOM.render(<Index />, document.getElementById('root'));
}