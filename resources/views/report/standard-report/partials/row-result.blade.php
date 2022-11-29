<!-- table-responsive -->
<div class="table-responsive"> 

    @foreach($results as $equipment_type)

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

                setGrandTotal(equipment_type_id_income, grand_income, "Income ");

                var equipment_type_id_expend = 'expend_' + '<?php echo $equipment_type->value ?>';

                var grand_expend = '<?php echo $grand_total_expend ?>';

                setGrandTotal(equipment_type_id_expend, grand_expend, "Expend ");


            </script>

        </div>

    @endforeach

    <div class="alert alert-primary" role="alert">
        Total Income ${{ $grand_total_income - $grand_total_expend }}
    </div>


    <table class="table table-bordered table-striped display"  width="100%">
        <thead>     
            <tr>
                <th class="table-warning" colspan="2">Expend</th>
            </tr>
                    
        </thead>
        <tbody>
            <tr>
                <td class="table-light">Spareparts</td>
                <td class="table-light">${{ $total_sparepart }}</td>
            </tr>

            <tr>
                <td class="table-light" colspan="2"><b>Inventory</b></td>


                @foreach($expend_inventory as $item)

                    <tr>
                        <td class="table-light pl-5">{{ $item['category'] }}</td>
                        <td class="table-light">${{ $item['expend'] }}</td>
                    </tr>

                @endforeach
            
                

            </tr>

            <tr>
                <td class="table-danger">Total Expend</td>
                <td class="table-danger">$4000</td>
            </tr>


        </tbody>
    </table>



    <!-- <div class="alert alert-secondary" role="alert">
        <h6 class="alert-heading">Expend</h6>

        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Sparepart
                <span class="badge badge-primary badge-pill">$1000</span>
            </li>
           
            
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Inventory                
            </li>
            <ul class="list-group ml-4">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Tyre
                        <span class="badge badge-primary badge-pill">$1400</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Oil
                        <span class="badge badge-primary badge-pill">$2000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Battery
                        <span class="badge badge-primary badge-pill">$3000</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Total Inventory
                        <span class="badge badge-primary badge-pill">$6400</span>
                    </li>
            </ul>
 
            
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Total Expend
                <span class="badge badge-primary badge-pill">$7400</span>
            </li>
        </ul>
        
    </div> -->


    

</div>



