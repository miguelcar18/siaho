@extends('layouts.base')

@section('titulo')
<title>Listado de trabajadores - SIAHO</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => "Trabajadores", 'tituloModulo' => "Trabajadores"])
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<img src="{{ asset('assets/images/backgrounds/trabajadores.jpg') }}" alt="img" class="img-thumbails"><br><br>
	</div>
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<table id="datatable" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Nombre</th>
						<th>Apellido</th>
						<th>Cédula</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($trabajadores as $trabajador)
						<tr>
                            <td>{{ $trabajador->nombre }}</td>
                            <td>{{ $trabajador->apellido }}</td>
                            <td align="right"> {{ number_format($trabajador->cedula, 0, '', '.') }}</td>
							<td>
								<a href="{{ URL::route('trabajadores.show', $trabajador->id) }}" data-rel="tooltip" title="Mostrar {{ $trabajador->cedula }}" objeto="{{ $trabajador->cedula }}" class="btn waves-effect waves-light btn-primary"> 
									<i class="fa fa-eye"></i>
								</a>&nbsp;
								@if(Auth::check())
								<a href="{{ URL::route('trabajadores.edit', $trabajador->id) }}" class="tooltip-success editar btn waves-effect waves-light btn-warning " data-rel="tooltip" title="Editar {{ $trabajador->cedula }}" objeto="{{ $trabajador->cedula }}" style="text-decoration:none;"> 
									<i class="fa fa-edit"></i>
								</a>&nbsp;
								<a href="#" data-id="{{ $trabajador->id }}" class="tooltip-error borrar btn waves-effect waves-light btn-danger" data-rel="tooltip" title="Eliminar {{ $trabajador->cedula }}" objeto="{{ $trabajador->id }}"> 
									<i class="fa fa-trash"></i>
								</a>
								@endif
							</td>
						</tr>
						@endforeach
				</tbody>
			</table>
			{!! Form::open(array('route' => array('trabajadores.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
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