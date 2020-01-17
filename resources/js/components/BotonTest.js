import React from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faCogs,faGamepad } from '@fortawesome/free-solid-svg-icons';

function BotonTest (props){

		const {
			activarTest,
			testActivo
		}  = props;

		return (
			<div className="col-12 row justify-content-center my-3 custom-control custom-switch">
	  		<span className="text-white col-sm-1 mr-5 h3">
			  	<FontAwesomeIcon icon={faCogs} size="lg"/>
	  		</span>
	  		<input
			  	type="checkbox"
			  	className="custom-control-input col-sm-1"
					name="practica"
					id="practica"
					onChange={()=>(activarTest(!testActivo))}
					checked={testActivo}
			  />
			  <label className="custom-control-label h3 text-white col-sm-1" htmlFor="practica" title="Activar Juego">
	  			<FontAwesomeIcon icon={faGamepad} size="lg"/>
			  </label>
			</div>
		);
}

export default BotonTest;