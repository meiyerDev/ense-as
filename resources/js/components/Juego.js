import React, { useState,useEffect } from 'react';

import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faHome } from '@fortawesome/free-solid-svg-icons';

import ReactLoading from 'react-loading';
import SweetAlert from 'sweetalert2-react';

import Opcion from './Opcion';
import Respuesta from './Respuesta';
import Vidas from './Vidas';


function Juego(props) {
	const { 
		juego,
		estudiante,
		testActivo,
		activarTest,
		crearPreguntarJuego
	} = props

	const [opciones,opcionesGuardar] = useState([]);
	const [usados,usadosGuardar] = useState([]);
	const [respuesta,respuestaGuardar] = useState(0);
	const [aprender,aprenderGuardar] = useState({});
	const [puntaje,puntajeGuardar] = useState(0);
	const [error,errorGuardar] = useState(0);
	const [vidas,vidasGuardar] = useState(3);
	const [loader,activarLoader] = useState(false);
	const [alert,activarAlert] = useState(false);

	const crearOpciones = async () => {
		activarLoader(true);
		let res = await fetch(`http://${window.location.host}/api/modulo/${juego.id}/opciones`);
		let data = await res.json();

		if(data[2]!==null){
			opcionesGuardar(data[0]);
			respuestaGuardar(data[2]);
			activarLoader(false);
		}else{
			activarLoader(false);
			activarAlert(true);
		}
	}

	const cambiarPuntaje = async puntaje => {
		vidasGuardar(3);
		let res = await fetch(`http://${window.location.host}/api/modulo/${juego.id}/estudiante/${estudiante.id}/puntaje/${puntaje}/respuesta/${respuesta}`);
		let data = await res.json();
		// console.log(data);
	}

	const crearTutorial = async () => {
		activarLoader(true);
		let res = await fetch(`http://${window.location.host}/api/modulo/${juego.id}/aprender/${respuesta}`);
		let data = await res.json();
		respuestaGuardar(data[1]);
		aprenderGuardar(data[0][0]);
		activarLoader(false);
	}

	const retrocederTutorial = async () => {
		activarLoader(true);
		let res = await fetch(`http://${window.location.host}/api/modulo/${juego.id}/aprender/${respuesta-2}`);
		let data = await res.json();
		respuestaGuardar(data[1]);
		// console.log(`Sigue: ${(juego.max_options < respuesta)}`);
		aprenderGuardar(data[0][0]);
		activarLoader(false);
	}

	useEffect(()=>{
		if(testActivo){
			if( puntaje > 0){
				cambiarPuntaje(puntaje)
			}
			crearOpciones()
		}else{
			crearTutorial()
		}
	},[puntaje])


	return (
		<div className="row">
			{(loader)
				? <div className="col-sm-12 centrar-loader">
						<ReactLoading type="spinningBubbles" />
					</div>
			 :
			 	(alert)
			 	? <div className="col-sm-12 centrar-loader">
						<SweetAlert
							show={alert} 
							title="¡Felicidades!"
							text="Ya has Finalizado el Módulo"
							onConfirm={() => {
								activarAlert(false);
								activarTest(false);
								crearPreguntarJuego(true);
							}}
						/>
					</div>
			 	:
			 	 null}
			<div className="col-sm-12 row">
				<div className="col-sm-3">
					<button
						title="Cambiar Juego"
						className="btn btn-lg btn-success"
						onClick={()=>{
							crearPreguntarJuego(true);
						}}
					><h3><FontAwesomeIcon icon={faHome} size="lg"/></h3></button>
				</div>
				<div className="col-sm-6"></div>
				<div className="col-sm-3 row">
					{(testActivo)
						?
							<Vidas
								vidas={vidas}
							/>
						:
							null
					}
				</div>
			</div>
			<div className="col-sm-12 text-center">
				<img src={`${juego.link}${respuesta}.gif`} alt="" height="400"/>
			</div>
			<div className="col-sm-12 mt-3 row justify-content-center">
				{(testActivo)
					?
						opciones.map(opcion => (
							<Opcion
								key={opcion.id}
								opcion={opcion}
								respuesta={respuesta}
								puntaje={puntaje}
								puntajeGuardar={puntajeGuardar}
								vidas={vidas}
								vidasGuardar={vidasGuardar}
								error={error}
								errorGuardar={errorGuardar}
							/>
						))
					:
						<Respuesta
							juego={juego}
							aprender={aprender}
							crearTutorial={crearTutorial}
							retrocederTutorial={retrocederTutorial}
						/>
				}
			</div>
		</div>
		);
}

export default Juego;