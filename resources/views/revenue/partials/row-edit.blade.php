<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center align-middle">Company</th>
            <th class="text-center align-middle">Customer</th>
            <th class="text-center align-middle">Equipment ID</th>
            <th class="text-center align-middle">From Date</th>
            <th class="text-center align-middle">To Date</th>
            <th class="text-center align-middle">Number of Working Days</th>
            <th class="text-center align-middle">Rental Price</th>
            <th class="text-center align-middle">Amount</th>
            <th class="text-center align-middle">Note</th>
            <th class="text-center align-middle">Attached File</th>
        </tr>
    </thead>
    <tbody> 

        @for($i = 1; $i <= 1; $i++)

            <tr>
                    
                <td>
                    <select class="js-example-responsive form-control" name="customer_id" id="customer_id" style="width: 200px;">
                        @foreach($customers as $item)
                            <option value="{{ $item->id }}" customer_name="{{$item->customer_name}}" {{ $item->id == $edit->customer_id ? 'selected' : '' }} >{{ $item->company_name }}</option> 
                        @endforeach
                    </select>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="customer_name" id="customer_name" style="width: 200px;" value="{{ $edit->customer_name }}">
                    </div>
                </td>
                        
                <td>
                    <select class="js-example-responsive form-control" name="equipment_id" style="width: 200px;">
                        @foreach($equipments as $item)
                            <option value="{{ $item->equip_type_id }} {{ $item->id }}" {{ $item->id == $edit->equipment_id ? 'selected' : '' }}>{{ $item->equipment_id }}</option> 
                        @endforeach                                
                    </select>
                </td>
 
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="from_date" id="a_date{{$i}}" style="width: 200px;" value="{{ getDateFormat($edit->from_date) }}">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="to_date" id="b_date{{$i}}" style="width: 130px;" value="{{ getDateFormat($edit->to_date) }}">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="work_day" style="width: 120px;" value="{{ $edit->number_working_day }}">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="rental_price" style="width: 120px;" value="{{ $edit->rent_price }}">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="amount" style="width: 80px;" value="{{ $edit->amount }}">
                    </div>
                </td>
                <td>
                    <div class="form-floating" style="width: 350px;">
                        <textarea name="note" class="form-control" rows="1">{{ $edit->note }}</textarea> 
                    </div>   
                </td>
                <td>
                    <div class="form-floating">
                        <div class="custom-file" >
                            <input type="file" class="custom-file-input" id="customFile" name="image" style="width: 350px;">
                            <label class="custom-file-label" for="customFile"></label>
                        </div>
                    </div>
                </td>
                    
            <tr>
        @endfor            
    </tbody>
</table>

<script>

    $("#customer_id").change(function () {

        var element = $('#customer_id' + ' option:selected');
        var customer_name = element.attr("customer_name");
        $("#customer_name").val(customer_name);

    });

</script>