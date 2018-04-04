@extends('layouts.base')

@section('titulo')
    <title>Datos de la formación - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Información de la formación', 'tituloModulo' => 'Formación CSSL', 'rutaModulo' => URL::route('formaciones.index'), 'tituloSubmodulo' => 'Información de la formación'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box table-responsive">
			{!! Form::open(['route' => ['formaciones.destroy', $formacion->id], 'method' =>'DELETE', 'id' => 'form-eliminar-formacion']) !!}
			<table id="datatable" class="table table-striped table-bordered">
				<tr>
					<th>Nombre de la formación: </th>
					<td>{{ $formacion->nombre }}</td>
				</tr>
				<tr>
					<th>Fecha: </th>
					<td>{{ date_format(date_create($formacion->fecha), 'd/m/Y') }}</td>
				</tr>
				<tr>
					<th>Horas: </th>
					<td>{{ $formacion->horas }}</td>
				</tr>
				<tr>
					<th>Cédula: </th>
					<td>{{ number_format($formacion->nombreTrabajador->cedula, 0, '', '.') }}</td>
				</tr>
				<tr>
					<th>Nombre: </th>
					<td>{{ $formacion->nombreTrabajador->nombre }}</td>
				</tr>
				<tr>
					<th>Apellido: </th>
					<td>{{ $formacion->nombreTrabajador->apellido }}</td>
				</tr>
				<tr>
					<th>Acciones</th>
					<td>
						<a href="{{ URL::route('formaciones.edit', $formacion->id) }}" class="btn btn-warning btn-icon" title="Editar {{ $formacion->nombreTrabajador->cedula }}">
                            <i class="zmdi zmdi-edit"></i> Editar
                        </a>
                        <a href="javascript:{}" data-id="{{ $formacion->id }}" class="btn btn-danger btn-icon tooltip-error borrar" data-rel="tooltip" title="Eliminar {{ $formacion->nombreTrabajador->cedula }}" objeto="{{ $formacion->id }}">
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
			var message = "¿Está realmente seguro(a) de eliminar este formación?";
			var form = $('#form-eliminar-formacion');
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