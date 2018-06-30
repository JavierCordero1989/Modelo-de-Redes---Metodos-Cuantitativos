<table class="table table-responsive" id="nodos-table">
    <thead>
        <tr>
            <th>Nombre Nodo</th>
            <th>Imagen</th>
            <!-- <th>Nombre del proyecto</th> Debe cargarse automatico -->
            <th colspan="3">Acciones</th>
        </tr>
    </thead>
    <tbody>
    @foreach($nodos as $nodos)
        <tr>
            <td>{!! $nodos->nombre_nodo !!}</td>
            <td><img src="{!! $nodos->url_imagen !!}" alt="Imagen del nodo" style="width: 50px; height: 50px;"></td>
            <td>
                {!! Form::open(['route' => ['nodos.destroy', $nodos->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('nodos.show', [$nodos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('nodos.edit', [$nodos->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('¿Esta seguro de eliminar el nodo?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>