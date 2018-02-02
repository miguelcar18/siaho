@extends('layouts.base')

@section('titulo')
    <title>Datos de la política - SIAHO</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Información de la política', 'tituloModulo' => 'Políticas', 'rutaModulo' => URL::route('politicas.index'), 'tituloSubmodulo' => 'Información de la política'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box table-responsive">
			{!! Form::open(['route' => ['politicas.destroy', $politica->id], 'method' =>'DELETE', 'id' => 'form-eliminar-politica']) !!}
			<table id="datatable" class="table table-striped table-bordered">
				<tr>
					<th>Fecha: </th>
					<td>{{ date_format(date_create($politica->fecha), 'd/m/Y') }}</td>
				</tr>
				<tr>
					<th>Cédula: </th>
					<td>{{ number_format($politica->nombreTrabajador->cedula, 0, '', '.') }}</td>
				</tr>
				<tr>
					<th>Nombre: </th>
					<td>{{ $politica->nombreTrabajador->nombre }}</td>
				</tr>
				<tr>
					<th>Apellido: </th>
					<td>{{ $politica->nombreTrabajador->apellido }}</td>
				</tr>
				<tr>
					<th>Acciones</th>
					<td>
						<a href="{{ URL::route('politicas.edit', $politica->id) }}" class="btn btn-warning btn-icon" title="Editar {{ $politica->nombreTrabajador->cedula }}">
                            <i class="zmdi zmdi-edit"></i> Editar
                        </a>
                        <a href="javascript:{}" data-id="{{ $politica->id }}" class="btn btn-danger btn-icon tooltip-error borrar" data-rel="tooltip" title="Eliminar {{ $politica->nombreTrabajador->cedula }}" objeto="{{ $politica->id }}">
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
			var message = "¿Está realmente seguro(a) de eliminar esta política?";
			var form = $('#form-eliminar-politica');
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