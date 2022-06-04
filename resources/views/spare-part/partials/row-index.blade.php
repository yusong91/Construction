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
                                <td class="text-center verticel-center" > {{ 1 + $loop->index }}</td>
                                <td class="text-center verticel-center" > {{ $item->name }}</td>
                                <td class="text-center verticel-center" > </td>
                                <td class="text-center verticel-center" > {{ $item->quantity }}</td>
                                <td class="text-center verticel-center" > {{ $item->unit }}</td>
                                <td class="text-center verticel-center" > {{ $item->unit_price }}</td>
                                <td class="text-center verticel-center" > {{ $item->amount }}</td>
                                
                                <td class="text-center verticel-center text-center">
                                    <a href="" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-icon" data-action="" data-toggle="tooltip" data-placement="top" data-method="DELETE" data-confirm-title="@lang('app.please_confirm')" data-confirm-text="@lang('app.confirm_delete')" data-confirm-delete="@lang('app.yes_proceed')"><i class="fas fa-trash"></i></a>
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