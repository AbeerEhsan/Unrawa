@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Forward
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($forward, ['route' => ['forwards.update', $forward->id], 'method' => 'patch']) !!}

                        @include('forwards.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection