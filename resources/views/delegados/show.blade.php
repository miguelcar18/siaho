@extends('layouts.base')

@section('titulo')
    <title>Datos del delegado - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Información del delegado', 'tituloModulo' => 'Delegados', 'rutaModulo' => URL::route('delegados.index'), 'tituloSubmodulo' => 'Información del delegado'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box table-responsive">
			{!! Form::open(['route' => ['delegados.destroy', $delegado->id], 'method' =>'DELETE', 'id' => 'form-eliminar-delegado']) !!}
			<table id="datatable" class="table table-striped table-bordered">
				<tr>
					<th>Tipo de delegado: </th>
					<td>{{ $delegado->tipo }}</td>
				</tr>
				<tr>
					<th>Fecha: </th>
					<td>{{ date_format(date_create($delegado->fecha), 'd/m/Y') }}</td>
				</tr>
				<tr>
					<th>Cédula: </th>
					<td>{{ number_format($delegado->nombreTrabajador->cedula, 0, '', '.') }}</td>
				</tr>
				<tr>
					<th>Nombre: </th>
					<td>{{ $delegado->nombreTrabajador->nombre }}</td>
				</tr>
				<tr>
					<th>Apellido: </th>
					<td>{{ $delegado->nombreTrabajador->apellido }}</td>
				</tr>
				<tr>
					<th>Acciones</th>
					<td>
						<a href="{{ URL::route('delegados.edit', $delegado->id) }}" class="btn btn-warning btn-icon" title="Editar {{ $delegado->nombreTrabajador->cedula }}">
                            <i class="zmdi zmdi-edit"></i> Editar
                        </a>
                        <a href="javascript:{}" data-id="{{ $delegado->id }}" class="btn btn-danger btn-icon tooltip-error borrar" data-rel="tooltip" title="Eliminar {{ $delegado->nombreTrabajador->cedula }}" objeto="{{ $delegado->id }}">
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
			var message = "¿Está realmente seguro(a) de eliminar este delegado?";
			var form = $('#form-eliminar-delegado');
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