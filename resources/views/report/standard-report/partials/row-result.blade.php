<div class="table-responsive mb-4" style="padding-top: 10px;">
    <table class="table table-bordered table-striped" style="padding: 0; margin: 0; border: hidden">
        <thead> 
            <th class="text-center" style="width: 30%;">Income/Expense</th>
            <th class="text-center" style="width: 20%;">Date</th>
            <th class="text-center" style="width: 30%;">Customer/Supplier Name</th>
            <th class="text-center">Amount</th>   
        </thead>
        <tbody> 
            
        <?php 
                        
            $net_expend = 0;

            $net_income = 0;
                        
        ?>
            <!-- Income -->
            <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle" style="padding: 0; margin: 0;">
                <td colspan="3"><i class="fa fa-caret-down"></i><span class="m-2">Income</span> </td>
                <td ></td>                      
            </tr>  
                <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                    <table class="table table-bordered collapse row-child" id="demo1" style="padding: 0; margin: 0; border: hidden">

                    @foreach($incomes as $key => $value)
                        <tr data-toggle="collapse" data-target="#demo3{{$key}}" class="accordion-toggle" style="padding: 0; margin: 0;">
                            <td colspan="4"><i class="fa fa-caret-down ml-4"></i><span class="m-2">{{$key}}</span> </td>                    
                        </tr> 

                            <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                                <table class="table table-bordered collapse row-child" id="demo3{{$key}}" style="padding: 0; margin: 0; border: hidden">
                                    @foreach($value as $item)
                                        <tr >
                                            <td style="width: 30%;"><span class="m-4">{{ $item->parent_equipment->equipment_id }}</span> </td>   
                                            <td style="width: 20%;">{{ getDateFormat($item->to_date) }}</td>       
                                            <td style="width: 30%;">{{ $item->parent_customer->company_name }}</td>       
                                            <td >${{ $item->amount }}</td> 
                                            
                                            <?php $net_income += $item->amount; ?>
                                        </tr> 
                                    @endforeach
                                </table>
                            </td>
                    @endforeach
                    </table>
                    
                </td>

            <!-- Expend -->
            <tr data-toggle="collapse" data-target="#demo4" class="accordion-toggle" style="padding: 0; margin: 0;">
                <td colspan="3"><i class="fa fa-caret-down"></i><span class="m-2">Expense</span> </td>
                <td ></td>                      
            </tr>  
                <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                    <table class="table table-bordered collapse row-child" id="demo4" style="padding: 0; margin: 0; border: hidden">

                    @foreach($expenses as $key => $value)
                   
                        <tr data-toggle="collapse" data-target="#demo5" class="accordion-toggle" style="padding: 0; margin: 0;">
                            <td colspan="4"><i class="fa fa-caret-down ml-4"></i><span class="m-2">{{$key}}</span> </td>                    
                        </tr> 

                            <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                                <table class="table table-bordered collapse row-child" id="demo5" style="padding: 0; margin: 0; border: hidden">
                                @foreach($value as $item)
                                    <tr >
                                        <td style="width: 30%;"><span class="ml-4">{{ $item->service }} {{ $item->parent_equipment->equipment_id }}</span> </td>
                                        <td style="width: 20%;">{{ getDateFormat($item->date) }}</td>
                                        <td style="width: 30%;">{{ $item->parent_supplier->company_name }}</td>
                                        <td >${{ $item->unit_price * $item->amount }}</td>   
                                        
                                        <?php  

                                            $net_expend += $item->unit_price * $item->amount;
                                        ?>

                                    </tr> 
                                @endforeach
                                </table>
                            </td>
                    @endforeach
                    </table>
                </td>

                <tr style="padding: 0; margin: 0;">

                    <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                        <table class="table table-bordered row-child" id="demo3" style="padding: 0; margin: 0; border: hidden">

                            <tr style="background: #8AD4ED;">
                                <td colspan="3" ><span >Net Income</span> </td>
                                
                                <td style="width: 20%;">${{ $net_income - $net_expend }}</td>          
                            </tr>

                        </table>
                    </td>

                </tr>
            
        </tbody>
    </table> 
</div>