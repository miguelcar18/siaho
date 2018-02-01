@extends('layouts.base')

@section('titulo')
<title>Listado de cursos - SIAHO</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => "Cursos", 'tituloModulo' => "Cursos"])
<div class="row">
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<table id="datatable" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Trabajador</th>
						<th>Curso</th>
						<th>Horas</th>
						<th>Horas Totales</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($cursos as $curso)
						<tr>
                            <td>{{ $curso->nombreTrabajador->nombre.' '.$curso->nombreTrabajador->apellido }}</td>
                            <td>{{ $curso->curso }}</td>
                            <td>{{ $curso->horas }}</td>
                            <td>{{ $curso->horas }}</td>
							<td>
								<a href="{{ URL::route('cursos.show', $curso->id) }}" data-rel="tooltip" title="Mostrar {{ $curso->nombreTrabajador->cedula }}" objeto="{{ $curso->nombreTrabajador->cedula }}" class="btn waves-effect waves-light btn-primary"> 
									<i class="fa fa-eye"></i>
								</a>&nbsp;
								<a href="{{ URL::route('cursos.edit', $curso->id) }}" class="tooltip-success editar btn waves-effect waves-light btn-warning " data-rel="tooltip" title="Editar {{ $curso->nombreTrabajador->cedula }}" objeto="{{ $curso->nombreTrabajador->cedula }}" style="text-decoration:none;"> 
									<i class="fa fa-edit"></i>
								</a>&nbsp;
								<a href="#" data-id="{{ $curso->id }}" class="tooltip-error borrar btn waves-effect waves-light btn-danger" data-rel="tooltip" title="Eliminar {{ $curso->nombreTrabajador->cedula }}" objeto="{{ $curso->id }}"> 
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
						@endforeach
				</tbody>
			</table>
			{!! Form::open(array('route' => array('cursos.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
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
				closeOnConfirm: false
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