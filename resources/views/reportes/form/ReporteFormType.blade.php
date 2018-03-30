<div class="p-20">
    <div class="form-group row">
        <label for="anio" class="col-sm-2 col-sm-offset-3 form-control-label">Año <span class="text-danger">*</span></label>
        <div class="col-sm-4">
            {!! Form::select('anio', $anios, null, $attributes = array('id' => 'anio', 'class' => 'form-control', 'required' => true)) !!}
        </div>
    </div>
    <div class="form-group row">
        <label for="modulo" class="col-sm-2 col-sm-offset-3 form-control-label">Módulo <span class="text-danger">*</span></label>
        <div class="col-sm-4">
            {!! Form::select('modulo', ["" => "Seleccione una opción", "Cursos" => "Cursos", "Inspecciones Principal" => "Inspecciones Principal", "Inspecciones CADETEC" => "Inspecciones CADETEC", "Inspecciones Anexo I" => "Inspecciones Anexo I", "Inspecciones Juncal" => "Inspecciones Juncal", "Inspecciones Condor" => "Inspecciones Condor", "Inducciones" => "Inducciones", "Formación CSSL" => "Formación CSSL"], null, $attributes = array('id' => 'modulo', 'class' => 'form-control', 'required' => true)) !!}
        </div>
    </div>
</div>