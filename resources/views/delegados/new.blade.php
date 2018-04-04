@extends('layouts.base')

@section('titulo')
    <title>Nuevo delegado - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Nuevo delegado', 'tituloModulo' => 'Delegados', 'rutaModulo' => URL::route('delegados.index'), 'tituloSubmodulo' => 'Nuevo delegado'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					{!! Form::open(['route' => 'delegados.store', 'method' => 'post', 'id' => 'delegadoForm', 'name' => 'delegadoForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form']) !!}
						@include('delegados.form.DelegadoFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Guardar", 'rutaCancelar' => URL::route('delegados.index'), 'valorData' => 1, 'idBoton' => 'delegadoSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop