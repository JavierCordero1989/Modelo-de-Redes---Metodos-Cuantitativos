<!-- Id From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_from', 'Nodo de salida:') !!}
    {!! Form::number('id_from', null, ['class' => 'form-control']) !!}
</div>

<!-- Id To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_to', 'Nodo de llegada:') !!}
    {!! Form::number('id_to', null, ['class' => 'form-control']) !!}
</div>

<!-- Peso de la arista -->
<div class="form-group col-sm-6">
    {!! Form::label('peso_arista', 'Peso de la arista:') !!}
    {!! Form::number('peso_arista', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('conexiones.index') !!}" class="btn btn-default">Cancelar</a>
</div>
