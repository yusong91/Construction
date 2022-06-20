<div class="table-responsive" style="padding-top: 40px;">
    <table class="table table-borderless table-striped" style="width: 170%;">
        <thead> 
            <th class="text-center align-middle" style="width: 2%;">Date</th>
            <th class="text-center align-middle" style="width: 5%;">Equipment ID</th>
            <th class="text-center align-middle" style="width: 5%;">Spare-Part/Service</th>
            <th class="text-center align-middle" style="width: 3%;">Quantity</th>
            <th class="text-center align-middle" style="width: 3%;">Unit</th>
            <th class="text-center align-middle" style="width: 3%;">Unit Price</th>
            <th class="text-center align-middle" style="width: 3%;">Amount</th>
            <th class="text-center align-middle" style="width: 5%;">Supplier Name</th>
            <th class="text-center align-middle" style="width: 5%;">Responsible Person</th>
            <th class="text-center align-middle" style="width: 8%;">Memo</th>
            <th class="text-center align-middle" style="width: 3%;">Image of Broken</th>
            <th class="text-center align-middle" style="width: 3%;">Image of Replacement</th> 
            <th class="text-center align-middle" style="width: 2%;">Action</th>  
        </thead>
        <tbody> 
            @if(count($maintenances)) 
                @foreach($maintenances  as $item)
                    <tr>
                        <td class="text-center align-middle">{{ getDateFormat($item->date) }}</td>
                        <td class="text-center align-middle">{{ $item->parent_equipment->equipment_id}}</td>
                        <td class="text-center align-middle">{{ $item->parent_inventory->name ?? $item->service }}</td>
                        <td class="text-center align-middle">{{ $item->quantity }}</td>
                        <td class="text-center align-middle" >{{ $item->unit ?? $item->parent_inventory->unit }}</td>
                        <td class="text-center align-middle" >{{ $item->unit_price ?? $item->parent_inventory->price }}</td>
                        <td class="text-center align-middle">{{ $item->amount ?? $item->quantity * $item->parent_inventory->price }}</td>
                        <td class="text-center align-middle">{{ $item->parent_supplier->company_name }}</td>
                        <td class="text-center align-middle"  >{{ $item->parent_staff->name }}</td>
                        <td class="text-center align-middle">{{ $item->note }}</td>
                        <td class="text-center align-middle" ><img src="{{ $item->image_broken ? getUrl($item->image_broken) : url('assets/img/no_photo.png') }}" width="80"></td>
                        <td class="text-center align-middle" ><img src="{{ $item->image_replace ? getUrl($item->image_replace) : url('assets/img/no_photo.png') }}" width="80"></td>   
                        <td class="text-center align-middle ">        
                            <a href="{{ route('maintenance.edit', $item->id) }}" class="btn btn-icon edit {{ checkClaim($item->unclaim) }}" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i> </a>
                            <a href="{{ route('maintenance.destroy', $item->id) }}" class="btn btn-icon {{ checkClaim($item->unclaim) }}" data-action="" title="Delete" data-toggle="tooltip" data-placement="top" data-method="DELETE"data-confirm-title="@lang('app.please_confirm')" data-confirm-text="@lang('app.confirm_delete')" data-confirm-delete="@lang('app.yes_proceed')"><i class="fas fa-trash"></i></a>
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