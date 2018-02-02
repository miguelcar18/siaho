@extends('layouts.base')

@section('titulo')
    <title>Editar delegado - SIAHO</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Editar delegado', 'tituloModulo' => 'Delegados', 'rutaModulo' => URL::route('delegados.index'), 'tituloSubmodulo' => 'Editar delegado'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					{!! Form::model($delegado, array('route' => ['delegados.update', $delegado->id], 'method' => 'PUT', 'id' => 'delegadoForm', 'name' => 'delegadoForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form')) !!}
						@include('delegados.form.DelegadoFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Actualizar", 'rutaCancelar' => URL::route('delegados.index'), 'valorData' => 0, 'idBoton' => 'delegadoSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop