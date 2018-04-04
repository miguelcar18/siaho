@extends('layouts.base')

@section('titulo')
    <title>Editar inspección - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Editar inspección', 'tituloModulo' => 'Inspecciones', 'rutaModulo' => URL::route('inspecciones.index'), 'tituloSubmodulo' => 'Editar inspección'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					{!! Form::model($inspeccion, array('route' => ['inspecciones.update', $inspeccion->id], 'method' => 'PUT', 'id' => 'inspeccionForm', 'name' => 'inspeccionForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form')) !!}
						@include('inspecciones.form.InspeccionFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Actualizar", 'rutaCancelar' => URL::route('inspecciones.index'), 'valorData' => 0, 'idBoton' => 'inspeccionSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop