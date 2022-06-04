<div class="table-responsive" style="margin-top: 40px;" >
    <table class="table table-borderless table-striped" style="width: 200%;">
        <thead>
            <tr>
                <th class="text-center align-middle" style="width: 1%;">No</th>
                <th class="text-center align-middle" style="width: 5%;">Equipment Type</th>
                <th class="text-center align-middle" style="width: 5%;">Equipment Id</th>
                <th class="text-center align-middle" style="width: 3%;">Purchased Date</th>
                <th class="text-center align-middle" style="width: 5%;">Brand</th>
                <th class="text-center align-middle" style="width: 2%;">Year</th>
                <th class="text-center align-middle" style="width: 5%;">Chassis No</th>
                <th class="text-center align-middle" style="width: 5%;">Engine No</th>
                <th class="text-center align-middle" style="width: 5%;">Receipt No</th>
                <th class="text-center align-middle" style="width: 2%;">Weight</th>
                <th class="text-center align-middle" style="width: 5%;">Vender</th>
                <th class="text-center align-middle" style="width: 3%;">Image</th>
                <th class="text-center align-middle" style="width: 8%;">Note</th>
                <th class="text-center align-middle" style="width: 3%;">Action</th>
            </tr>
        </thead>  
        <tbody> 
            @if(count($equipments) >0)       
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
                        <td class="text-center align-middle"><img src="{{ $item->image ? getUrl($item->image) : url('assets/img/no_photo.png')}}" width="80"></td> 
                        <td class="text-center align-middle" >{{ $item->note }}</td>
                        <td class="text-center align-middle">
                            <a href="{{ route('equipment.edit', $item->id) }}" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i> </a>
                            <a href="{{ route('equipment.destroy', $item->id) }}" class="btn btn-icon" data-action="" title="Delete" data-toggle="tooltip" data-placement="top" data-method="DELETE" data-confirm-title="@lang('app.please_confirm')" data-confirm-text="@lang('app.confirm_delete')" data-confirm-delete="@lang('app.yes_proceed')"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="14"><em>@lang('app.no_records_found')</em></td>
                </tr>
            @endif                                  
        </tbody>
    </table>
</div> 