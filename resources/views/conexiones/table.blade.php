<table class="table table-responsive" id="conexiones-table">
    <thead>
        <tr>
            <th>Nodo de salida</th>
            <th>Nodo de llegada</th>
            <th>Peso de la arista</th>
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($conexiones as $conexiones)
        <tr>
            <td>{!! $conexiones->id_from !!}</td>
            <td>{!! $conexiones->id_to !!}</td>
            <td>{!! $conexiones->peso_arista !!}</td>
            <td>
                {!! Form::open(['route' => ['conexiones.destroy', $conexiones->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('conexiones.show', [$conexiones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('conexiones.edit', [$conexiones->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Esta seguro de eliminar la conexión?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>