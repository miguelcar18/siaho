<div class="form-group row">
	<div class="col-sm-6">
		{!! Form::button($tituloBoton, ['class'=> 'btn btn-primary waves-effect waves-light pull-right', 'id' => $idBoton, 'type' => 'submit', 'data' => $valorData]) !!}
	</div>
	<div class="col-sm-6">
		{!! Form::button('Cancelar', ['class'=> 'btn btn-secondary waves-effect m-l-5', 'id' => 'cancelar', 'type' => 'button', 'onclick' => "document.location.href = '".$rutaCancelar."'"]) !!}
	</div>
</div>