@extends('layouts.base')

@section('titulo')
<title>Listado de inducciones - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => "Inducciones", 'tituloModulo' => "Inducciones"])
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<img src="{{ asset('assets/images/backgrounds/notificaciones.jpg') }}" alt="img" class="img-thumbails"><br><br>
	</div>
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			@if($contadorAdvertencias > 0)
			<div class="col-sm-12">
				<div class="alert alert-danger" role="alert">
					<strong>¡Advertencia!</strong> A algunos trabajadores deben de renovarles la inducción.
				</div>
			</div>
			@endif
			<table id="datatable" class="table table-striped table-bordered datatableN">
				<thead>
					<tr>
						<th>Trabajador</th>
						<th>Estado</th>
						<th>Fecha</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($notificaciones as $notificacion)
						<tr>
                            <td>{{ $notificacion->nombre.' '.$notificacion->apellido }}</td>
                            <td>
                            	@if($notificacion->meses >= 6 || $notificacion->anios > 0)
                            	<span class="label label-warning" style="font-size: 100%">
                            		Renovar induccion
                            	@elseif($notificacion->meses < 6 && $notificacion->anios == 0)
                            	<span class="label label-success" style="font-size: 100%">
                            		Actualizado
                            	@endif
                            	</span>
                            </td>
                            <td>{{ date_format(date_create($notificacion->fecha), 'd/m/Y') }}</td>
							<td>
								<a href="{{ URL::route('notificaciones.show', $notificacion->id) }}" data-rel="tooltip" title="Mostrar {{ $notificacion->cedula }}" objeto="{{ $notificacion->cedula }}" class="btn waves-effect waves-light btn-primary"> 
									<i class="fa fa-eye"></i>
								</a>&nbsp;
								<a href="{{ URL::route('notificaciones.edit', $notificacion->id) }}" class="tooltip-success editar btn waves-effect waves-light btn-warning " data-rel="tooltip" title="Editar {{ $notificacion->cedula }}" objeto="{{ $notificacion->cedula }}" style="text-decoration:none;"> 
									<i class="fa fa-edit"></i>
								</a>&nbsp;
								<a href="#" data-id="{{ $notificacion->id }}" class="tooltip-error borrar btn waves-effect waves-light btn-danger" data-rel="tooltip" title="Eliminar {{ $notificacion->cedula }}" objeto="{{ $notificacion->id }}"> 
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
						@endforeach
				</tbody>
			</table>
			{!! Form::open(array('route' => array('notificaciones.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
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