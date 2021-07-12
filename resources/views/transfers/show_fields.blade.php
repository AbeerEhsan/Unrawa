{{-- <!-- Driver Id Field -->
<div class="form-group">
    {!! Form::label('driver_id', 'Driver Name:') !!}
    <p>{{ $transfer->driver->name }}</p>
</div>

<!-- Cart Note Field -->
<div class="form-group">
    {!! Form::label('cart_note', 'Cart Note:') !!}
    <p>{{ $transfer->cart_note }}</p>
</div>

<!-- Day Field -->
<div class="form-group">
    {!! Form::label('day', 'Day:') !!}
    <p>{{ $transfer->day }}</p>
</div>

<!-- Date Field -->
<div class="form-group">
    {!! Form::label('date', 'Date:') !!}
    <p>{{ $transfer->date }}</p>
</div>

<!-- Time Field -->
<div class="form-group">
    {!! Form::label('time', 'Time:') !!}
    <p>{{ $transfer->time }}</p>
</div>

<!-- Category Id Field -->
<div class="form-group">
    {!! Form::label('category_id', 'Category Name:') !!}
    @if (count($transfer->categories)!= 0)
      @foreach ( $transfer->categories as  $category)
        <li>{{ $category->name }}</li>
        @endforeach
        @else
        <p>There is no Tag fo this post</p>
        @endif


</div>
{{-- 
<!-- To Field -->
<div class="form-group">
    {!! Form::label('to', 'To:') !!}
    <p>{{ $transfer->to }}</p>
</div> --}}

<div class="container">
<div class="row">


  <div class="col-md-10  admin-content" id="profile">
<h4>Transfer Details:</h4>
<table class="table table-bordered success">
    <thead>				
        <tr>
        <th class="info ">Driver Name:</th>
        <td>{{ $transfer->driver->name }}</td>
        </tr>
        <tr>
        <th class="info ">Cart Note:</th>
        <td> {{ $transfer->cart_note }}</td>
        </tr>
        
        <tr>
        <th class="info ">Day:</th>
        <td>{{ $transfer->day }}</td>
        </tr>
    
        <tr >
        <th class="info "  class="info">Date:</th>
        <td>{{ $transfer->date }}</td>
        </tr>
        <tr>
        <th class="info " valign="top">Time</th>
        <td>{{ $transfer->time }}</td>
        </tr>
        <tr>
        <th class="info " valign="top">Forward To</th>
        <td>{{ $transfer->forward->name??'' }}</td>
        </tr>
        <tr>
        <th class="info " valign="top"> Categories Names:</th>
        <td>
            @if (count($transfer->categories)!= 0)
                    @foreach ( $transfer->categories as  $category)
                    <li>{{ $category->name }}</li>
                    @endforeach
            @else
                    <p>There is no Tag fo this post</p>
            @endif

        </td>
        </tr>

         <tr>
        <th class="info " valign="top"> Cart Note File:</th>
        <td>
       <a target="_blank" href="@if(isset($transfer)){{asset('/uploads/files/carts/'. $transfer->img)}} @endif" class="btn btn-success" > Cart Note File </a>

        </td>
        </tr>
    

    </thead>

    </table>
       <a href="{{ route('transfers.index') }}" class="btn btn-default">Back</a>


</div>     
</div>     
</div>