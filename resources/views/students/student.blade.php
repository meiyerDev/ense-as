@extends('layouts.template')

@section('my_css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatable/datatables.min.css') }}"/>
@endsection

@section('content')

	<div class="form-group col-lg-2 col-md-2 col-sm-12">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>Cédula</h5>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			{{ $student->identity }}
		</div>
	</div>

	<div class="form-group col-lg-3 col-md-3 col-sm-12">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>Nombre Completo</h5>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			{{ $student->firstname }} {{ $student->lastname }} 
		</div>
	</div>

	<div class="form-group col-lg-2 col-md-2 col-sm-12">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>Género</h5>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			@if ($student->gender == 'Masculino')
				Masculino
				{{-- expr --}}
			@else
				Femenino
			@endif
		</div>
	</div>

	<div class="form-group col-lg-3 col-md-3 col-sm-3">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>Fecha de Nacimiento</h5>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			{{ $student->finish }}
		</div>
	</div>

	<div class="form-group col-lg-3 col-md-3 col-sm-3">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>Representante</h5>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			{{ $student->representant }}
		</div>
	</div>

	<div class="form-group col-lg-3 col-md-3 col-sm-3">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>Número de teléfono</h5>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			{{ $student->mobileno }}
		</div>
	</div>

	<div class="form-group col-lg-3 col-md-3 col-sm-3">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>Curso</h5>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			{{ $student->curse->grade }} Grado Sección {{ $student->curse->section }}
		</div>
	</div>
	<div class="form-group col-lg-3 col-md-3 col-sm-3">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>Dirección</h5>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			{{ $student->address }}
		</div>
	</div>

	<div class="form-group col-lg-12 col-md-12 col-sm-12">
		<a class="btn btn-info" href="#" data-toggle="modal" data-target="#EditarEstudiante">Editar Estudiante</a>
	</div>

<div id="EditarEstudiante" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <form action="{{ route('student.send.edit',$student->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <i class="educate-icon educate-checked modal-check-pro"></i>
                <h2>{{ $student->firstname }}</h2>
                	<div class="row">
                		<div class="form-group col-sm-6">
                			<label for="identity">Cédula de Indentidad</label>
                			<input
                				type="text"
                				id="identity"
                				name="identity"
                				class="form-control"
                				readonly=""
                				value="{{ $student->identity ?: 'No Posee.' }}"
                			>
                		</div>
                		<div class="form-group col-sm-6">
                			<label for="firstname">Nombres</label>
                			<input
                				type="text"
                				id="firstname"
                				name="firstname"
                				class="form-control"
                				value="{{ $student->firstname }}"
                			>
                		</div>
                 		<div class="form-group col-sm-6">
                			<label for="lastname">Apellidos</label>
                			<input
                				type="text"
                				id="lastname"
                				name="lastname"
                				class="form-control"
                				value="{{ $student->lastname }}"
                			>
                		</div>
                		<div class="form-group col-sm-6">
                			<label for="mobileno">Teléfono</label>
                			<input
                				type="text"
                				id="mobileno"
                				name="mobileno"
                				class="form-control"
                				value="{{ $student->mobileno }}"
                			>
                		</div>
                		<div class="form-group col-sm-6">
											<label for="address">Dirección</label>
											<textarea
												class="form-control"
												id="address"
												name="address"
												cols="30"
												rows="10"
											>{{ $student->address }}</textarea>
                		</div>
                		<div class="form-group col-sm-6">
                        <label for="curse" class="form-control-label">Curso</label>
                        <select
                          name="curse_id"
                          id="curse"
                          class="form-control"
                          required=""
                        >
                          <option value="none" disabled="">Seleccionar Curso</option>
                          @foreach ($curses as $curse)
	                          <option value="{{ $curse->id }}" @if ($student->curse->id == $curse->id) selected="" @endif>{{ $curse->grade }} Grado Sección {{ $curse->section }}</option>
                          @endforeach
                        </select>
                      </div>
                	</div>
            </div>
            <div class="modal-footer">
                <a data-dismiss="modal" class="btn btn-danger" href="#">Cancel</a>
                <button type="submit" class="btn btn-success">Editar</a>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('my_js')
<!-- data table JS
============================================ -->
 
<script type="text/javascript" src="{{ asset('plugins/datatable/datatables.min.js') }}"></script>
<script>
	$(document).ready(() =>{
		$('#listadoEstudiantes').DataTable();
	})
</script>

@endsection