@extends('layouts.base')

@section('titulo')
<title>Listado de cursos - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => "Cursos", 'tituloModulo' => "Cursos"])
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<img src="{{ asset('assets/images/backgrounds/cursos.jpg') }}" alt="img" class="img-thumbails"><br><br>
	</div>
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<table id="datatable" class="table table-striped table-bordered datatableN">
				<thead>
					<tr>
						<th>Trabajador</th>
						<th>Horas</th>
						<th>Fecha</th>
						<th>H. Total Mens.</th>
						<th>H. Total Tri.</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@inject('CursosController', 'App\Http\Controllers\CursosController')
					@foreach($cursos as $curso)
						<tr>
                            <td>{{ $curso->nombreTrabajador->nombre.' '.$curso->nombreTrabajador->apellido }}</td>
                            <td>{{ $curso->horas }}</td>
                            <td>{{ date_format(date_create($curso->fecha), 'd/m/Y') }}</td>
                            <td>
                            	{{ $CursosController->horasTotalesMensual($curso->trabajador, date_format(date_create($curso->fecha), 'm'), date_format(date_create($curso->fecha), 'Y')) }}
                            </td>
                            <td>
                            	@if($CursosController->horasTrimestres($curso->trabajador, date_format(date_create($curso->fecha), 'm'), date_format(date_create($curso->fecha), 'Y')) < 16)
                            	<span class="label label-warning" style="font-size: 100%">
                            	@elseif($CursosController->horasTrimestres($curso->trabajador, date_format(date_create($curso->fecha), 'm'), date_format(date_create($curso->fecha), 'Y')) >= 16)
                            	<span class="label label-success" style="font-size: 100%">
                            	@endif
                            		{{ $CursosController->horasTrimestres($curso->trabajador, date_format(date_create($curso->fecha), 'm'), date_format(date_create($curso->fecha), 'Y')) }}
                            	</span>
                            </td>
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