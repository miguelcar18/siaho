@extends('layouts.base')

@section('titulo')
    <title>Datos del trabajador - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Información del trabajador', 'tituloModulo' => 'Trabajadores', 'rutaModulo' => URL::route('trabajadores.index'), 'tituloSubmodulo' => 'Información del trabajador'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box table-responsive">
			{!! Form::open(['route' => ['trabajadores.destroy', $trabajador->id], 'method' =>'DELETE', 'id' => 'form-eliminar-trabajador']) !!}
			<table id="datatable" class="table table-striped table-bordered">
				<tr>
					<th>Nombre: </th>
					<td>{{ $trabajador->nombre }}</td>
				</tr>
				<tr>
					<th>Apellido: </th>
					<td>{{ $trabajador->apellido }}</td>
				</tr>
				<tr>
					<th>Cédula: </th>
					<td>{{ number_format($trabajador->cedula, 0, '', '.') }}</td>
				</tr>
				<tr>
					<th>Cargo: </th>
					<td>{{ $trabajador->cargo }}</td>
				</tr>
				<tr>
					<th>Departamento: </th>
					<td>{{ $trabajador->departamento }}</td>
				</tr>
				<tr>
					<th>Acciones</th>
					<td>
						<a href="{{ URL::route('trabajadores.edit', $trabajador->id) }}" class="btn btn-warning btn-icon" title="Editar {{ $trabajador->cedula }}">
                            <i class="zmdi zmdi-edit"></i> Editar
                        </a>
                        <a href="javascript:{}" data-id="{{ $trabajador->id }}" class="btn btn-danger btn-icon tooltip-error borrar" data-rel="tooltip" title="Eliminar {{ $trabajador->cedula }}" objeto="{{ $trabajador->id }}">
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
			var message = "¿Está realmente seguro(a) de eliminar este trabajador?";
			var form = $('#form-eliminar-trabajador');
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