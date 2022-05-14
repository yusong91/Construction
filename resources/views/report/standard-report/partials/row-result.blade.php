<div class="table-responsive mb-4" style="padding-top: 10px;">
    <table class="table table-bordered table-striped" style="padding: 0; margin: 0; border: hidden">
        <thead> 
            <th class="text-center" style="width: 30%;">Income/Expense</th>
            <th class="text-center" style="width: 20%;">Date</th>
            <th class="text-center" style="width: 30%;">Customer/Supplier Name</th>
            <th class="text-center">Amount</th>   
        </thead>
        <tbody>  
           
            <tr data-toggle="collapse" data-target="#demo1" class="accordion-toggle" style="padding: 0; margin: 0;">
                <td colspan="3"><i class="fa fa-caret-down"></i><span class="m-2">Income</span> </td>
                <td >${{ $total_income }}</td>                      
            </tr>  
            
                <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                    <table class="table table-bordered collapse row-child" id="demo1" style="padding: 0; margin: 0; border: hidden">

                    @foreach($incomes as $item)
                        <tr>
                            <td style="width: 30%;"><span class="ml-5"> {{ $item->parent_equipment->equipment_id }}</span></td>
                            <td style="width: 20%;">{{ getDateFormat($item->to_date) }}</td>
                            <td style="width: 30%;">{{ $item->parent_customer->company_name }}</td>
                            <td >${{ $item->amount }}</td>          
                        </tr>

                    @endforeach

                    </table>
                </td>
            
            <tr data-toggle="collapse" data-target="#demo2" class="accordion-toggle" style="padding: 0; margin: 0;">
                <td colspan="3"><i class="fa fa-caret-down"></i><span class="m-2">Expense</span> </td>
                <td>${{ $total_expense }}</td>                     
            </tr>  
                <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                    <table class="table table-bordered collapse row-child" id="demo2" style="padding: 0; margin: 0; border: hidden">

                    @foreach($expenses as $item)
                        <tr>
                            <td style="width: 30%;"><span class="ml-5">{{ $item->service }} {{ $item->parent_equipment->equipment_id }}</span> </td>
                            <td style="width: 20%;">{{ getDateFormat($item->date) }}</td>
                            <td style="width: 30%;">{{ $item->parent_supplier->company_name }}</td>
                            <td >${{ $item->unit_price * $item->amount }}</td>          
                        </tr>
                    @endforeach

                    </table>
                </td>

            <tr style="padding: 0; margin: 0;">

                <td colspan="4" class="hiddenRow" style="padding: 0; margin: 0;">
                    <table class="table table-bordered row-child" id="demo3" style="padding: 0; margin: 0; border: hidden">

                        <tr>
                            <td colspan="3" ><span >Net Income</span> </td>
                            
                            <td style="width: 20%;">${{ $net_income }}</td>          
                        </tr>

                    </table>
                </td>

            </tr>

        </tbody>
    </table> 
</div>