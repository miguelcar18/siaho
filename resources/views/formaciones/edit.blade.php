@extends('layouts.base')

@section('titulo')
    <title>Editar formación - SIAHO</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Editar formación', 'tituloModulo' => 'Formación CSSL', 'rutaModulo' => URL::route('formaciones.index'), 'tituloSubmodulo' => 'Editar formación'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					{!! Form::model($formacion, array('route' => ['formaciones.update', $formacion->id], 'method' => 'PUT', 'id' => 'formacionForm', 'name' => 'formacionForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form')) !!}
						@include('formaciones.form.FormacionFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Actualizar", 'rutaCancelar' => URL::route('formaciones.index'), 'valorData' => 0, 'idBoton' => 'formacionSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop