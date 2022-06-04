<div class="table-responsive" style="padding-top: 40px;">
    <table class="table table-borderless table-striped" style="width: 270%;">
        <thead> 
            <th class="text-center align-middle" style="width: 5%;">Category</th>
            <th class="text-center align-middle" style="width: 5%;">Item Name</th>
            <th class="text-center align-middle" style="width: 5%;">Warehouse Location</th>
            <th class="text-center align-middle" style="width: 3%;">Quantity</th>
            <th class="text-center align-middle" style="width: 3%;">In Stock</th>
            <th class="text-center align-middle" style="width: 3%;">Price</th>
            <th class="text-center align-middle" style="width: 3%;">Total</th>
            <th class="text-center align-middle" style="width: 5%;">Unit</th>
            <th class="text-center align-middle" style="width: 3%;">Used</th>
            <th class="text-center align-middle" style="width: 6%;">Vender</th>
            <th class="text-center align-middle" style="width: 6%;">Menufacture</th>
            <th class="text-center align-middle" style="width: 4%;">Purchased Date</th>
            <th class="text-center align-middle" style="width: 3%;">Image</th>
            <th class="text-center align-middle" style="width: 9%;">Note</th>
            <th class="text-center align-middle" style="width: 5%;">Action</th>
        </thead>
    <tbody> 
                    
        @if($inventory_groups)
            @foreach($inventory_groups as $items)
                <tr>  
                    <th class="text-center align-middle" scope="row"><h5> {{ $items[0]->parent_category['value'] }}</h5></th>
                    <th scope="row" colspan="12"></th>
                    <th></th>
                </tr>
                @foreach($items as $item)
                    <tr>
                            <th></th>
                            <td class="text-center align-middle">{{ $item->name }}</td>
                            <td class="text-center align-middle">{{ $item->parent_warehouse->name ?? '' }}</td>
                            <td class="text-center align-middle">{{ $item->quantity }}</td>
                            <td class="text-center align-middle">{{ $item->quantity - $item->used }}</td>
                            <td class="text-center align-middle">${{ $item->price }}</td> 
                            <td class="text-center align-middle">${{ $item->price * $item->quantity }}</td> 
                            <td class="text-center align-middle">{{ $item->unit }}</td>   
                            <td class="text-center align-middle">{{ $item->used }}</td>   
                            <td class="text-center align-middle">{{ $item->vender }}</td>   
                            <td class="text-center align-middle">{{ $item->menufacture }}</td> 
                            <td class="text-center align-middle">{{ getDateFormat($item->purchased_date) }}</td>
                            <td class="text-center align-middle"><img src="{{ getUrl($item->image) }}" class="rounded mx-auto d-block" alt="" style="width: 100px;"></td>
                            <td class="text-center align-middle">{{ $item->note }}</td>
                            <td class="text-center align-middle">
                                <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i></a>
                                <a href="{{ route('inventory.destroy', $item->id) }}" class="btn btn-icon" data-action="" title="Delete" data-toggle="tooltip" data-placement="top" data-method="DELETE"data-confirm-title="@lang('app.please_confirm')"data-confirm-text="@lang('app.confirm_delete')"data-confirm-delete="@lang('app.yes_proceed')"><i class="fas fa-trash"></i></a>
                            </td>
                    </tr>
                @endforeach
            @endforeach
        @else 
                    <tr>
                        <td colspan="14"><em>@lang('app.no_records_found')</em></td>
                    </tr>
        @endif

        </tbody>
    </table> 
</div>