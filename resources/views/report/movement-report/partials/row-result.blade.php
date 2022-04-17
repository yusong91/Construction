<div class="table-responsive mb-4" style="padding-top: 10px;">
    <table class="table table-bordered table-striped" style="padding: 0; margin: 0; border: hidden">
        <thead> 
            <th class="text-center" style="width: 400px;">Customer</th>
            <th class="text-center" style="width: 250px;">From Location</th>
            <th class="text-center" style="width: 250px;">To Location</th>
            <th class="text-center" style="width: 120px;">From Date</th>
            <th class="text-center" style="width: 120px;">To Date</th>   
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
                <td colspan="5"><i class="fa fa-caret-down"></i><span class="m-2">{{ $item->value }}</span> </td>                 
            </tr>  
            
            <tr>
                <td colspan="5" class="hiddenRow" style="padding: 0; margin: 0;">
                    <table class="table table-bordered collapse" id="first{{$first}}" style="padding: 0; margin: 0; border: hidden"> 

                    @foreach($item->children_equipment as $equipment)
                    
                        <tr data-toggle="collapse" data-target="#second{{$second}}" class="accordion-toggle" style="padding: 0; margin: 0;">
                            <td colspan="5"><i class="fa fa-caret-down ml-4"></i><span class="m-2">{{ $equipment->equipment_id }}</span> </td>                    
                        </tr> 

                        <td colspan="5" class="hiddenRow" style="padding: 0; margin: 0;">
                            <table class="table table-bordered collapse row-child" id="second{{$second}}" style="padding: 0; margin: 0; border: hidden">

                            @foreach($equipment->child_movement as $move)
                                <tr data-toggle="collapse" data-target="#third{{$third}}" class="accordion-toggle" style="padding: 0; margin: 0;">
                                    <td style="width: 400px;"><i class="fa fa-caret-down ml-5"></i><span class="m-2">{{ $move->customer_name }}</span> </td>
                                    <td style="width: 250px;">{{ $move->from_location }}</td>
                                    <td style="width: 250px;">{{ $move->to_location }}</td>
                                    <td style="width: 120px;">{{ $move->date }}</td>
                                    <td style="width: 120px;">---</td>                     
                                </tr> 

                                <td colspan="5" class="hiddenRow" style="padding: 0; margin: 0;">
                                    <table class="table table-bordered collapse row-child" id="third{{$third}}" style="padding: 0; margin: 0; border: hidden">

                                        <tr>
                                            <td style="width: 400px;"><span style="padding-left: 50px;"> song 1 </span> </td>
                                            <td style="width: 250px;">02/03/2022</td>
                                            <td style="width: 250px;"></td>
                                            <td style="width: 120px;"></td>
                                            <td style="width: 120px;"></td>         
                                        </tr>

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