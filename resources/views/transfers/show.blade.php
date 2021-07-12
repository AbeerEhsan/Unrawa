@extends('layouts.app')
@section('css')

<style>


.table {
border: 1px solid #020138;

width: 100%;
margin-bottom: 20px;
background-color: #fff;
border-collapse: collapse;
border-spacing: 0;
display: table;
}

.table-bordered>thead>tr>th, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>tbody>tr>td, .table-bordered>tfoot>tr>td {
    border: 1px solid #000;
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
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('transfers.show_fields')
                </div>
            </div>
        </div>
    </div>
@endsection
