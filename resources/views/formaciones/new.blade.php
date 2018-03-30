@extends('layouts.base')

@section('titulo')
    <title>Nueva formación - SIAHO</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Nueva formación', 'tituloModulo' => 'Formación CSSL', 'rutaModulo' => URL::route('formaciones.index'), 'tituloSubmodulo' => 'Nueva formación'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					{!! Form::open(['route' => 'formaciones.store', 'method' => 'post', 'id' => 'formacionForm', 'name' => 'formacionForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form']) !!}
						@include('formaciones.form.FormacionFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Guardar", 'rutaCancelar' => URL::route('formaciones.index'), 'valorData' => 1, 'idBoton' => 'formacionSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop