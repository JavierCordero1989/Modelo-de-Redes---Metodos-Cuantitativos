<li class="{{ Request::is('nodos*') ? 'active' : '' }}">
    <a href="{!! route('nodos.index') !!}"><i class="fa fa-edit"></i><span>Nodos</span></a>
</li>

<li class="{{ Request::is('conexiones*') ? 'active' : '' }}">
    <a href="{!! route('conexiones.index') !!}"><i class="fa fa-edit"></i><span>Conexiones</span></a>
</li>

<li class="">
    <a href="/grafo"><i class="fa fa-edit"></i><span>Grafo</span></a>
</li>