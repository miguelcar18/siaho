@extends('layouts.base')

@section('titulo')
    <title>Editar notificación - SIAHO</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Editar notificacion', 'tituloModulo' => 'Notificaciones', 'rutaModulo' => URL::route('notificaciones.index'), 'tituloSubmodulo' => 'Editar notificacion'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					{!! Form::model($notificacion, array('route' => ['notificaciones.update', $notificacion->id], 'method' => 'PUT', 'id' => 'notificacionForm', 'name' => 'notificacionForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form')) !!}
						@include('notificaciones.form.NotificacionFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Actualizar", 'rutaCancelar' => URL::route('notificaciones.index'), 'valorData' => 0, 'idBoton' => 'notificacionSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop