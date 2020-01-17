import React, {Fragment,useState,useEffect} from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faHeart,faHeartBroken } from '@fortawesome/free-solid-svg-icons';

function Vidas(props) {

	const {
		vidas
	} = props;

	const [icons,iconsGuardar] = useState([]);

	useEffect(()=>{
		let ic = [];
		if(vidas < 2){
			ic.push({key:1,heart:true},{key:2,heart:false},{key:3,heart:false});
		}else if(vidas < 3){
			ic.push({key:1,heart:true},{key:2,heart:true},{key:3,heart:false});
		}else{
			ic.push({key:1,heart:true},{key:2,heart:true},{key:3,heart:true});
		}

		iconsGuardar(ic);

	},[vidas])

	return (
		<Fragment>
			{icons.map(icon=>(
				<span className="btn btn-lg btn-danger col-sm-3 m-1 text-center">
					<h4>
						{(icon.heart)
							?
								<FontAwesomeIcon icon={faHeart} size="lg"/>
							
							:
								<FontAwesomeIcon icon={faHeartBroken} size="lg"/>
						}
					</h4>
				</span>
			))}
		</Fragment>
	);
};

export default Vidas;