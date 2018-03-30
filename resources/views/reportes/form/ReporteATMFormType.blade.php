<div class="p-20">
    <div class="form-group row">
        <label for="anio" class="col-sm-2 col-sm-offset-3 form-control-label">Año <span class="text-danger">*</span></label>
        <div class="col-sm-4">
            {!! Form::select('anioAtm', $anios, null, $attributes = array('id' => 'anioAtm', 'class' => 'form-control', 'required' => true)) !!}
        </div>
    </div>
</div>