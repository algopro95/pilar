<!-- Sales Date Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sales_date', 'Sales Date:') !!}
    {!! Form::text('sales_date', null, ['class' => 'form-control','id'=>'sales_date']) !!}
</div>

@push('page_scripts')
    <script type="text/javascript">
        $('#sales_date').datepicker()
    </script>
@endpush

<!-- Product Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('product_id', 'Product Id:') !!}
    {!! Form::text('product_id', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Sales Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sales_amount', 'Sales Amount:') !!}
    {!! Form::text('sales_amount', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Sales Amount Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sales_amount', 'Sales Amount:') !!}
    {!! Form::text('sales_amount', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Sales Person Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('sales_person_id', 'Sales Person Id:') !!}
    {!! Form::text('sales_person_id', null, ['class' => 'form-control', 'required']) !!}
</div>