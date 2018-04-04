@extends('layouts.base')

@section('titulo')
    <title>Nuevo inducción - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Nueva inducción', 'tituloModulo' => 'Inducciones', 'rutaModulo' => URL::route('notificaciones.index'), 'tituloSubmodulo' => 'Nueva inducción'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					{!! Form::open(['route' => 'notificaciones.store', 'method' => 'post', 'id' => 'notificacionForm', 'name' => 'notificacionForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form']) !!}
						@include('notificaciones.form.NotificacionFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Guardar", 'rutaCancelar' => URL::route('notificaciones.index'), 'valorData' => 1, 'idBoton' => 'notificacionSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop