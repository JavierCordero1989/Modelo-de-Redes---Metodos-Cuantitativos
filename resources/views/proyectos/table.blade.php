<table class="table table-responsive" id="proyectos-table">
    <thead>
        <tr>
            <th>Nombre Proyecto</th>
        <th>Descripcion</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($proyectos as $proyectos)
        <tr>
            <td>{!! $proyectos->nombre_proyecto !!}</td>
            <td>{!! $proyectos->descripcion !!}</td>
            <td>
                {!! Form::open(['route' => ['proyectos.destroy', $proyectos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('proyectos.show', [$proyectos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('proyectos.edit', [$proyectos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>