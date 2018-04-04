@extends('layouts.base')

@section('titulo')
    <title>Editar política - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Editar política', 'tituloModulo' => 'Políticas', 'rutaModulo' => URL::route('politicas.index'), 'tituloSubmodulo' => 'Editar política'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					{!! Form::model($politica, array('route' => ['politicas.update', $politica->id], 'method' => 'PUT', 'id' => 'politicaForm', 'name' => 'politicaForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form')) !!}
						@include('politicas.form.PoliticaFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Actualizar", 'rutaCancelar' => URL::route('politicas.index'), 'valorData' => 0, 'idBoton' => 'politicaSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop