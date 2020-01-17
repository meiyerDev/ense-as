import React, { useState,useEffect,Fragment } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import { faArrowAltCircleLeft,faArrowAltCircleRight } from '@fortawesome/free-solid-svg-icons'


function Respuesta (props) {

	const {
		juego,
		aprender,
		crearTutorial,
		retrocederTutorial
	} = props;

	const [atrasButton, atrasButtonGuardar] = useState(false);
	const [sigButton, sigButtonGuardar] = useState(true);

	useEffect(() => {
		if(aprender.id > 1){
			// console.log(`activarAtras: ${aprender.id}`)
			atrasButtonGuardar(true);
		}else{
			// console.log(`desactivarAtras: ${aprender.id}`)
			atrasButtonGuardar(false);
		}

		if(!(juego.max_options > aprender.id)){
			// console.log(`desactivarSig: ${aprender.id}`)
			sigButtonGuardar(false)
		}else{
			// console.log(`${(juego.max_options === aprender.id)}`)
			// console.log(`max_options: ${juego.max_options}`)
			// console.log(`activarSig: ${aprender.id}`)
			sigButtonGuardar(true)
		}

	},[juego,aprender])

	return (
		<Fragment>
			<div className="col-sm-4 p-3 text-center">
				<button
					className="btn btn-lg btn-success"
					title="Anterior"
					disabled={!atrasButton}
					onClick={()=>(retrocederTutorial())}
				><h1><FontAwesomeIcon icon={faArrowAltCircleLeft} size="lg"/></h1></button>
			</div>

			<div className="col-sm-4 p-3 text-center">
				<h1 className="h1 text-white respuesta-shadow">{aprender.name}</h1>			
			</div>
			
			<div className="col-sm-4 p-3 text-center">
				<button
					title="Siguiente"
					className="btn btn-lg btn-success"
					disabled={!sigButton}
					onClick={()=>(crearTutorial())}
				><h1><FontAwesomeIcon icon={faArrowAltCircleRight} size="lg"/></h1></button>
			</div>
		</Fragment>
	);
}

export default Respuesta;