<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control','maxlength' => 255,'maxlength' => 255]) !!}
</div>

<!-- Van Num Field -->
<div class="form-group col-sm-6">
    {!! Form::label('van_num', 'Van Num:') !!}
    {!! Form::text('van_num', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('drivers.index') }}" class="btn btn-default">Cancel</a>
</div>
