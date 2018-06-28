<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $conexiones->id !!}</p>
</div>

<!-- Id From Field -->
<div class="form-group">
    {!! Form::label('id_from', 'Nodo de salida:') !!}
    <p>{!! $conexiones->id_from !!}</p>
</div>

<!-- Id To Field -->
<div class="form-group">
    {!! Form::label('id_to', 'Nodo de llegada:') !!}
    <p>{!! $conexiones->id_to !!}</p>
</div>

<!-- Peso de la arista Field -->
<div class="form-group">
    {!! Form::label('peso_arista', 'Peso de la arista:') !!}
    <p>{!! $conexiones->peso_arista !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado el:') !!}
    <p>{!! $conexiones->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Modificado el:') !!}
    <p>{!! $conexiones->updated_at !!}</p>
</div>

