<div class="table-responsive" style="margin-top: 40px;" >
    <table class="table table-borderless table-striped" style="width: 2000px;">
        <thead>
            <tr>
                <th class="text-center align-middle">No</th>
                <th class="text-center align-middle" style="width: 200px;">Equipment Type</th>
                <th class="text-center align-middle" style="width: 300px;">Equipment Id</th>
                <th class="text-center align-middle" style="width: 200px;">Purchased Date</th>
                <th class="text-center align-middle" style="width: 200px;">Brand</th>

                <th class="text-center align-middle" style="width: 80px;">Year</th>
                <th class="text-center align-middle" style="width: 300px;">Chassis No</th>
                <th class="text-center align-middle" style="width: 300px;">Engine No</th>
                <th class="text-center align-middle" style="width: 300px;">Receipt No</th>
                <th class="text-center align-middle" style="width: 80px;">Weight</th>
                <th class="text-center align-middle" style="width: 300px;">Vender</th>
                <th class="text-center align-middle" style="width: 80px;">Image</th>
                <th class="text-center align-middle" style="width: 550px;">Note</th>
                <th class="text-center align-middle">Action</th>
            </tr>
        </thead> 
        <tbody> 
            
            @if(count($equipments))       
                @foreach($equipments as $item)
                    <tr>
                        <td class="text-center align-middle">{{ 1 + $loop->index }}</td>
                        <td class="text-center align-middle">{{ $item->parent_quipment->value}}</td>                 
                        <td class="text-center align-middle">{{ $item->equipment_id }}</td>
                        <td class="text-center align-middle">{{ getDateFormat($item->purchase_date) }}</td>
                        <td class="text-center align-middle">{{ $item->parent_brand->value }}</td>
                        <td class="text-center align-middle">{{ $item->year }}</td>
                        <td class="text-center align-middle">{{ $item->chassis_no }}</td>
                        <td class="text-center align-middle">{{ $item->engine_no }}</td>
                        <td class="text-center align-middle">{{ $item->receipt_no }}</td>
                        <td class="text-center align-middle">{{ $item->weight }}</td>
                        <td class="text-center align-middle">{{ $item->vender }}</td>
                        <td class="text-center align-middle">image</td>
                        <td class="text-center align-middle">{{ $item->note }}</td>
                        <td class="text-center align-middle">
                            <a href="{{ route('equipment.edit', $item->id) }}" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i> </a>

                            <a href="{{ route('equipment.destroy', $item->id) }}" class="btn btn-icon" data-action="" title="Delete" data-toggle="tooltip" data-placement="top" data-method="DELETE"
                                data-confirm-title="@lang('app.please_confirm')"
                                data-confirm-text="@lang('app.confirm_delete')"
                                data-confirm-delete="@lang('app.yes_proceed')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5"><em>@lang('app.no_records_found')</em></td>
                </tr>
            @endif
                                           
        </tbody>
    </table>
</div> 