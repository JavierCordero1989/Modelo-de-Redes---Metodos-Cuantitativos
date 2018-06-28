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

<!-- Imagen Field -->
<div class="form-group">
    {!! Form::label('url_imagen', 'Imagen:') !!}
    <p><img src="{!! '../../' . $nodos->url_imagen !!}" alt="Imagen del nodo" style="width: 50px; height: 50px;"></p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Creado el:') !!}
    <p>{!! $nodos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Modificado el:') !!}
    <p>{!! $nodos->updated_at !!}</p>
</div>

