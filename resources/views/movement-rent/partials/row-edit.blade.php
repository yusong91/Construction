<fieldset class="border p-2 " style="overflow-x: scroll;">

    <legend>Update Movement & Rent</legend>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">Equipment ID</th>
                <th scope="col" class="text-center">Company Name</th>
                <th scope="col" class="text-center">Customer Name</th>
                <th scope="col" class="text-center">Customer Phone</th>
                <th scope="col" class="text-center">Date</th>
                <th scope="col" class="text-center">From Location</th>
                <th scope="col" class="text-center">To Location</th>
                <th scope="col" class="text-center">Expected Date</th>
            </tr>
        </thead>
        <tbody>

            @for($i = 1; $i <= 1; $i++)

                <tr>
                    <td>
                        <select class="js-example-responsive form-control" name="equipment_id" style="width: 150px;">
                        <option value=""></option>
                            @foreach($equipments as $item)
                                <option value="{{ $item->equip_type_id }} {{ $item->id }}" {{ $item->id == $edit->equipment_id ? 'selected' : '' }}>{{ $item->equipment_id }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <select class="js-example-responsive form-control" name="customer_id" id="customer_id" style="width: 200px;">
                            <option value=""></option>
                                @foreach($customers as $item)
                                    <option value="{{ $item->id }}" customer="{{ $item->customer_name }}" customer_phone="{{ $item->customer_phone }}" {{ $item->id == $edit->customer_id ? 'selected' : '' }} >{{ $item->company_name }}</option>
                                @endforeach
                            </select>
                        </select>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="customer_name" id="customer_name" style="width: 200px;" value="{{ $edit->customer_name }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="customer_phone" id="customer_phone" style="width: 130px;" value="{{ $edit->customer_phone }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="date" id="purchased_date{{$i}}" style="width: 120px;" value="{{ getDateFormat($edit->date) }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="from_location" style="width: 200px;" value="{{ $edit->from_location }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="to_location" style="width: 200px;" value="{{ $edit->to_location }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="expected_date" style="width: 120px;" value="{{ $edit->expected_date }}">
                        </div>
                    </td>  
                <tr>
            @endfor
                        
        </tbody>
    </table>

</fieldset>

<script>

    $("#customer_id").change(function () {

        var element = $('#customer_id' + ' option:selected');
        var customer_name = element.attr("customer");
        $("#customer_name").val(customer_name);
        var customer_phone = element.attr("customer_phone");
        $("#customer_phone").val(customer_phone);
 
    });
    
</script>