<div class="table-responsive" style="padding-top: 40px;">
             <table class="table table-borderless table-striped">
                <thead> 
                    <th class="text-center verticel-center">No</th>
                    <th class="text-center verticel-center">Equipment Type</th>
                    <th class="text-center verticel-center">Equipment Id</th>
                    <th class="text-center verticel-center">Description</th>
                    <th class="text-center verticel-center">Date</th>
                    <th class="text-center verticel-center">Price</th>
                    <th class="text-center verticel-center">Sale To</th>
                    <th class="text-center verticel-center">Action</th>
                </thead>
                <tbody> 

                    @if(count($equipmentsolds))
                        @foreach($equipmentsolds as $items)
                            <tr>
                                <td class="text-center verticel-center">{{ $loop->index + 1 }}</td>
                                <td class="text-center verticel-center">{{ $items->parent_type->value ?? '' }}</td>
                                <td class="text-center verticel-center">{{ $items->parent_equipment->equipment_id ?? ''}}</td>
                                <td class="text-center verticel-center">{{ $items->sale_description ?? ''}}</td>
                                <td class="text-center verticel-center">{{ $items->sale_date ? getDateFormat($items->sale_date) : ''}}</td>
                                <td class="text-center verticel-center">{{ $items->sale_price ? '$' . $items->sale_price : '' }}</td>
                                <td class="text-center verticel-center">{{ $items->sale_to ?? ''}}</td>
                                    
                                <td class="text-center verticel-center">
                                    
                                    <!-- <a href="" class="btn btn-icon edit" title="View" data-toggle="tooltip" data-placement="top"> <i class="fas fa-list"></i> </a> -->

                                    <a href="{{ route('equipmentsold.edit', $items->id) }}" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i> </a>

                                    <a href="{{ route('equipmentsold.destroy', $items->id) }}" class="btn btn-icon" data-action="" title="Delete" data-toggle="tooltip" data-placement="top" data-method="DELETE"
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
                            <td colspan="8"><em>@lang('app.no_records_found')</em></td>
                        </tr>
                    @endif

                </tbody>
            </table> 
        </div>