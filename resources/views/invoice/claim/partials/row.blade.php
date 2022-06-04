<div class="table-responsive">
    <table class="table table-bordered" style="width: 100%;">
        <thead> 
            <th class="text-center align-middle" style="width: 10%;">Invoice Date</th>
            <th class="text-center align-middle" style="width: 20%;">Invoice Number</th>
            <th class="text-center align-middle" style="width: 10%;">Price</th>
            <th class="text-center align-middle" style="width: 25%;">Responsible Person</th>
            <th class="text-center align-middle" style="width: 10%;">Claim Date</th>  
            <th class="text-center align-middle" style="width: 25%;">Memo</th>          
        </thead>
        <tbody>  
            @if(count($claims)>0) 
                @foreach($claims as $item)
                    <tr>
                        <td class="text-center align-middle">{{ getDateFormat($item->invoice_date) }}</td>
                        <td class="text-center align-middle">{{ $item->invoice_number }}</td>
                        <td class="text-center align-middle">${{ $item->price ?? $item->price }}</td>
                        <td class="text-center align-middle">{{ $item->staff_parent->name }}</td>
                        <td class="text-center align-middle">{{ getDateFormat($item->created_at) }}</td>
                        <td class="text-center align-middle">{{ $item->memo }}</td>
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
