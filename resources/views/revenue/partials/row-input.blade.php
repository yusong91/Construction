<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center align-middle">Customer *</th>
                <th scope="col" class="text-center align-middle">Company</th>
                <th scope="col" class="text-center align-middle">Equipment ID *</th>
                <th scope="col" class="text-center align-middle">From Date *</th>
                <th scope="col" class="text-center align-middle">To Date *</th>
                <th scope="col" class="text-center align-middle">Number of Working Days *</th>
                <th scope="col" class="text-center align-middle">Rental Price *</th>
                <th scope="col" class="text-center align-middle">Note</th>
                <th scope="col" class="text-center align-middle">Attached File</th>
            </tr>
        </thead>
        <tbody> 

            @for($i = 1; $i <= 8; $i++)

                <tr>
                        
                    <td>
                        <select class="form-control js-example-responsive"  name="{{$i}}customer_id" id="{{$i}}customer_id" data-live-search="true" style="width: 250px;">    
                            @foreach($customers as $item)
                                <option value="{{ $item->id }}" customer_name="{{$item->customer_name}}">{{ $item->company_name }}</option>
                            @endforeach     
                        </select>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}customer_name" id="{{$i}}customer_name" style="width: 200px;">
                        </div>
                    </td>
                            
                    <td>
                        <select class="form-control js-example-responsive"  name="{{$i}}equipment_id" id="{{$i}}equipment_id" data-live-search="true" style="width: 250px;">    
                            @foreach($equipments as $item)
                                <option value="{{ $item->equip_type_id }} {{ $item->id }}">{{ $item->equipment_id }}</option>
                            @endforeach     
                        </select>
                    </td>
    
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}from_date" id="a_date{{$i}}" style="width: 200px;">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}to_date" id="b_date{{$i}}" style="width: 130px;">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="{{$i}}work_day" id="{{$i}}work_day" style="width: 120px;">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="{{$i}}rental_price" id="{{$i}}rental_price" style="width: 120px;">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating" style="width: 350px;">
                            <textarea name="{{$i}}note" class="form-control" rows="1"></textarea> 
                        </div>   
                    </td>
                    <td>
                        <div class="form-floating">
                            <div class="custom-file" >
                                <input type="file" class="custom-file-input" id="customFile" name="{{$i}}image" style="width: 350px;">
                                <label class="custom-file-label" for="customFile"></label>
                            </div>
                        </div>
                    </td>
                        
                <tr>
            @endfor            
        </tbody>
    </table>
</div>
<script>

    $('.js-example-responsive').select2({
        placeholder: '',
        allowClear: true
    }).val(null).trigger('change');


    for (let index = 1; index <= 8; index++) { 

        $("#" + index +"customer_id").change(function () {

            var element = $('#' + index + 'customer_id' + ' option:selected');
            var customer_name = element.attr("customer_name");
            $("#" + index + "customer_name").val(customer_name);

            $("#" + index + "equipment_id").attr("required", "true");
            $("#a_date" + index).attr("required", "true");
            $("#b_date" + index).attr("required", "true");
            $("#" + index + "work_day").attr("required", "true");
            $("#" + index + "rental_price").attr("required", "true");
            
        });
    }

    for (let i=0; i<=8; i++){

        $("#" + i + "customer_id").change(function () {

            var data = $("#" + i + 'customer_id option:selected').val() ?? 'remove';

            if(data == 'remove') 
            {
                $("#" + i + "equipment_id").removeAttr('required');
                $("#a_date" + i).removeAttr('required');
                $("#b_date" + i).removeAttr('required');
                $("#" + i + "work_day").removeAttr('required');
                $("#" + i + "rental_price").removeAttr('required');
            }
            
        });
    }


</script>
