<table class="table table-responsive" id="nodos-table">
    <thead>
        <tr>
            <th>Nombre Nodo</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($nodos as $nodos)
        <tr>
            <td>{!! $nodos->nombre_nodo !!}</td>
            <td>
                {!! Form::open(['route' => ['nodos.destroy', $nodos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('nodos.show', [$nodos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('nodos.edit', [$nodos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>