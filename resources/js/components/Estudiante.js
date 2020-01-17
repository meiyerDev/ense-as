import React from 'react';

function Estudiante (props){
		const {
			estudiante,
			activarEstudiante
		} = props;


		return (
			<div className="col-sm-12 col-md-3 text-center text-white module-hover-shadow mt-1"
				onClick={()=>(activarEstudiante(estudiante))}
			>
				<img src="/recursosJuego/avatar.png" className="img-fluid rounded w-75" alt={estudiante.firstname}/>
				<h3 className="h3">{estudiante.firstname}</h3>
			</div>
		);
}

export default Estudiante;