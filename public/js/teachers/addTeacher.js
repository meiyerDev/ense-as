$(document).ready( () => {

	$('#finish').datepicker({
    format: "dd-mm-yyyy",
    endDate: "today",
    startView: 2,
    language: "es",
    autoclose: true,
    todayHighlight: true
	});

	$.ajax({
		url : `/admin/ajax/curse/all`,
		method : 'GET',
		success : response => {
			if (response.length > 0) {
				$.each(response,(r,curse)=>{
					$('select[name="curse_id"]').append(`<option value="${curse.id}">${curse.grade} grado - sección ${curse.section}</option>`)
				})
			}else{
				Swal.fire({
					type: 'warning',
	        title: 'Error',
	        text: 'Debe Cargar Al menos Un Curso.',
	      }).then(result => {
       		window.location = `/home`; 
	      });
			}
		},
		error: e => {
			Swal.fire({
				type: 'error',
        title: 'Error',
        text: 'Ha fallado la Conexión, por favor Recargue la pagina.',
      }).then(result => {
      	window.location.reload();
      });
		}
	})

	$('form').submit( e => {
		// Tomar los Password
		let password = $('input[name="password"]').val();
		let passwordConf = $('input[name="confarmpassword"]').val();

		// Verificar que sean iguales
		if(!(password === passwordConf)) {
			e.preventDefault();
			Swal.fire({
				type: 'error',
        title: 'Error',
        text: 'Las Contraseñas no Coinciden.',
      });
			return;
		}

	})

})
