<div class="table-responsive">
    <table class="table table-hover" style="width: 100%;">
        <tbody>  
            @if(count($list_unclaim) > 0)
                @foreach($list_unclaim as $item)
                    @if(isset($item[2]) == false)
                        @continue
                    @endif
                    <tr>
                    <input type="hidden" name="maintenance_id" value="{{ $item[0] }}" >
                        <input type="hidden" name="invoice_number" value="{{ $item[1] }}" >
                        <input type="hidden" name="invoice_date" value="{{ $item[2] }}" >
                        <input type="hidden" name="momo" value="{{ $item[3] }}" >
                        <td class="text-center align-middle" style="width: 10%;">{{ 1 + $loop->index }}</td>
                        <td class="align-middle">{{ $item[1] }}</td> 
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
