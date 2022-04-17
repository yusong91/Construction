<div class="table-responsive" style="padding-top: 40px;">
    <table class="table table-borderless table-striped">
        <thead> 
            <th class="text-center align-middle">No</th>
            <th class="text-center align-middle">Company Name</th>
            <th class="text-center align-middle">Supplier/Sale Name</th>
            <th class="text-center align-middle">Phone</th>
            <th class="text-center align-middle">E-mail</th>
            <th class="text-center align-middle">Job Title</th>
            <th class="text-center align-middle">Address</th>
            <th class="text-center align-middle">Other</th>
            <th class="text-center align-middle">Action</th>
                    
        </thead> 
        <tbody> 

            @if(count($suppliers))

                @foreach($suppliers as $item)

                <tr>
                    <td class="text-center align-middle">{{ $loop->index + 1 }}</td>
                    <td class="text-center align-middle">{{ $item->company_name }}</td>
                    <td class="text-center align-middle">{{ $item->supplier_name }}</td>
                    <td class="text-center align-middle">{{ $item->phone }}</td>
                    <td class="text-center align-middle">{{ $item->email }}</td>
                    <td class="text-center align-middle">{{ $item->job }}</td>
                    <td class="text-center align-middle">{{ $item->address }}</td>
                    <td class="text-center align-middle">{{ $item->other }}</td>   
                    <td class="text-center align-middle">                
                       
                        <a href="{{ route('supplier.edit', $item->id) }}"
                                class="btn btn-icon edit"
                                title="Update"
                                data-toggle="tooltip" data-placement="top">
                                <i class="fas fa-edit"></i> 
                        </a>
                        <a href="{{ route('supplier.destroy', $item->id) }}"
                                class="btn btn-icon"
                                data-action=""
                                title="Delete" 
                                data-toggle="tooltip"
                                data-placement="top"
                                data-method="DELETE"
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
                    <td colspan="9"><em>@lang('app.no_records_found')</em></td>
                </tr>
            @endif
                   
        </tbody>
    </table> 
</div>