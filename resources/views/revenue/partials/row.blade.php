<div class="table-responsive" style="padding-top: 40px;">
    <table class="table table-borderless table-striped" style="width: 1500px;">
        <thead> 
            <th class="text-center align-middle">No</th>
            <th class="text-center align-middle" style="width: 120px;">Equipment ID</th>
            <th class="text-center align-middle" style="width: 200px;">Customer</th>
            <th class="text-center align-middle" style="width: 100px;">From Date</th>
            <th class="text-center align-middle" style="width: 100px;">To Date</th>
            <th class="text-center align-middle" style="width: 200px;">Number of Working Days</th>
            <th class="text-center align-middle" style="width: 150px;">Rental Price</th>
            <th class="text-center align-middle" style="width: 100px;">Amount</th>
            <th class="text-center align-middle" style="width: 300px;">Notes</th>
            <th class="text-center align-middle">Action</th>            
        </thead>
        <tbody>  
            
        @if(count($revenues))
            @foreach($revenues as $item)
                <tr>
                    <td class="text-center align-middle">{{ 1 + $loop->index }}</td>
                    <td class="text-center align-middle">{{ $item->parent_equipment->equipment_id }}</td>
                    <td class="text-center align-middle">{{ $item->parent_customer->company_name }}</td>
                    
                    <td class="text-center align-middle">{{ getDateFormat($item->from_date) }}</td>
                    <td class="text-center align-middle">{{ getDateFormat($item->to_date) }}</td>
                    <td class="text-center align-middle">{{ $item->number_working_day }}</td>
                    <td class="text-center align-middle">${{ $item->rent_price }}</td>
                    <td class="text-center align-middle">${{ $item->amount }}</td>
                    <td class="text-center align-middle">{{ $item->note }}</td>
                    <td class="text-center align-middle">
                            
                        <a href="{{ route('revenue.edit', $item->id) }}" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i> </a>

                        <a href="{{ route('revenue.destroy', $item->id) }}" class="btn btn-icon" data-action="" title="Delete"  data-toggle="tooltip" data-placement="top" data-method="DELETE" data-confirm-title="@lang('app.please_confirm')" data-confirm-text="@lang('app.confirm_delete')" data-confirm-delete="@lang('app.yes_proceed')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td> 
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="10"><em>@lang('app.no_records_found')</em></td>
            </tr>
        @endif
               
        </tbody>
    </table> 
</div>