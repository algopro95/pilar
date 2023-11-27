<!-- Sales Person Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sales_person_name', 'Sales Person Name:') !!}
    {!! Form::text('sales_person_name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Address Field -->
<div class="form-group col-sm-6">
    {!! Form::label('address', 'Address:') !!}
    {!! Form::text('address', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Contact Field -->
<div class="form-group col-sm-6">
    {!! Form::label('contact', 'Contact:') !!}
    {!! Form::text('contact', null, ['class' => 'form-control', 'required']) !!}
</div>