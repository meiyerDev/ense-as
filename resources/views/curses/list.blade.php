@extends('layouts.template')

@section('my_css')
<link rel="stylesheet" type="text/css" href="{{ asset('plugins/datatable/datatables.min.css') }}"/>
@endsection

@section('content')

<div class="col-sm-12">
	<h2>Listado de Cursos</h2>
</div>
<div class="col-sm-12 table-responsive">

	<table id="listadoCursos" class="table table-hover table-striped">
		<thead>
			<tr>
				<td>ID</td>
				<td>GRADO</td>
				<td>SECTION</td>
				<td>ACCIÓN</td>
			</tr>
		</thead>
		<tbody>
			@foreach ($curses as $curse)
				<tr>
					<td>{{ $curse->id }}</td>
					<td>{{ $curse->grade }}</td>
					<td>{{ $curse->section }}</td>
					<td><a href="{{ route('curses.edit',$curse->id) }}" class="btn btn-info">Editar</a></td>
				</tr>
			@endforeach
		</tbody>
	</table>
	
</div>
@endsection


@section('my_js')
<!-- data table JS
============================================ -->
 
<script type="text/javascript" src="{{ asset('plugins/datatable/datatables.min.js') }}"></script>
<script>
	$(document).ready(() =>{
		$('#listadoCursos').DataTable();
	})
</script>

@endsection