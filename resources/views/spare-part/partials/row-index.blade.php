<div class="table-responsive" style="padding-top: 40px;">
    <table class="table table-borderless table-striped">
        <thead> 
            <th class="text-center verticel-center">No</th>
            <th class="text-center verticel-center">Name</th>
            <th class="text-center verticel-center">Equipment</th>
            <th class="text-center verticel-center">Quantity</th>
            <th class="text-center verticel-center">Unit</th>
            <th class="text-center verticel-center">Unit Price</th>
            <th class="text-center verticel-center">Amount</th>
            <th class="text-center verticel-center">Action</th>
        </thead>
        <tbody>  
            @if(count($spareparts) > 0)
                @foreach($spareparts as $item)
                    <tr> 
                        <td class="text-center verticel-center"> {{ 1 + $loop->index }}</td>
                        <td class="text-center verticel-center"> {{ $item->name }}</td>
                        <td class="text-center verticel-center">{{$item->parent_maintenance->parent_equipment->equipment_id ?? ''}}</td>
                        <td class="text-center verticel-center"> {{ $item->quantity }}</td>
                        <td class="text-center verticel-center"> {{ $item->unit }}</td>
                        <td class="text-center verticel-center"> ${{ $item->unit_price }}</td>
                        <td class="text-center verticel-center"> ${{ $item->amount }}</td> 
                        <td class="text-center verticel-center text-center">
                            <a href="{{route('sparepart.edit', $item->id)}}" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                @endforeach
            @else  
                <tr>
                    <td colspan="8"><em>@lang('app.no_records_found')</em></td>
                </tr>
            @endif
                    
        </tbody>
    </table> 
</div>