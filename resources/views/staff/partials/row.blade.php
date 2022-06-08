<div class="table-responsive" style="padding-top: 40px;">
             <table class="table table-borderless table-striped">
                <thead> 
                    <th class="text-center verticel-center">No</th>
                    <th class="text-center verticel-center">Name</th>
                    <th class="text-center verticel-center">Date of Birth</th>
                    <th class="text-center verticel-center">Job</th>
                    <th class="text-center verticel-center">Phone</th>
                    <th class="text-center verticel-center">Address</th>
                    <th class="text-center verticel-center">Action</th>
                </thead>
                <tbody> 

                    @if(count($staffs))
                        @foreach($staffs as $item)
                           
                            <tr>
                                <td class="text-center verticel-center">{{ $loop->index + 1}}</td>
                                <td class="text-center verticel-center">{{ $item->name }}</td>
                                <td class="text-center verticel-center">{{ getDateFormat($item->dob) }}</td>
                                <td class="text-center verticel-center">{{ $item->job }}</td>
                                <td class="text-center verticel-center">{{ $item->phone }}</td>
                                <td class="text-center verticel-center">{{ $item->address }}</td>
                                <td class="text-center verticel-center">
                                
                                    <!-- <a href="" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"><i class="fas fa-list"></i></a> -->

                                    <a href="{{ route('staff.edit', $item->id) }}" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i></a>

                                    <a href="{{ route('staff.destroy', $item->id) }}" class="btn btn-icon" data-action="" data-toggle="tooltip" data-placement="top" data-method="DELETE"
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
                            <td colspan="6"><em>@lang('app.no_records_found')</em></td>
                        </tr>
                    @endif
                </tbody>
            </table> 
    </div>
       