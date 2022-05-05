<div class="table-responsive">
    <table class="table table-borderless table-striped">
        <thead> 
                
            <th class="text-center verticel-center">Company Name</th>
            <th class="text-center verticel-center">Customer Name</th>
            <th class="text-center verticel-center">Rental Service</th>
            <th class="text-center verticel-center">Payment</th>
                    
        </thead>
        <tbody>  

            @if(count($customers) > 0)
                @foreach($customers as $items)  
                    <tr>
                        <th class="text-center verticel-center">{{ $items->company_name }}</th>
                        <td class="text-center verticel-center" >{{ count($items->child_revenue) > 0 ? '' : $items->customer_name }}</td>
                        <td class="text-center verticel-center" colspan="2"></td>
                    </tr>
                    @foreach($items->child_revenue as $r)
                        <tr>
                            <th></th>
                            <td class="text-center verticel-center" >{{ $r->customer_name}}</td>
                            <td class="text-center verticel-center" >{{ $r->parent_equipment->revenue_parent_quipment->value}} : {{ $r->parent_equipment->equipment_id}}</td>
                            <td class="text-center verticel-center" >${{ $r->amount}}</td>
                        </tr>
                    @endforeach
                @endforeach
            @else            
                        
                <tr>
                    <td colspan="4"><em>@lang('app.no_records_found')</em></td>
                </tr>
            @endif   
                </tbody>
    </table> 
</div>