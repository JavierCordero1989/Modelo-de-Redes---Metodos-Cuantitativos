<!-- Nombre Nodo Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre_nodo', 'Nombre Nodo:') !!}
    {!! Form::text('nombre_nodo', null, ['class' => 'form-control']) !!}
</div>

<!-- Url de la imagen Field -->
<div class="form-group col-sm-6">
    {!! Form::label('url_imagen', 'Imagen del nodo:') !!}
    {!! Form::file('url_imagen', null, ['class' => 'form-control']) !!}
</div>

<!-- El ID del proyecto se debe guardar automaticamente -->

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('nodos.index') !!}" class="btn btn-default">Cancelar</a>
</div>
