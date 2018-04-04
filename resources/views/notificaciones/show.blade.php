@extends('layouts.base')

@section('titulo')
    <title>Datos de la inducción - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Información de la inducción', 'tituloModulo' => 'Inducciones', 'rutaModulo' => URL::route('notificaciones.index'), 'tituloSubmodulo' => 'Información de la inducción'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box table-responsive">
			{!! Form::open(['route' => ['notificaciones.destroy', $notificacion->id], 'method' =>'DELETE', 'id' => 'form-eliminar-notificacion']) !!}
			<table id="datatable" class="table table-striped table-bordered">
				<tr>
					<th>Fecha: </th>
					<td>{{ date_format(date_create($notificacion->fecha), 'd/m/Y') }}</td>
				</tr>
				<tr>
					<th>Nombre: </th>
					<td>{{ $notificacion->nombre }}</td>
				</tr>
				<tr>
					<th>Lugar: </th>
					<td>{{ $notificacion->lugar }}</td>
				</tr>
				<tr>
					<th>Cédula: </th>
					<td>{{ number_format($notificacion->nombreTrabajador->cedula, 0, '', '.') }}</td>
				</tr>
				<tr>
					<th>Nombre: </th>
					<td>{{ $notificacion->nombreTrabajador->nombre }}</td>
				</tr>
				<tr>
					<th>Apellido: </th>
					<td>{{ $notificacion->nombreTrabajador->apellido }}</td>
				</tr>
				<tr>
					<th>Acciones</th>
					<td>
						<a href="{{ URL::route('notificaciones.edit', $notificacion->id) }}" class="btn btn-warning btn-icon" title="Editar {{ $notificacion->nombreTrabajador->cedula }}">
                            <i class="zmdi zmdi-edit"></i> Editar
                        </a>
                        <a href="javascript:{}" data-id="{{ $notificacion->id }}" class="btn btn-danger btn-icon tooltip-error borrar" data-rel="tooltip" title="Eliminar {{ $notificacion->nombreTrabajador->cedula }}" objeto="{{ $notificacion->id }}">
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
			var message = "¿Está realmente seguro(a) de eliminar esta inducción?";
			var form = $('#form-eliminar-notificacion');
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