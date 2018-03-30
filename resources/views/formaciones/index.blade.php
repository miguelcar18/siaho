@extends('layouts.base')

@section('titulo')
<title>Listado de Formación CSSL - SIAHO</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => "Formación CSSL", 'tituloModulo' => "Formación CSSL"])
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<img src="{{ asset('assets/images/backgrounds/formaciones.jpg') }}" alt="img" class="img-thumbails"><br><br>
	</div>
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<table id="datatable" class="table table-striped table-bordered datatableN">
				<thead>
					<tr>
						<th>Trabajador</th>
						<th>Horas</th>
						<th>Fecha</th>
						<th>H. Total</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@inject('FormacionesController', 'App\Http\Controllers\FormacionesController')
					@foreach($formaciones as $formacion)
						<tr>
                            <td>{{ $formacion->nombreTrabajador->nombre.' '.$formacion->nombreTrabajador->apellido }}</td>
                            <td>{{ $formacion->horas }}</td>
                            <td>{{ date_format(date_create($formacion->fecha), 'd/m/Y') }}</td>
                            <td>
                            	{{ $FormacionesController->horasTotalesMensual($formacion->trabajador, date_format(date_create($formacion->fecha), 'm'), date_format(date_create($formacion->fecha), 'Y')) }}
                            </td>
							<td>
								<a href="{{ URL::route('formaciones.show', $formacion->id) }}" data-rel="tooltip" title="Mostrar {{ $formacion->nombreTrabajador->cedula }}" objeto="{{ $formacion->nombreTrabajador->cedula }}" class="btn waves-effect waves-light btn-primary"> 
									<i class="fa fa-eye"></i>
								</a>&nbsp;
								<a href="{{ URL::route('formaciones.edit', $formacion->id) }}" class="tooltip-success editar btn waves-effect waves-light btn-warning " data-rel="tooltip" title="Editar {{ $formacion->nombreTrabajador->cedula }}" objeto="{{ $formacion->nombreTrabajador->cedula }}" style="text-decoration:none;"> 
									<i class="fa fa-edit"></i>
								</a>&nbsp;
								<a href="#" data-id="{{ $formacion->id }}" class="tooltip-error borrar btn waves-effect waves-light btn-danger" data-rel="tooltip" title="Eliminar {{ $formacion->nombreTrabajador->cedula }}" objeto="{{ $formacion->id }}"> 
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
						@endforeach
				</tbody>
			</table>
			{!! Form::open(array('route' => array('formaciones.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
            {!! Form::close() !!}
		</div>
	</div>
</div> <!-- end row -->
@stop

@section('javascripts')
<script type="text/javascript">
	$(document).ready(function() {

		@if(Session::has('message'))
			setTimeout(function () {
				var mensaje1 = "{{ Session::get('message') }}";
				toastr["success"](mensaje1);
			}, 10);
		@endif

		$('.tooltip-error').click(function (e) {
			e.preventDefault();
			var message = "¿Está realmente seguro(a) de eliminar este registro?";
			var id = $(this).data('id');
			var form = $('#form-delete');
			var action = form.attr('action').replace('USER_ID', id);
			var rowss =  $(this).parents('tr');
			swal({
				title: message,
				type: "warning",
				showCancelButton: true,
				cancelButtonClass: 'btn-secondary waves-effect',
				confirmButtonClass: 'btn-warning',
				confirmButtonText: "Si",
				cancelButtonText: "No",
				closeOnConfirm: true
			}, function () {
				$.post(action, form.serialize(), function(result) {
					if (result.success) {
						tablaData.row(rowss).remove().draw();
                //swal("¡Eliminado!", result.msg, "success");
                toastr["success"](result.msg);              
            } 
            //else 
                //row.show();
            }, 'json');
			});
		});
	});
</script>
@stop