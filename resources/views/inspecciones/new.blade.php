@extends('layouts.base')

@section('titulo')
    <title>Nueva inspección - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Nueva inspección', 'tituloModulo' => 'Inspección', 'rutaModulo' => URL::route('inspecciones.index'), 'tituloSubmodulo' => 'Nueva inspección'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					{!! Form::open(['route' => 'inspecciones.store', 'method' => 'post', 'id' => 'inspeccionForm', 'name' => 'inspeccionForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form']) !!}
						@include('inspecciones.form.InspeccionFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Guardar", 'rutaCancelar' => URL::route('inspecciones.index'), 'valorData' => 1, 'idBoton' => 'inspeccionSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop