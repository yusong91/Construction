<div class="table-responsive mb-4" style="padding-top: 10px;">
    <table class="table table-bordered table-striped" style="padding: 0; margin: 0; border: hidden; width: 1300px;">
        <thead> 
            <th class="text-center" style="width: 25%;">Customer</th>
            <th class="text-center" style="width: 23%;">From Location</th>
            <th class="text-center" style="width: 23%;">To Location</th>
            <th class="text-center" style="width: 9%;">From Date</th>
            <th class="text-center" style="width: 9%;">To Date</th>  
            <th class="text-center" style="width: 11%;">Amount</th>   
        </thead>
        <tbody>  
 
        <?php  
            $first = 100;
            $second = 1;
            $third = 10;
        ?>

        @foreach($equipments as $item)

            <?php 
                $first++;
            ?>

            <tr data-toggle="collapse" data-target="#first{{$first}}" class="accordion-toggle" style="padding: 0; margin: 0;">
                <td colspan="6"><i class="fa fa-caret-down"></i><span class="m-2">{{ $item->value }}</span> </td>                 
            </tr>  
            
            <tr>
                <td colspan="6" class="hiddenRow" style="padding: 0; margin: 0;">
                    <table class="table table-bordered collapse" id="first{{$first}}" style="padding: 0; margin: 0; border: hidden"> 

                    @foreach($item->children_equipment as $equipment)
                    
                        <tr data-toggle="collapse" data-target="#second{{$second}}" class="accordion-toggle" style="padding: 0; margin: 0;">
                            <td colspan="6"><i class="fa fa-caret-down ml-4"></i><span class="m-2">{{ $equipment->equipment_id }}</span> </td>                    
                        </tr> 

                        <td colspan="6" class="hiddenRow" style="padding: 0; margin: 0;">
                            <table class="table table-bordered collapse row-child" id="second{{$second}}" style="padding: 0; margin: 0; border: hidden">

                            @foreach($equipment->child_movement as $move) 
                                <tr data-toggle="collapse" data-target="#third{{$third}}" class="accordion-toggle" style="padding: 0; margin: 0;">
                                    <td style="width: 25%;"><i class="fa fa-caret-down ml-5"></i><span class="m-2">{{ $move->parent_customer->company_name ?? '' }} / {{ $move->parent_customer->customer_name ?? '' }} </span> </td>
                                    <td style="width: 23%;">{{ $move->from_location }}</td>
                                    <td style="width: 23%;">{{ $move->to_location }}</td>
                                    <td style="width: 9%;">{{ $move->date }}</td>
                                    <td style="width: 9%;"></td>
                                    <td style="width: 11%;"></td>                     
                                </tr> 

                                <td colspan="6" class="hiddenRow" style="padding: 0; margin: 0;">
                                    <table class="table table-bordered collapse row-child" id="third{{$third}}" style="padding: 0; margin: 0; border: hidden">
                                        @foreach($move->parent_customer->child_revenue as $revenue)
                                            <tr>
                                                <td style="width: 25%;"><span style="padding-left: 50px;"></span> </td>
                                                <td style="width: 23%;"></td>
                                                <td style="width: 23%;"></td>
                                                <td style="width: 9%;">{{ getDateFormat($revenue->from_date) ?? '' }}</td>
                                                <td style="width: 9%;">{{ getDateFormat($revenue->to_date) ?? '' }}</td>    
                                                <td style="width: 11%;">${{ $revenue->amount ?? '0' }}</td>         
                                            </tr>
                                        @endforeach
                                    </table> 
                                </td> 
                            @endforeach
                                
                            </table>
                        </td>

                        <?php 
                        $second++;
                    ?>
                    @endforeach
                    
                    </table>
                </td>
            </tr>

        @endforeach
        
        </tbody>
    </table> 
</div>