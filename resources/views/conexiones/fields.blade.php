<!-- Id From Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_from', 'Id From:') !!}
    {!! Form::number('id_from', null, ['class' => 'form-control']) !!}
</div>

<!-- Id To Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id_to', 'Id To:') !!}
    {!! Form::number('id_to', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('conexiones.index') !!}" class="btn btn-default">Cancel</a>
</div>
