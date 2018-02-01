@extends('layouts.base')

@section('titulo')
    <title>Nuevo curso - SIAHO</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => 'Nuevo curso', 'tituloModulo' => 'Cursos', 'rutaModulo' => URL::route('cursos.index'), 'tituloSubmodulo' => 'Nuevo curso'])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					{!! Form::open(['route' => 'cursos.store', 'method' => 'post', 'id' => 'cursoForm', 'name' => 'cursoForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form']) !!}
						@include('cursos.form.CursoFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Guardar", 'rutaCancelar' => URL::route('cursos.index'), 'valorData' => 1, 'idBoton' => 'cursoSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop