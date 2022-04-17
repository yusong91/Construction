<div class="table-responsive mb-4" style="padding-top: 10px;">
    <table class="table table-bordered table-striped" style="padding: 0; margin: 0; border: hidden">
        <thead> 
            <th class="text-center" style="width: 450px;">Income/Expense</th>
            <th class="text-center" style="width: 120px;">Date</th>
            <th class="text-center" style="width: 350px;">Customer/Supplier Name</th>
            <th class="text-center">Amount</th>   
        </thead>
        <tbody>  
           
            <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle" style="padding: 0; margin: 0;">
                <td style="width: 450px;"><i class="fa fa-caret-down"></i><span class="m-2">Income</span> </td>
                <td style="width: 120px;"></td>
                <td style="width: 350px;"></td>
                <td>${{ $total_income }}</td>                      
            </tr>  

            <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                <table class="table table-bordered collapse row-child" id="demo1" style="padding: 0; margin: 0; border: hidden">

                @foreach($incomes as $item)
                    <tr>
                        <td style="width: 450px;"><span style="padding-left: 50px;">{{ $item->parent_equipment->equipment_id }}</span> </td>
                        <td style="width: 120px;">{{ getDateFormat($item->to_date) }}</td>
                        <td style="width: 350px;">{{ $item->parent_customer->company_name }}</td>
                        <td >${{ $item->amount }}</td>          
                    </tr>

                @endforeach

                </table>
            </td>

            <tr data-toggle="collapse" data-target="#demo2" class="accordion-toggle" style="padding: 0; margin: 0;">
                <td style="width: 450px;"><i class="fa fa-caret-down"></i><span class="m-2">Expense</span> </td>
                <td style="width: 120px;"></td>
                <td style="width: 350px;"></td>
                <td>${{ $total_expense }}</td>                     
            </tr>  

                <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                    <table class="table table-bordered collapse row-child" id="demo2" style="padding: 0; margin: 0; border: hidden">

                    @foreach($expenses as $item)
                        <tr>
                            <td style="width: 450px;"><span style="padding-left: 50px;">{{ $item->service }} {{ $item->parent_equipment->equipment_id }}</span> </td>
                            <td style="width: 120px;">{{ getDateFormat($item->date) }}</td>
                            <td style="width: 350px;">{{ $item->parent_supplier->company_name }}</td>
                            <td>${{ $item->unit_price * $item->amount }}</td>          
                        </tr>
                    @endforeach

                    </table>
                </td>
            <tr>

                <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                    <table class="table table-bordered row-child" id="demo3" style="padding: 0; margin: 0; border: hidden">

                        <tr>
                            <td style="width: 450px;"><span style="padding-left: 25px;">Net Income</span> </td>
                            <td style="width: 120px;"></td>
                            <td style="width: 350px;"></td>
                            <td >${{ $net_income }}</td>          
                        </tr>

                    </table>
                </td>

            </tr>

        </tbody>
    </table> 
</div>