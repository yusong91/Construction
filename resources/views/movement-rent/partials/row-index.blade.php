<div class="table-responsive" style="padding-top: 40px;">
    <table class="table table-borderless table-striped" style="width: 2000px;">
        <thead> 
            <th class="text-center">No</th>
            <th class="text-center" style="width: 100 px;">Equipment Type</th>
            <th class="text-center" style="width: 100 px;">Equipment Id</th>
            <th class="text-center" style="width: 100 px;">Company Name</th>
            <th class="text-center" style="width: 200 px;">Customer Name</th>
            <th class="text-center" style="width: 100 px;">Customer Telephone</th>
            <th class="text-center" style="width: 200 px;">Date</th>
            <th class="text-center" style="width: 200 px;">From Location</th>
            <th class="text-center" style="width: 200 px;">To Location</th>
            <th class="text-center" style="width: 200 px;">Expected Number of Working Days</th>
            <th class="text-center" style="width: 100 px;">Action</th>   
        </thead>
        <tbody> 
            @if(count($movements))
                @foreach($movements as $item)
                    <tr>
                        <td class="text-center align-middle">{{ $loop->index + 1 }}</td>
                        <td class="text-center align-middle">{{ $item->parent_type->value }}</td>
                        <td class="text-center align-middle">{{ $item->parent_equipment->equipment_id ?? '' }}</td>
                        <td class="text-center align-middle">{{ $item->parent_customer->company_name }}</td>
                        <td class="text-center align-middle">{{ $item->customer_name }}</td>
                        <td class="text-center align-middle">{{ $item->customer_phone }}</td>
                        <td class="text-center align-middle">{{ getDateFormat($item->date) }}</td>
                        <td class="text-center align-middle">{{ $item->from_location }}</td>
                        <td class="text-center align-middle">{{ $item->to_location }}</td>
                        <td class="text-center align-middle">{{ $item->expected_date }}</td>
                        <td class="text-center align-middle">
                            
                            <a href="{{ route('movement.edit', $item->id) }}" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i> </a>

                            <a href="{{ route('movement.destroy', $item->id) }}" class="btn btn-icon" data-action="" title="Delete" data-toggle="tooltip" data-placement="top" data-method="DELETE" data-confirm-title="@lang('app.please_confirm')" data-confirm-text="@lang('app.confirm_delete')" data-confirm-delete="@lang('app.yes_proceed')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="11"><em>@lang('app.no_records_found')</em></td>
                </tr>
            @endif
            
        </tbody>
    </table> 
</div>