@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Proyecto a modificar
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($proyectos, ['route' => ['proyectos.update', $proyectos->id], 'method' => 'patch']) !!}

                        @include('proyectos.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection