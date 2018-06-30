@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Conexión a modificar
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($conexiones, ['route' => ['conexiones.update', $conexiones->id], 'method' => 'patch']) !!}

                        @include('conexiones.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection