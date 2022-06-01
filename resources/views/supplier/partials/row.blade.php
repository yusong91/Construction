<div class="table-responsive" style="padding-top: 40px;">
    <table class="table table-borderless table-striped" style="width: 180%;">
        <thead> 
            <th class="text-center align-middle" style="width: 5%;">No</th>
            <th class="text-center align-middle" style="width: 10%;">Company Name</th>
            <th class="text-center align-middle" style="width: 10%;">Supplier/Sale Name</th>
            <th class="text-center align-middle" style="width: 10%;">Phone</th>
            <th class="text-center align-middle" style="width: 15%;">E-mail</th>
            <th class="text-center align-middle" style="width: 10%;">Job Title</th>
            <th class="text-center align-middle" style="width: 15%;">Address</th>
            <th class="text-center align-middle" style="width: 10%;">Other</th>
            <th class="text-center align-middle" style="width: 20%;">Note</th>
            <th class="text-center align-middle" style="width: 5%;">Action</th>     
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
                    <td class="text-center align-middle">{{ $item->note }}</td>   
                    <td class="text-center align-middle">                
                        <a href="{{ route('supplier.edit', $item->id) }}" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i> </a>
                        <a href="{{ route('supplier.destroy', $item->id) }}" class="btn btn-icon" data-action="" title="Delete" data-toggle="tooltip" data-placement="top" data-method="DELETE" data-confirm-title="@lang('app.please_confirm')" data-confirm-text="@lang('app.confirm_delete')"data-confirm-delete="@lang('app.yes_proceed')"><i class="fas fa-trash"> </i> </a>
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