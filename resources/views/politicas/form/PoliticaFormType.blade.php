<div class="p-20">
	<div class="form-group row">
		<label for="fecha" class="col-sm-2 col-sm-offset-3 form-control-label">Fecha <span class="text-danger">*</span></label>
		<div class="col-sm-4">
			@if(isset($politica->fecha))
			<?php 
				$separarFecha =  explode('-', $politica->fecha);
				$fechaNormal =  $separarFecha[2].'/'.$separarFecha[1].'/'.$separarFecha[0];
			?>
			{!! Form::text('fecha', $fechaNormal, ['placeholder' => 'dd/mm/yyyy', 'class' => 'form-control datepicker', 'id' => 'fecha', 'required' => true]) !!}
			@else
			{!! Form::text('fecha', null, ['placeholder' => 'dd/mm/yyyy', 'class' => 'form-control datepicker', 'id' => 'fecha', 'required' => true]) !!}
			@endif
		</div>
	</div>
	<div class="form-group row">
		<label for="cedula" class="col-sm-2 col-sm-offset-3 form-control-label">Trabajador <span class="text-danger">*</span></label>
		<div class="col-sm-4">
			{!! Form::select('trabajador', $trabajadores, null, $attributes = array('id' => 'trabajador', 'class' => 'form-control', 'required' => true)) !!}
		</div>
	</div>
</div>