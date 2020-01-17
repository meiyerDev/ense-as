@extends('layouts.template')

@section('my_css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatable/datatables.min.css') }}"/>
@endsection

@section('content')
<div class="col-lg-2 col-md-2 col-sm-3 col-xs-6">
	<img src="{{ $teacher->imageico ?: asset('assets/img/contact/1.jpg') }}" alt="" width="150">
</div>

	<div class="form-group col-lg-2 col-md-2 col-sm-12">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>Cédula</h5>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			{{ $teacher->identity }}
		</div>
	</div>

	<div class="form-group col-lg-3 col-md-3 col-sm-12">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>Nombre Completo</h5>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			{{ $teacher->firstname }}
		</div>
	</div>

	<div class="form-group col-lg-2 col-md-2 col-sm-12">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>Género</h5>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			@if ($teacher->gender == 'M')
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
			{{ $teacher->finish }}
		</div>
	</div>

	<div class="form-group col-lg-3 col-md-3 col-sm-3">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>Correo Electrónico</h5>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			{{ $teacher->email }}
		</div>
	</div>

	<div class="form-group col-lg-3 col-md-3 col-sm-3">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>Número de teléfono</h5>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			{{ $teacher->mobileno }}
		</div>
	</div>

	<div class="form-group col-lg-3 col-md-3 col-sm-3">
		<div class="col-lg-12 col-md-12 col-sm-12">
			<h5>Curso</h5>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12">
			{{ $teacher->curse->grade }} Grado Sección {{ $teacher->curse->section }}
		</div>
	</div>

	<div class="form-group col-lg-3 col-md-3 col-sm-3">
		<a class="btn btn-info" href="#" data-toggle="modal" data-target="#EditarProfesor">Editar Profesor(a)</a>
	</div>



<div class="col-sm-12 container-fluid"><br>
	<div class="row">
		<div class="col-sm-12">
			<h2>Listado de Estudiantes</h2>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 table-responsive">
			<table id="listadoEstudiantes">
				<thead>
					<tr>
						<th>ID</th>
						<th>Nombres</th>
						<th>Apellidos</th>
						<th>Edad</th>
						<th>Representante</th>
						<th>Teléfono</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@if (!empty($teacher->curse) && !empty($teacher->curse->students))
					@foreach ($teacher->curse->students as $student)
						<tr>
							<td>{{ $student->id }}</td>
							<td>{{ $student->firstname }}</td>
							<td>{{ $student->lastname }}</td>
							<td>{{ $student->finish }}</td>
							<td>{{ $student->representant }}</td>
							<td>{{ $student->mobileno }}</td>
							<td><a href="{{ route('student.view',$student->id) }}" class="btn btn-info">Ver Información</a></td>
						</tr>
					@endforeach
					@endif
				</tbody>
			</table>
		</div>
	</div>
</div>

<div id="EditarProfesor" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-close-area modal-close-df">
                <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
            </div>
            <form action="{{ route('teacher.send.edit',$teacher->id) }}" method="POST">
            @csrf
            <div class="modal-body">
                <i class="educate-icon educate-checked modal-check-pro"></i>
                <h2>{{ $teacher->firstname }}</h2>
                	<div class="row">
                		<div class="form-group col-sm-6">
                			<label for="identity">Cédula de Indentidad</label>
                			<input
                				type="text"
                				id="identity"
                				name="identity"
                				class="form-control"
                				readonly=""
                				value="{{ $teacher->identity }}"
                			>
                		</div>
                		<div class="form-group col-sm-6">
                			<label for="firstname">Nombre Completo</label>
                			<input
                				type="text"
                				id="firstname"
                				name="firstname"
                				class="form-control"
                				value="{{ $teacher->firstname }}"
                			>
                		</div>
                		<div class="form-group col-sm-6">
                			<label for="email">Correo Electrónico</label>
                			<input
                				type="text"
                				id="email"
                				name="email"
                				class="form-control"
                				readonly=""
                				value="{{ $teacher->email }}"
                			>
                		</div>
                		<div class="form-group col-sm-6">
                			<label for="mobileno">Teléfono</label>
                			<input
                				type="text"
                				id="mobileno"
                				name="mobileno"
                				class="form-control"
                				value="{{ $teacher->mobileno }}"
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
											>{{ $teacher->address }}</textarea>
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
	                          <option value="{{ $curse->id }}" @if ($teacher->curse->id == $curse->id) selected="" @endif>{{ $curse->grade }} Grado Sección {{ $curse->section }}</option>
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