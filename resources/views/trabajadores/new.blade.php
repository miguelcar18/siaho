@extends('layouts.base')

@section('titulo')
    <title>Nuevo trabajador - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Nuevo trabajador', 'tituloModulo' => 'Trabajadores', 'rutaModulo' => URL::route('trabajadores.index'), 'tituloSubmodulo' => 'Nuevo trabajador'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					{!! Form::open(['route' => 'trabajadores.store', 'method' => 'post', 'id' => 'trabajadorForm', 'name' => 'trabajadorForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form']) !!}
						@include('trabajadores.form.TrabajadorFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Guardar", 'rutaCancelar' => URL::route('trabajadores.index'), 'valorData' => 1, 'idBoton' => 'trabajadorSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop