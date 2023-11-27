<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="sales-table">
            <thead>
            <tr>
                <th>Sales Date</th>
                <th>Product Id</th>
                <th>Sales Amount</th>
                <th>Sales Amount</th>
                <th>Sales Person Id</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($sales as $sales)
                <tr>
                    <td>{{ $sales->sales_date }}</td>
                    <td>{{ $sales->product_id }}</td>
                    <td>{{ $sales->sales_amount }}</td>
                    <td>{{ $sales->sales_amount }}</td>
                    <td>{{ $sales->sales_person_id }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['sales.destroy', $sales->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('sales.show', [$sales->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('sales.edit', [$sales->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-edit"></i>
                            </a>
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">

        </div>
    </div>
</div>
