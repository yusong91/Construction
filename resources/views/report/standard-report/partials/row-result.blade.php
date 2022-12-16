<!-- table-responsive -->
<div class="table-responsive"> 

    <h4>Income</h4>

    @php($total_income = 0)
    @php($total_expend = 0)
    @php($grand_total_expend = 0)

    @foreach($results as $equipment_type)

        <button type="button" class="collapsible_exponse">

            <div class="container">
                <div class="row">
                    <div class="col">
                        {{ $equipment_type->value }}
                    </div>

                    @php($test_category_income = 0)

                    @php($total_expend_by_category = 0)

                    @foreach($equipment_type->children_equipment as $equipment)

                        @foreach($equipment->child_revenue as $revenue)

                            @php($test_category_income += $revenue->amount)

                        @endforeach

                        @foreach($equipment->child_maintenance as $m)

                            @if($m->inventory_id == null)

                                @php($total_expend_by_category += $m->amount)

                            @else

                                @php($total_expend_by_category += $m->inventory->price * $m->quantity)

                            @endif

                        @endforeach

                    @endforeach

                    <div class="col">
                        <span>Income ${{ $test_category_income }}</span>
                    </div>

                    <div class="col">
                        <span>Expend ${{ $total_expend_by_category }}</span>
                    </div>


                </div>
            </div>

        </button>

        <div class="content_exponse">

            @foreach($equipment_type->children_equipment as $equipment)

                @if($equipment->sold == 1)
                    @continue
                @endif

                <button type="button" class="collapsible">{{ $equipment->equipment_id }}</button>

                    <div class="content">
                        <!-- INCOME -->
                        <table class="table table-bordered table-striped display" id="income_{{$equipment->equipment_id}}"   width="100%">

                                <thead>     
                                    <tr>
                                        <th colspan="2">Income</th>
                                    </tr>
                                    <tr class="something">              
                                        <th>Date</th>
                                        <th >Amount</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php($total_income_by_category = 0)

                                    @foreach($equipment->child_revenue as $revenue)

                                        <tr>
                                            <td>{{ getDateFormat($revenue->from_date) }}</td>
                                            <td >${{ $revenue->amount }}</td> @php($total_income_by_category += $revenue->amount)
                                        </tr>

                                    @endforeach  

                                    @php( $total_income += $total_income_by_category )

                                </tbody>
                        </table>
                        <script>
                            var table_id = '<?php echo $equipment->equipment_id; ?>';

                            data_table("income_" + table_id);

                            data_table("expend_" + table_id);
                    
                        </script>

                        <!-- EXPEND -->
                        <table class="table table-bordered table-striped display" id="expend_{{ $equipment->equipment_id }}"  width="100%">

                                <thead>     
                                    <tr>
                                        <th colspan="2">Expend</th>
                                    </tr>
                                    <tr class="something" > 
                                        <th >Item/Service</th>       
                                        <th >Amount</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($equipment->child_maintenance as $m)

                                        @if($m->inventory_id == null)
                                            <tr>
                                                <td > {{ $m->type }}: {{ $m->service }}</td>
                                                <td >${{ $m->amount }}</td> 
                                            </tr>  

                                            @php( $total_expend += $m->amount )
                                        @else

                                            <tr>
                                                <td >Inventory: {{  getInventoryName($m->inventory->category_id) }}</td>
                                                <td >${{ isset($m->inventory->price) ? $m->inventory->price * $m->quantity : 0  }}</td>     
                                            </tr> 

                                            @php( $total_expend += $m->inventory->price * $m->quantity )

                                        @endif

                                    @endforeach  

                                </tbody>
                        </table>

                    </div>      

            @endforeach

        </div>

    @endforeach

    <table class="table table-bordered table-striped" width="100%">
        <tr >
            <td class="table-success">Total Income: ${{ $total_income }}</td>
        
            <td class="table-success">Total Expend: ${{ $total_expend }}</td>
        </tr>
    </table>


    <h4 class="mt-3">Expend</h4>

    <table class="table table-bordered table-striped display"  width="100%">
        <thead>             
        </thead>
        <tbody>
            <tr>
                <td class="table-light">Spareparts/Service</td>
                <td class="table-light">${{ $total_sparepart }}</td>
            </tr>

            <tr>
                <td class="table-light" colspan="2">Inventory</td>

                @foreach($expend_inventory as $item)

                    @php( $grand_total_expend += $item['expend'] )

                    <tr>
                        <td class="table-light pl-5">{{ $item['category'] }}</td>
                        <td class="table-light">${{ $item['expend'] }}</td>
                    </tr>

                @endforeach
            
            </tr>

            @php($all_total = $grand_total_expend + $total_sparepart )

            <tr>
                <td class="table-danger">Total Expend</td>
                <td class="table-danger">${{ $all_total }}</td>
            </tr>

            <tr>
                <td class="table-success">Net Profit/Loss</td>
                <td class="table-success">${{ $total_income - $all_total }}</td>
            </tr>

        </tbody>
    </table>
</div>



