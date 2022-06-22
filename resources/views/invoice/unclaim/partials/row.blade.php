<div class="table-responsive">
    <table class="table table-bordered" style="width: 100%;"> 
        <thead> 
            <th class="text-center align-middle" style="width: 10%;">Invoice Date</th>
            <th class="text-center align-middle" style="width: 18%;">Invoice Number</th>
            <th class="text-center align-middle" style="width: 15%;">Amount</th>
            <th class="text-center align-middle" style="width: 20%;">Responsible Person</th>
            <th class="text-center align-middle" style="width: 25%;">Memo</th>
            <th class="text-center align-middle" style="width: 12%;">Select for Claim</th>          
        </thead>
        <tbody>  
            @if(count($unclaims) > 0)
                @foreach($unclaims as $item) 
                    <tr>
                        <td class="text-center align-middle">{{ $item->date ? getDateFormat($item->date) : '' }}</td>
                        <td class="text-center align-middle">{{ $item->invoice_number }}</td>
                        <td class="text-center align-middle">${{ $item->amount }}</td>
                        <td class="text-center align-middle">{{ $item->parent_staff->name }}</td>
                        <td class="text-center align-middle">{{ $item->note }}</td> 
                        <td class="text-center align-middle">
                            <input type="hidden" name="{{$loop->index}}id" value="{{$item->id}}"> 
                            <input type="hidden" name="staff_id" value="{{ $item->parent_staff->id }}">  
                            <input type="hidden" name="{{$loop->index}}invoice_number" value="{{ $item->invoice_number }}"> 
                            <input type="hidden" name="{{$loop->index}}invoice_date" value="{{ $item->date }}"> 
                            <input type="hidden" name="{{$loop->index}}amount" value="{{ $item->amount }}">  
                            <input type="hidden" name="{{$loop->index}}memo" value="{{ $item->note }}">  
                            <input type="checkbox" class="larger" name="{{$loop->index}}unclaim">
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
