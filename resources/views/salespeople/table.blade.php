<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table" id="salespeople-table">
            <thead>
            <tr>
                <th>Sales Person Name</th>
                <th>Address</th>
                <th>Contact</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($salespeople as $salesperson)
                <tr>
                    <td>{{ $salesperson->sales_person_name }}</td>
                    <td>{{ $salesperson->address }}</td>
                    <td>{{ $salesperson->contact }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['salespeople.destroy', $salesperson->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            <a href="{{ route('salespeople.show', [$salesperson->id]) }}"
                               class='btn btn-default btn-xs'>
                                <i class="far fa-eye"></i>
                            </a>
                            <a href="{{ route('salespeople.edit', [$salesperson->id]) }}"
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
            @include('adminlte-templates::common.paginate', ['records' => $salespeople])
        </div>
    </div>
</div>
