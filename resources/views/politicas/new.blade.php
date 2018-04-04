@extends('layouts.base')

@section('titulo')
    <title>Nueva política - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Nueva política', 'tituloModulo' => 'Políticas', 'rutaModulo' => URL::route('politicas.index'), 'tituloSubmodulo' => 'Nueva política'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					{!! Form::open(['route' => 'politicas.store', 'method' => 'post', 'id' => 'politicaForm', 'name' => 'politicaForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form']) !!}
						@include('politicas.form.PoliticaFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Guardar", 'rutaCancelar' => URL::route('politicas.index'), 'valorData' => 1, 'idBoton' => 'politicaSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop