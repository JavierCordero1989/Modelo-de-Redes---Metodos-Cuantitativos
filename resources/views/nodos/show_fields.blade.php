<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $nodos->id !!}</p>
</div>

<!-- Nombre Nodo Field -->
<div class="form-group">
    {!! Form::label('nombre_nodo', 'Nombre Nodo:') !!}
    <p>{!! $nodos->nombre_nodo !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $nodos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $nodos->updated_at !!}</p>
</div>

