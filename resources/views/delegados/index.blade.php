@extends('layouts.base')

@section('titulo')
<title>Listado de delegados - SIAHO</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => "Delegados", 'tituloModulo' => "Delegados"])
<div class="row">
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<div class="col-sm-12">
				<div class="alert alert-danger" role="alert">
					<strong>¡Advertencia!</strong> Algunos delegados deben ser renovados próximamente.
				</div>
			</div>
			<table id="datatable" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Trabajador</th>
						<th>Tipo de delegado</th>
						<th>Fecha</th>
						<th>Estado</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($delegados as $delegado)
						<tr>
                            <td>{{ $delegado->nombre.' '.$delegado->apellido }}</td>
                            <td>{{ $delegado->tipo }}</td>
                            <td>{{ date_format(date_create($delegado->fecha), 'd/m/Y') }}</td>
                            <td>
                            	@if($delegado->anios >= 2)
                            	<span class="label label-warning" style="font-size: 100%">
                            		Pronta renovación
                            	@elseif($delegado->anios < 2)
                            	<span class="label label-success" style="font-size: 100%">
                            		Activo
                            	@endif
                            	</span>
                            </td>
							<td>
								<a href="{{ URL::route('delegados.show', $delegado->id) }}" data-rel="tooltip" title="Mostrar {{ $delegado->cedula }}" objeto="{{ $delegado->cedula }}" class="btn waves-effect waves-light btn-primary"> 
									<i class="fa fa-eye"></i>
								</a>&nbsp;
								<a href="{{ URL::route('delegados.edit', $delegado->id) }}" class="tooltip-success editar btn waves-effect waves-light btn-warning " data-rel="tooltip" title="Editar {{ $delegado->cedula }}" objeto="{{ $delegado->cedula }}" style="text-decoration:none;"> 
									<i class="fa fa-edit"></i>
								</a>&nbsp;
								<a href="#" data-id="{{ $delegado->id }}" class="tooltip-error borrar btn waves-effect waves-light btn-danger" data-rel="tooltip" title="Eliminar {{ $delegado->cedula }}" objeto="{{ $delegado->id }}"> 
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
						@endforeach
				</tbody>
			</table>
			{!! Form::open(array('route' => array('delegados.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
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