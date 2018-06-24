<!-- Nombre Nodo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_nodo', 'Nombre Nodo:') !!}
    {!! Form::text('nombre_nodo', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nodos.index') !!}" class="btn btn-default">Cancel</a>
</div>
