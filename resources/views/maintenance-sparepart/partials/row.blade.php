<div class="table-responsive" style="padding-top: 40px;">
    <table class="table table-borderless table-striped" style="width: 2000px;">
        <thead> 
            <th class="text-center align-middle" style="width: 100px;">Date</th>
            <th class="text-center align-middle" style="width: 300px;">Equipment ID</th>
            <th class="text-center align-middle" style="width: 300px;">Spare Part</th>
            <th class="text-center align-middle" style="width: 200px;">Service</th>
            <th class="text-center align-middle" style="width: 100px;">Quantity</th>
            <th class="text-center align-middle" style="width: 150px;">Unit</th>
            <th class="text-center align-middle" style="width: 150px;">Unit Price</th>
            <th class="text-center align-middle" style="width: 100px;">Amount</th>
            <th class="text-center align-middle" style="width: 250px;">Supplier Name</th>
            <th class="text-center align-middle" style="width: 250px;">Responsible Person</th>
            <th class="text-center align-middle" style="width: 500px;">Memo</th>
            <th class="text-center align-middle" style="width: 100px;">Image of Broken</th>
            <th class="text-center align-middle" style="width: 100px;">Image of Replacement</th> 
            <th class="text-center align-middle">Action</th>  
        </thead>
        <tbody> 
            @if(count($maintenances))
                @foreach($maintenances  as $item)
                    <tr>
                        <td class="text-center align-middle">{{ getDateFormat($item->date) }}</td>
                        <td class="text-center align-middle">{{ $item->parent_equipment->equipment_id}}</td>
                        <td class="text-center align-middle">{{ $item->parent_inventory->name }}</td>
                        <td class="text-center align-middle">{{ $item->service }}</td>
                        <td class="text-center align-middle">{{ $item->quantity }}</td>
                        <td class="text-center align-middle">{{ $item->unit }}</td>
                        <td class="text-center align-middle">{{ $item->unit_price }}</td>
                        <td class="text-center align-middle">{{ $item->amount }}</td>
                        <td class="text-center align-middle">{{ $item->parent_supplier->company_name }}</td>
                        <td class="text-center align-middle">{{ $item->parent_staff->name }}</td>
                        <td class="text-center align-middle">{{ $item->note }}</td>
                        <td class="text-center align-middle"><img src="{{ getUrl($item->image_broken) }}" width="100"></td>
                        <td class="text-center align-middle"><img src="{{ getUrl($item->image_replace) }}" width="100"></td>   
                        <td class="align-middle">        
                            <a href="{{ route('maintenance.edit', $item->id) }}" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i> </a>
                            <a href="{{ route('maintenance.destroy', $item->id) }}" class="btn btn-icon" data-action="" title="Delete" data-toggle="tooltip" data-placement="top" data-method="DELETE"data-confirm-title="@lang('app.please_confirm')" data-confirm-text="@lang('app.confirm_delete')" data-confirm-delete="@lang('app.yes_proceed')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="13"><em>@lang('app.no_records_found')</em></td>
                </tr>
            @endif
        </tbody> 
    </table> 
</div>