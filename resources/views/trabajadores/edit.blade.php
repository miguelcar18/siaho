@extends('layouts.base')

@section('titulo')
    <title>Editar trabajador - SIAHO</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Editar trabajador', 'tituloModulo' => 'Trabajadores', 'rutaModulo' => URL::route('trabajadores.index'), 'tituloSubmodulo' => 'Editar trabajador'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					{!! Form::model($trabajador, array('route' => ['trabajadores.update', $trabajador->id], 'method' => 'PUT', 'id' => 'trabajadorForm', 'name' => 'trabajadorForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form')) !!}
						@include('trabajadores.form.TrabajadorFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Actualizar", 'rutaCancelar' => URL::route('trabajadores.index'), 'valorData' => 0, 'idBoton' => 'trabajadorSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop