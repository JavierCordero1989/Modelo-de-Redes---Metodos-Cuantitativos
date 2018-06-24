<!-- Id Field -->
<div class="form-group">
    {!! Form::label('id', 'Id:') !!}
    <p>{!! $proyectos->id !!}</p>
</div>

<!-- Nombre Proyecto Field -->
<div class="form-group">
    {!! Form::label('nombre_proyecto', 'Nombre Proyecto:') !!}
    <p>{!! $proyectos->nombre_proyecto !!}</p>
</div>

<!-- Descripcion Field -->
<div class="form-group">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    <p>{!! $proyectos->descripcion !!}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{!! $proyectos->created_at !!}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{!! $proyectos->updated_at !!}</p>
</div>

