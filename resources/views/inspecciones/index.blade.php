@extends('layouts.base')

@section('titulo')
<title>Listado de inspecciones - SIAHO</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => "Inspecciones", 'tituloModulo' => "Inspecciones"])
<div class="row">
	<div class="col-sm-6 col-sm-offset-3">
		<img src="{{ asset('assets/images/backgrounds/inspecciones.jpg') }}" alt="img" class="img-thumbails"><br><br>
	</div>
	<div class="col-sm-12">
		<div class="card-box table-responsive">
			<table id="datatable" class="table table-striped table-bordered">
				<thead>
					<tr>
						<th>Tipo de inspección</th>
						<th>Fecha</th>
						<th>Sede</th>
						<th>Realizada</th>
						<th>Acciones</th>
					</tr>
				</thead>
				<tbody>
					@foreach($inspecciones as $inspeccion)
						<tr>
                            <td>{{ $inspeccion->tipo }}</td>
                            <td>{{ date_format(date_create($inspeccion->fecha), 'd/m/Y') }}</td>
                            <td>{{ $inspeccion->sede }}</td>
                            <td>
                            	@if($inspeccion->realizado == 1)
                            	Si
                            	@elseif($inspeccion->realizado == 0)
                            	No
                            	@endif
                            </td>
							<td>
								<a href="{{ URL::route('inspecciones.show', $inspeccion->id) }}" data-rel="tooltip" title="Mostrar {{ $inspeccion->id }}" objeto="{{ $inspeccion->id }}" class="btn waves-effect waves-light btn-primary"> 
									<i class="fa fa-eye"></i>
								</a>&nbsp;
								<a href="{{ URL::route('inspecciones.edit', $inspeccion->id) }}" class="tooltip-success editar btn waves-effect waves-light btn-warning " data-rel="tooltip" title="Editar {{ $inspeccion->id }}" objeto="{{ $inspeccion->id }}" style="text-decoration:none;"> 
									<i class="fa fa-edit"></i>
								</a>&nbsp;
								<a href="#" data-id="{{ $inspeccion->id }}" class="tooltip-error borrar btn waves-effect waves-light btn-danger" data-rel="tooltip" title="Eliminar {{ $inspeccion->id }}" objeto="{{ $inspeccion->id }}"> 
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
						@endforeach
				</tbody>
			</table>
			{!! Form::open(array('route' => array('inspecciones.destroy', 'USER_ID'), 'method' => 'DELETE', 'role' => 'form', 'id' => 'form-delete')) !!}
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