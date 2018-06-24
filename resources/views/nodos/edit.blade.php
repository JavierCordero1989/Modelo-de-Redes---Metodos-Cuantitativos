@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Nodos
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($nodos, ['route' => ['nodos.update', $nodos->id], 'method' => 'patch']) !!}

                        @include('nodos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection