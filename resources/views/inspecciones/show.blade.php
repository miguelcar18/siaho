@extends('layouts.base')

@section('titulo')
    <title>Datos de la inspección - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Información de la inspección', 'tituloModulo' => 'Inspecciones', 'rutaModulo' => URL::route('inspecciones.index'), 'tituloSubmodulo' => 'Información de la inspección'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box table-responsive">
			{!! Form::open(['route' => ['inspecciones.destroy', $inspeccion->id], 'method' =>'DELETE', 'id' => 'form-eliminar-inspeccion']) !!}
			<table id="datatable" class="table table-striped table-bordered">
				<tr>
					<th>Tipo de inspección: </th>
					<td>{{ $inspeccion->tipo }}</td>
				</tr>
				<tr>
					<th>Fecha: </th>
					<td>{{ date_format(date_create($inspeccion->fecha), 'd/m/Y') }}</td>
				</tr>
				<tr>
					<th>Sede: </th>
					<td>{{ $inspeccion->sede }}</td>
				</tr>
				<tr>
					<th>Lugar: </th>
					<td>{{ $inspeccion->lugar }}</td>
				</tr>
				<tr>
					<th>Realizado: </th>
					<td>
						@if($inspeccion->realizado == 1)
						Si
						@elseif($inspeccion->realizado == 0)
						No
						@endif
					</td>
				</tr>
				<tr>
					<th>Acciones</th>
					<td>
						<a href="{{ URL::route('inspecciones.edit', $inspeccion->id) }}" class="btn btn-warning btn-icon" title="Editar {{ $inspeccion->id }}">
                            <i class="zmdi zmdi-edit"></i> Editar
                        </a>
                        <a href="javascript:{}" data-id="{{ $inspeccion->id }}" class="btn btn-danger btn-icon tooltip-error borrar" data-rel="tooltip" title="Eliminar {{ $inspeccion->id }}" objeto="{{ $inspeccion->id }}">
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
			var message = "¿Está realmente seguro(a) de eliminar esta inspección?";
			var form = $('#form-eliminar-inspeccion');
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