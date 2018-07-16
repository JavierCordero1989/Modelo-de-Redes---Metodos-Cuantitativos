<li class="{{ Request::is('nodos*') ? 'active' : '' }}">
    <a href="{!! route('nodos.index') !!}"><i class="fa fa-edit"></i><span>Nodos</span></a>
</li>

<li class="{{ Request::is('conexiones*') ? 'active' : '' }}">
    <a href="{!! route('conexiones.index') !!}"><i class="fa fa-edit"></i><span>Conexiones</span></a>
</li>

<li class="">
    <a href="/grafo"><i class="fa fa-edit"></i><span>Grafo</span></a>
</li>

{{-- <li class=""> --}}
    {{-- <a href="#"><i class="fa fa-edit"></i><span>Ella no te ama...</span></a> --}}
{{-- </li> --}}

<li class="{{ Request::is('proyectos*') ? 'active' : '' }}">
    <a href="{!! route('proyectos.index') !!}"><i class="fa fa-edit"></i><span>Proyectos</span></a>
</li>

<li class="">
    <a href="/grafo-nuevo"><i class="fa fa-edit"></i><span>Grafo Nuevo</span></a>
</li>