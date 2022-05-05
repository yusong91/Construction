<div class="table-responsive" style="padding-top: 40px;">
             <table class="table table-borderless table-striped">
                <thead> 
                    <th class="text-center verticel-center">No</th>
                    <th>Name</th>
                    <th>Address</th>
                    <th class="text-center verticel-center">Action</th>
                </thead>
                <tbody> 

                @if(count($warehouses) > 0)                   
                    @foreach($warehouses as $item)  
                        <tr>
                            <td class="text-center verticel-center">{{ 1 + $loop->index }}</td>
                            <td>{{ $item->name}}</td>
                            <td>{{ $item->address}}</td>
                            <td class="text-center verticel-center">
                                
                                <a href="{{ route('warehouse.edit', $item->id) }}" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i></a>

                                <a href="{{ route('warehouse.destroy', $item->id) }}" class="btn btn-icon" data-action="" data-toggle="tooltip" data-placement="top" data-method="DELETE" data-confirm-title="@lang('app.please_confirm')" data-confirm-text="@lang('app.confirm_delete')" data-confirm-delete="@lang('app.yes_proceed')" ><i class="fas fa-trash"></i></a>
                            </td>
                    
                            </tr>
                    @endforeach
                @else 
                    <tr>
                        <td colspan="6"><em>@lang('app.no_records_found')</em></td>
                    </tr>
                @endif
                </tbody>
            </table> 
    </div>
       