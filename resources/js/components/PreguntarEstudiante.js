import React from 'react';
import Estudiante from './Estudiante';

function PreguntarEstudiante (props) {
		const {
			estudiantes,
			guardarPreguntarEstudiante,
			guardarEstudianteActivo
		} = props;

		const activarEstudiante = estudiante => {
			guardarEstudianteActivo(estudiante);
			guardarPreguntarEstudiante(false);
		}

		return (
			<div className="row mt-4 text-center justify-content-center">
				{estudiantes.map(est => (
					<Estudiante
						key={est.id}
						estudiante={est}
						activarEstudiante={activarEstudiante}
					/>
				))}
			</div>
		);
}

export default PreguntarEstudiante