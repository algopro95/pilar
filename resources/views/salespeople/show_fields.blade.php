<!-- Sales Person Name Field -->
<div class="col-sm-12">
    {!! Form::label('sales_person_name', 'Sales Person Name:') !!}
    <p>{{ $salesperson->sales_person_name }}</p>
</div>

<!-- Address Field -->
<div class="col-sm-12">
    {!! Form::label('address', 'Address:') !!}
    <p>{{ $salesperson->address }}</p>
</div>

<!-- Contact Field -->
<div class="col-sm-12">
    {!! Form::label('contact', 'Contact:') !!}
    <p>{{ $salesperson->contact }}</p>
</div>

<!-- Created At Field -->
<div class="col-sm-12">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $salesperson->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="col-sm-12">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $salesperson->updated_at }}</p>
</div>

