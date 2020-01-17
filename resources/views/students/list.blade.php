@extends('layouts.template')

@section('my_css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatable/datatables.min.css') }}"/>
@endsection

@section('content')

<div class="col-sm-12 container-fluid">
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
						<th>Fecha de Nacimiento</th>
						<th>Representante</th>
						<th>Teléfono</th>
						<th>Grado - Sección</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					@foreach ($students as $student)
						<tr>
							<td>{{ $student->id }}</td>
							<td>{{ $student->firstname }}</td>
							<td>{{ $student->lastname }}</td>
							<td>{{ $student->finish }}</td>
							<td>{{ $student->representant }}</td>
							<td>{{ $student->mobileno }}</td>
							<td>{{ $student->curse->grade }} - {{ $student->curse->section }}</td>
							<td><a href="{{ route('student.view',$student->id) }}" class="btn btn-info">Ver Información</a></td>
						</tr>
					@endforeach
				</tbody>
			</table>
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