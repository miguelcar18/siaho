@extends('layouts.base')

@section('titulo')
<title>Listado de políticas - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => "Políticas", 'tituloModulo' => "Políticas"])
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<img src="{{ asset('assets/images/backgrounds/politicas.jpg') }}" alt="img" class="img-thumbails"><br><br>
	</div>
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			@if($contadorAdvertencias > 0)
			<div class="col-sm-12">
				<div class="alert alert-danger" role="alert">
					<strong>¡Advertencia!</strong> A algunos trabajadores deben de renovarles la política de seguridad.
				</div>
			</div>
			@endif
			<table id="datatable" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Trabajador</th>
						<th>Fecha</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($politicas as $politicas)
						<tr>
                            <td>{{ $politicas->nombre.' '.$politicas->apellido }}</td>
                            <td>{{ date_format(date_create($politicas->fecha), 'd/m/Y') }}</td>
                            <td>
                            	@if($politicas->meses >= 6 || $politicas->anios > 0)
                            	<span class="label label-warning" style="font-size: 100%">
                            		Renovar política
                            	@elseif($politicas->meses < 6 && $politicas->anios == 0)
                            	<span class="label label-success" style="font-size: 100%">
                            		Actualizado
                            	@endif
                            	</span>
                            </td>
							<td>
								<a href="{{ URL::route('politicas.show', $politicas->id) }}" data-rel="tooltip" title="Mostrar {{ $politicas->cedula }}" objeto="{{ $politicas->cedula }}" class="btn waves-effect waves-light btn-primary"> 
									<i class="fa fa-eye"></i>
								</a>&nbsp;
								<a href="{{ URL::route('politicas.edit', $politicas->id) }}" class="tooltip-success editar btn waves-effect waves-light btn-warning " data-rel="tooltip" title="Editar {{ $politicas->cedula }}" objeto="{{ $politicas->cedula }}" style="text-decoration:none;"> 
									<i class="fa fa-edit"></i>
								</a>&nbsp;
								<a href="#" data-id="{{ $politicas->id }}" class="tooltip-error borrar btn waves-effect waves-light btn-danger" data-rel="tooltip" title="Eliminar {{ $politicas->cedula }}" objeto="{{ $politicas->id }}"> 
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
						@endforeach
				</tbody>
			</table>
			{!! Form::open(array('route' => array('politicas.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
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