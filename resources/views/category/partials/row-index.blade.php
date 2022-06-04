<div class="table-responsive">
    <table class="table table-borderless table-striped">
        <thead> 
            <th class="text-center align-middle" style="width: 5%;">No</th>
            <th class="text-center align-middle" style="width: 30%;">Category</th>
            <th class="text-center align-middle" style="width: 50%;">Sub Category</th>
            <th class="text-center align-middle" style="width: 10%;">Action</th>
        </thead>
        <tbody>    
            @if($categorys)
                @foreach($categorys as $item)
                    <tr>
                        <td class="text-center align-middle">{{ $loop->index + 1 }}</td>
                        <td class="text-center align-middle">{{ $item->value }}</td>
                        <td class="text-center align-middle">{{ $item->description }}</td>
                        <td class="text-center align-middle">
                            <a href="{{ route('category.edit', $item->id) }}" class="btn btn-icon edit" title="Update Category" data-toggle="tooltip" data-placement="top"><i class="fas fa-edit"></i> </a>
                            <a href="{{ route('category.destroy', $item->id) }}" class="btn btn-icon" data-action="" title="Delete Category" data-toggle="tooltip" data-placement="top" data-method="DELETE" data-confirm-title="@lang('app.please_confirm')"data-confirm-text="@lang('app.confirm_delete')"data-confirm-delete="@lang('app.yes_proceed')"><i class="fas fa-trash"></i></a>
                        </td>        
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7"><em>@lang('app.no_records_found')</em></td>
                </tr>
            @endif
        </tbody>
    </table> 
</div>