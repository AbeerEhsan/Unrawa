@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/css/select2.min.css">

<style>
.select2-container--default .select2-selection--multiple .select2-selection__choice {
     background-color: #3c8dbc;
     border-color: #367fa9;
}
</style>

@endsection
@section('content')
    <section class="content-header">
        <h1>
            Transfer
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'transfers.store' , 'enctype'=>"multipart/form-data"]) !!}

                        @include('transfers.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection








@push('scripts')


    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.12/js/select2.min.js"></script>
     
    <script>
     $(document).ready(function(){
        $('#driver').select2();
     });   
    </script>

    <script>
     $(document).ready(function(){
        $('#to').select2();
     });   
    </script>


    <script>
     $(document).ready(function(){
       $('#category').select2(
           {placeholder: "Select Category",       
            //    tags: true
            multiple: true

           });
    });   
   </script>
@endpush
