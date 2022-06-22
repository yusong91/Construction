<div class="table-responsive">
    <table class="table table-hover">
        <tbody>  
            @if(count($list_unclaim) > 0)
                @foreach($list_unclaim as $item)
                    @if(isset($item[5]) == false)
                        @continue
                    @endif
                    <tr>
                            <input type="hidden" name="maintenance_id" value="{{ $item[0] }}" >
                            <input type="hidden" name="invoice_number" value="{{ $item[1] }}" >
                            <input type="hidden" name="invoice_date" value="{{ $item[2] }}" >
                            <input type="hidden" name="memo" value="{{ $item[4] ?? '' }}" >
                        <td class="text-center align-middle" style="width: 50px;">{{ 1 + $loop->index }}</td>
                        <td class="align-middle" style="width: 290px;">Invoice Number : {{ $item[1] }}</td> 
                        <td class="align-middle" >Amount : ${{ $item[3] }}</td> 
                        
                    </tr>
                @endforeach
            @else    
                <tr>
                    <td colspan="3"><em>@lang('app.no_records_found')</em></td>
                </tr> 
            @endif
        </tbody>
    </table> 
</div>
