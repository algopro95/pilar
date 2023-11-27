<!-- Product Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_name', 'Product Name:') !!}
    {!! Form::text('product_name', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Price Field -->
<div class="form-group col-sm-6">
    {!! Form::label('price', 'Price:') !!}
    {!! Form::text('price', null, ['class' => 'form-control', 'required']) !!}
</div>