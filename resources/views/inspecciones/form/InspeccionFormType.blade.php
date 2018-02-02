<div class="p-20">
	<div class="form-group row">
		<label for="fecha" class="col-sm-2 col-sm-offset-3 form-control-label">Fecha <span class="text-danger">*</span></label>
		<div class="col-sm-4">
			@if(isset($inspeccion->fecha))
			<?php 
				$separarFecha =  explode('-', $inspeccion->fecha);
				$fechaNormal =  $separarFecha[2].'/'.$separarFecha[1].'/'.$separarFecha[0];
			?>
			{!! Form::text('fecha', $fechaNormal, ['placeholder' => 'dd/mm/yyyy', 'class' => 'form-control datepicker', 'id' => 'fecha', 'required' => true]) !!}
			@else
			{!! Form::text('fecha', null, ['placeholder' => 'dd/mm/yyyy', 'class' => 'form-control datepicker', 'id' => 'fecha', 'required' => true]) !!}
			@endif
		</div>
	</div>
	<div class="form-group row">
		<label for="tipo" class="col-sm-2 col-sm-offset-3 form-control-label">Tipo <span class="text-danger">*</span></label>
		<div class="col-sm-4">
			{!! Form::text('tipo', null, ['placeholder' => 'Tipo', 'class' => 'form-control', 'id' => 'tipo', 'required' => true]) !!}
		</div>
	</div>
	<div class="form-group row">
		<label for="realizado" class="col-sm-2 col-sm-offset-3 form-control-label">Realizado <span class="text-danger">*</span></label>
		<div class="col-sm-4">
			{!! Form::select('realizado', ["" => "Seleccione una opción", "1" => "Si", "0" => "No"], null, $attributes = array('id' => 'realizado', 'class' => 'form-control', 'required' => true)) !!}
		</div>
	</div>
</div>