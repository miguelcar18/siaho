@extends('layouts.base')

@section('titulo')
    <title>Gestión - HSI</title>
@stop

@section('contenido')
@include('layouts.breadcrum', ['titulo' => "Getión HSI", 'tituloModulo' => "Getión HSI"])
<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					<div class="card-block text-xs-center">
						<h4 class="card-title">Indicador de Gestión por Módulo</h4>
					</div>
					{!! Form::open(['route' => 'gestionSiaho', 'method' => 'post', 'id' => 'reporteForm', 'name' => 'reporteForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form', 'target' => '_blank']) !!}
						@include('reportes.form.ReporteFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Ver reporte", 'rutaCancelar' => URL::route('principal'), 'valorData' => 1, 'idBoton' => 'reporteSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->

<div class="row">
	<div class="col-xs-12">
		<div class="card-box">
			<div class="row">
				<div class="col-sm-12 col-xs-12 col-md-12">
					<div class="card-block text-xs-center">
						<h4 class="card-title">Monitoreo y Vigilancia Epidemiologica de la Salud de los Trabajadores y Trabajadoras</h4>
					</div>
					{!! Form::open(['route' => 'gestionSiahoAtm', 'method' => 'post', 'id' => 'reporteAtmForm', 'name' => 'reporteAtmForm', 'class' => '', 'novalidate' => 'novalidate', 'role' => 'form', 'target' => '_blank']) !!}
						@include('reportes.form.ReporteATMFormType')
						@include('layouts.botonesFormularios', ['tituloBoton' => "Ver reporte", 'rutaCancelar' => URL::route('principal'), 'valorData' => 1, 'idBoton' => 'reporteAtmSubmit'])
					{!! Form::close()!!}
				</div>
			</div>
			<!-- end row -->
		</div>
	</div><!-- end col-->
</div>
<!-- end row -->
@stop