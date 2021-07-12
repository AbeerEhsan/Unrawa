<!-- Driver Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('driver_id', 'Driver Name - Van.No :') !!}
   
    <select style="height: 40px;" name="driver_id" id="driver"  class="js-states form-control">
        @foreach($drivers as $driver)
                <option id= "{{$driver->van_num}} "   {{isset($transfer) && $transfer->driver_id==$driver->id?"selected":" "}}
                value='{{$driver->id}}'>  {{$driver->name}} - {{$driver->van_num}} </option>
        @endforeach
     </select>

</div>

<div class="form-group col-sm-6">
    {!! Form::label('to', 'Forward To:') !!}
    {{-- {!! Form::text('to', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!} --}}

    
    <select style="height: 40px;" name="to" id="to"  class="js-states form-control">
        @foreach($forwards as $forward)
                <option    {{isset($transfer) && $transfer->to==$forward->id?"selected":" "}}
                value='{{$forward->id}}'>  {{$forward->name}}  </option>
        @endforeach
     </select>

</div>

<div class="form-group col-sm-6">
    {!! Form::label('category_id', 'Category Name:') !!}
   
    <select style="height: 40px;" name="categories[]" multiple="multiple" id="category" class="js-states form-control">
        @foreach($categories as $category)
         @if ((Request::is('transfers/create'))) 
        <option value='{{$category->id}}'> {{$category->name}} </option>
         @else

                    @if(in_array($category->id, $transferCategIds))
                        <option value="{{ $category->id }}" selected="true">{{ $category->name }}</option>
                        @else
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif 
                      

                   @endif

        @endforeach
        



    </select>

</div>
{{-- 
<div class="form-group col-sm-6">
    {!! Form::label('cart_note', 'Van Num:') !!}
    <input type="text" class="form-control" readonly value="">
</div> --}}


<!-- Day Field -->
<div class="form-group col-sm-6">
    {!! Form::label('day', 'Day:') !!}
    {!! Form::text('day', null, ['class' => 'form-control','id'=>'day' ,'maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('date', 'Date:') !!}
    {!! Form::text('date', null, ['class' => 'form-control','id'=>'date','maxlength' => 255,'maxlength' => 255]) !!}
</div>



 
<!-- Time Field -->
<div class="form-group col-sm-6">
    {!! Form::label('time', 'Time:') !!}
    {!! Form::text('time', null, ['class' => 'form-control',
    'id'=>'time',
    'maxlength' => 255,
     'maxlength' => 255]) !!}
</div>


<!-- Cart Note Field -->
<div class="form-group col-sm-6">
    {!! Form::label('cart_note', 'Cart Note:') !!}
    {!! Form::number('cart_note', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('img', 'Cart Note File : ') !!}
    <input type='file' name='img' onchange="readURL(this);" />
    @if ((!Request::is('transfers/create'))) 
       <a target="_blank" href="@if(isset($transfer)){{asset('/uploads/files/carts/'. $transfer->img)}} @endif" class="btn btn-success "  style="margin-top:10px;"> Cart Note File </a>
    @endif
</div>




<!-- Category Id Field -->

 
<!-- To Field -->


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('transfers.index') }}" class="btn btn-default">Cancel</a>
</div>


@push('scripts')
    <script type="text/javascript">
        $('#date').datetimepicker({
            format: 'YYYY-MM-DD ',
            useCurrent: true,
            sideBySide: true
        })
    </script>

     <script type="text/javascript">
        $('#day').datetimepicker({
            format: 'dddd',
            useCurrent: true,
            sideBySide: true
        })
    </script>

      <script type="text/javascript">
        $('#time').datetimepicker({
            format: 'h:m a',
            useCurrent: true,
            sideBySide: true
        })
    </script>
@endpush
