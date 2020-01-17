import React, {useState} from 'react';

function Opcion (props) {
	const {
		opcion,
		cambiarPuntaje,
		puntajeGuardar,
		errorGuardar,
		vidasGuardar,
		vidas,
		puntaje,
		error
	} = props;
	
	const activarOpcion = () => {
		if(opcion.of_course){
			puntajeGuardar(vidas)
		}else{
			errorGuardar(error+1)
			vidasGuardar(vidas-1)
		}
		// console.log(vidas)
	}

	return (
		<div className={`col-sm-4 p-3 text-center`}
			onClick={()=>(activarOpcion())}
		>
			<h2 className="p-3 border text-white module-hover-shadow">{opcion.name}</h2>
		</div>
	);
}

export default Opcion;