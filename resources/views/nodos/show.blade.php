@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Información del nodo
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('nodos.show_fields')
                    <a href="{!! route('nodos.index') !!}" class="btn btn-default">Volver</a>
                </div>
            </div>
        </div>
    </div>
@endsection
