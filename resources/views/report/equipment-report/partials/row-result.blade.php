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
         
            $keyone = 1;
            $keytwo = 0;
            $keythree = 100;
            $keyfour = 200;
        ?>

        @foreach($equipment as $item)
        
            <tr data-toggle="collapse" data-target="#first{{$loop->index}}" class="accordion-toggle" style="padding: 0; margin: 0;">
                <td style="width: 30%" colspan="4"><i class="fa fa-caret-down"></i><span class="m-2">{{ $item->value }}</span> </td>                 
            </tr>  
            
            <tr>
                <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                    <table class="table table-bordered collapse" id="first{{$loop->index}}" style="padding: 0; margin: 0; border: hidden"> 

                    @foreach($item->children_equipment as $equip)

                    <?php 
                        $keytwo++; 
                        $net_income = 0;
                        $net_expend = 0;
                    ?>

                        <tr data-toggle="collapse" data-target="#second{{$keytwo}}" class="accordion-toggle" style="padding: 0; margin: 0;">
                            <td colspan="4"><i class="fa fa-caret-down ml-4"></i><span class="m-2">{{ $equip->equipment_id }}</span> </td>                    
                        </tr> 

                        <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                            <table class="table table-bordered collapse row-child" id="second{{$keytwo}}" style="padding: 0; margin: 0; border: hidden">

                                <tr data-toggle="collapse" data-target="#third{{$keythree}}" class="accordion-toggle" style="padding: 0; margin: 0;">
                                    <td style="width: 30%;" colspan="4"><i class="fa fa-caret-down ml-5"></i><span class="m-2">Income</span> </td>                    
                                </tr> 
 
                                <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                                    <table class="table table-bordered collapse row-child" id="third{{$keythree}}" style="padding: 0; margin: 0; border: hidden">

                                    @foreach($equip->child_revenue as $revenue)

                                        <tr>
                                            <td style="width: 30%;"><span style="padding-left: 50px;"></span> </td>
                                            <td style="width: 20%;">{{ getDateFormat($revenue->to_date) }}</td>
                                            <td style="width: 30%;">{{ $revenue->parent_customer->company_name ?? '' }} / {{ $revenue->customer_name ? $revenue->customer_name : $revenue->parent_customer->customer_name }}</td>
                                            <td>${{ $revenue->amount }}</td>          
                                        </tr>

                                        <?php $net_income += $revenue->amount; ?>
                                    
                                    @endforeach

                                    </table>
                                </td> 
 
                                <tr data-toggle="collapse" data-target="#four{{$keyfour}}" class="accordion-toggle" style="padding: 0; margin: 0;">
                                    <td style="width: 30%;" colspan="4"><i class="fa fa-caret-down ml-5"></i><span class="m-2">Expense</span> </td>           
                                </tr>  

                                <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                                    <table class="table table-bordered collapse row-child" id="four{{$keyfour}}" style="padding: 0; margin: 0; border: hidden">
                                    
                                    @foreach($equip->child_maintenance as $mainten)
                                        <tr>
                                            <td style="width: 30%;"><span style="padding-left: 50px;">{{ $mainten->inventory->name ?? '' }}</span> </td>
                                            <td style="width: 20%;">{{ getDateFormat($mainten->date) }}</td>
                                            <td style="width: 30%;">{{ $mainten->supplier->company_name ?? '' }} / {{ $mainten->supplier->supplier_name ?? '' }}</td>
                                            <td>$
                                                
                                            <?php 
                                            
                                                $expend = $mainten->unit_price *  $mainten->amount;

                                                $net_expend += $expend;
                                            
                                                echo $expend;
                                            ?>

                                            </td>          
                                        </tr>
                                    @endforeach

                                    </table>
                                </td> 

                                <tr > 

                                    <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                                        <table class="table table-bordered row-child" id="demo3" style="padding: 0; margin: 0; border: hidden">

                                            <tr style="background: #8AD4ED;">
                                                <td style="width: 80%;" colspan="3"><span style="padding-left: 25px;">Net Income of {{ $equip->equipment_id }}</span> </td>
                                                <td >${{ $net_income -  $net_expend }}</td>          
                                            </tr>

                                        </table>
                                    </td>

                                </tr>

                            </table>
                        </td>

                        <?php 

                        $keyfour++; 
            
                        $keythree++; 
                    ?>

                    @endforeach


                    </table>
                </td>
            </tr>
            
        @endforeach

        </tbody>
    </table> 
</div>