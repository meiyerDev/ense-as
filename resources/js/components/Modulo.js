import React from 'react';

function Modulo (props) {

	const {
		dato,
		crearJuego,
		crearPreguntarJuego,
		testActivo
	} = props;

	const activarJuego = () => {
		crearJuego(dato);
		crearPreguntarJuego(false);
		// console.log('¡A Jugar!')
	}

	return (
		<span className="col-sm-5 col-md-4 col-lg-3 py-3">
			<img src={`${dato.link}0.png`} className="module-hover-shadow" alt="" height="200"
				onClick={()=>(activarJuego())}
			/>
			{(testActivo)
				?	<div className="my-1 py-1 h4 text-white">
						{`${dato.score}/${dato.max_options*3}`}
					</div>
				:
					null
			}
  		
  	</span>
	)

}

export default Modulo;