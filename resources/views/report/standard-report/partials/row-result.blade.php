<!-- table-responsive -->
<div class="table-responsive"> 

    @foreach($results as $equipment_type)

        <!-- <button type="button" class="collapsible_exponse">{{ $equipment_type->value }} <span class="badge badge-light" id="income_{{ $equipment_type->value }}">Income $9</span>/<span class="badge badge-light" id="expend_{{ $equipment_type->value }}" >Expend $9</span>
    
        </button> -->

        <button type="button" class="collapsible_exponse">

            <div class="container">
                <div class="row">
                    <div class="col">
                        {{ $equipment_type->value }}
                    </div>
                    <div class="col">
                        <span id="income_{{ $equipment_type->value }}"></span>
                    </div>

                    <div class="col">
                        <span id="expend_{{ $equipment_type->value }}"></span>
                    </div>
                </div>
            </div>

        </button>

        <div class="content_exponse">

            @php($grand_total_income = 0)
            @php($grand_total_expend = 0)

            @foreach($equipment_type->children_equipment as $equipment)

                <button type="button" class="collapsible">{{ $equipment->equipment_id }} </button>

                    <div class="content">
                        <!-- INCOME -->
                        <table class="table table-bordered table-striped display" id="income_{{$equipment->equipment_id}}"   width="100%">

                                <thead>     
                                    <tr>
                                        <th colspan="2">Income</th>
                                    </tr>
                                    <tr class="something">              
                                        <th></th>
                                        <th >Amount</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @php($total = 0)
                                    @foreach($equipment->child_revenue as $revenue)

                                        <tr>
                                            <td></td>
                                            <td >${{ $revenue->amount }}</td> @php($total += $revenue->amount)
                                        </tr>
                                        
                                    @endforeach  
                                    @php( $grand_total_income += $total )
                                    
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
                                    @php($total_expend = 0)
                                    @foreach($equipment->child_maintenance as $m)

                                        @if($m->inventory_id == null)
                                            <tr>
                                                <td >{{ $m->service }}</td>
                                                <td >${{ $m->amount }}</td> 
                                                @php($total_expend += $m->amount)
                                            </tr>  
                                        @else

                                            <tr>
                                                <td >{{  getInventoryName($m->inventory->category_id) }}</td>
                                                <td >${{ isset($m->inventory->price) ? $m->inventory->price * 1 : 0  }}</td> 
                                                    
                                            </tr> 

                                        @endif
                                    
                                        @php( $grand_total_expend += $total_expend )
                                        
                                    @endforeach  
                                    
                                </tbody>
                        </table>

                    </div>      

            @endforeach

            <script>
                
                var equipment_type_id_income = 'income_' + '<?php echo $equipment_type->value ?>';

                var grand_income = '<?php echo $grand_total_income ?>';

                setGrandTotal(equipment_type_id_income, grand_income, "Income");

                var equipment_type_id_expend = 'expend_' + '<?php echo $equipment_type->value ?>';

                var grand_expend = '<?php echo $grand_total_expend ?>';

                setGrandTotal(equipment_type_id_expend, grand_expend, "Expend");


            </script>

        </div>

    @endforeach

</div>


