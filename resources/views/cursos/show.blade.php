@extends('layouts.base')

@section('titulo')
    <title>Datos del curso - SIAHO</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Información del curso', 'tituloModulo' => 'Cursos', 'rutaModulo' => URL::route('cursos.index'), 'tituloSubmodulo' => 'Información del curso'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box table-responsive">
			{!! Form::open(['route' => ['cursos.destroy', $curso->id], 'method' =>'DELETE', 'id' => 'form-eliminar-curso']) !!}
			<table id="datatable" class="table table-striped table-bordered">
				<tr>
					<th>Nombre del curso: </th>
					<td>{{ $curso->nombre }}</td>
				</tr>
				<tr>
					<th>Horas: </th>
					<td>{{ $curso->apellido }}</td>
				</tr>
				<tr>
					<th>Cédula: </th>
					<td>{{ number_format($curso->nombreTrabajador->cedula, 0, '', '.') }}</td>
				</tr>
				<tr>
					<th>Nombre: </th>
					<td>{{ $curso->nombreTrabajador->nombre }}</td>
				</tr>
				<tr>
					<th>Apellido: </th>
					<td>{{ $curso->nombreTrabajador->apellido }}</td>
				</tr>
				<tr>
					<th>Acciones</th>
					<td>
						<a href="{{ URL::route('cursos.edit', $curso->id) }}" class="btn btn-warning btn-icon" title="Editar {{ $curso->nombreTrabajador->cedula }}">
                            <i class="zmdi zmdi-edit"></i> Editar
                        </a>
                        <a href="javascript:{}" data-id="{{ $curso->id }}" class="btn btn-danger btn-icon tooltip-error borrar" data-rel="tooltip" title="Eliminar {{ $curso->nombreTrabajador->cedula }}" objeto="{{ $curso->id }}">
                            <i class="zmdi zmdi-delete"></i> Eliminar
                        </a>
					</td>
				</tr>
			</table>
			{!! Form::close() !!}
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop

@section('javascripts')
<script type="text/javascript">
	$(function () {
		$('.borrar').click(function (e) {
			e.preventDefault();
			var message = "¿Está realmente seguro(a) de eliminar este curso?";
			var form = $('#form-eliminar-curso');
			swal({
				title: message,
                type: "warning",
                showCancelButton: true,
                cancelButtonClass: 'btn-secondary waves-effect',
                confirmButtonClass: 'btn-warning',
                confirmButtonText: "Si",
                cancelButtonText: "No",
                closeOnConfirm: false
            }, function () {
            	form.submit();
	        });
		});
	});
</script>
@stop