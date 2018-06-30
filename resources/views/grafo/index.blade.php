@extends('layouts.app')

@section('content')

    <section class="content-header">
        <h1 class="pull-left">Grafo - Id de usuario: {!! Auth::user()->id !!}</h1>
        <h1 class="pull-right">
           <a class="btn btn-success pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{--{!! route('especies.create') !!}--}}#">Calcular ruta mas corta</a>
        </h1>
        <!-- {{--{!! Form::open(['route' => 'guardarGrafo','files' => true]) !!}--}}

        {{--{!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}--}}
        {{--<a href="{!! route('especies.index') !!}" class="btn btn-default">Cancelar</a>--}}

        {{--{!! Form::close() !!}--}} -->
    </section>

    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                @include('grafo.grafo')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/vis/4.21.0/vis.min.js"></script> --}}
@endsection