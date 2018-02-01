<div class="p-20">
	<div class="form-group row">
		<label for="nombre" class="col-sm-2 col-sm-offset-3 form-control-label">Nombre <span class="text-danger">*</span></label>
		<div class="col-sm-4">
			{!! Form::text('nombre', null, ['placeholder' => 'Nombre', 'class' => 'form-control', 'id' => 'nombre', 'required' => true]) !!}
		</div>
	</div>
	<div class="form-group row">
		<label for="apellido" class="col-sm-2 col-sm-offset-3 form-control-label">Apellido <span class="text-danger">*</span></label>
		<div class="col-sm-4">
			{!! Form::text('apellido', null, ['placeholder' => 'Apellido', 'class' => 'form-control', 'id' => 'apellido', 'required' => true]) !!}
		</div>
	</div>
	<div class="form-group row">
		<label for="cedula" class="col-sm-2 col-sm-offset-3 form-control-label">Cédula <span class="text-danger">*</span></label>
		<div class="col-sm-4">
			{!! Form::text('cedula', null, ['placeholder' => 'Cédula', 'class' => 'form-control', 'id' => 'cedula', 'required' => true]) !!}
		</div>
	</div>
	<div class="form-group row">
		<label for="cargo" class="col-sm-2 col-sm-offset-3 form-control-label">Cargo <span class="text-danger">*</span></label>
		<div class="col-sm-4">
			{!! Form::text('cargo', null, ['placeholder' => 'Cargo', 'class' => 'form-control', 'id' => 'cargo', 'required' => true]) !!}
		</div>
	</div>
	<div class="form-group row">
		<label for="departamento" class="col-sm-2 col-sm-offset-3 form-control-label">Departamento <span class="text-danger">*</span></label>
		<div class="col-sm-4">
			{!! Form::select('departamento', ["" => "Seleccione una opción", "Administración" => "Administración", "Cadetec" => "Cadetec", "Calidad" => "Calidad", "Contabilidad" => "Contabilidad", "Control Académico" => "Control Académico", "Coordinación de Extensión" => "Coordinación de Extensión", "Dirección Nacional" => "Dirección Nacional", "Dobe" => "Dobe", "Extensión Universitaria" => "Extensión Universitaria", "Investigación Y Postgrado" => "Investigación Y Postgrado", "Personal" => "Personal", "Sección de Vigilancia" => "Sección de Vigilancia", "Servicios Generales" => "Servicios Generales", "Tecnología Educativa" => "Tecnología Educativa"], null, ['id' => 'departamento', 'class' => 'form-control', 'required' => true]) !!}
		</div>
	</div>
</div>