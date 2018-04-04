@extends('layouts.base')

@section('titulo')
    <title>Editar curso - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Editar curso', 'tituloModulo' => 'Cursos', 'rutaModulo' => URL::route('cursos.index'), 'tituloSubmodulo' => 'Editar curso'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					{!! Form::model($curso, array('route' => ['cursos.update', $curso->id], 'method' => 'PUT', 'id' => 'cursoForm', 'name' => 'cursoForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form')) !!}
						@include('cursos.form.CursoFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Actualizar", 'rutaCancelar' => URL::route('cursos.index'), 'valorData' => 0, 'idBoton' => 'cursoSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop