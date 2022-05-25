<div class="table-responsive">
    <table class="table table-bordered" >
        <thead>
            <tr>
                <th scope="col" class="text-center align-middle">Equipment ID *</th>
                <th scope="col" class="text-center align-middle">Company Name *</th>
                <th scope="col" class="text-center align-middle">Customer Name</th>
                <th scope="col" class="text-center align-middle">Customer Phone</th>
                <th scope="col" class="text-center align-middle">Date *</th>
                <th scope="col" class="text-center align-middle">From Location</th>
                <th scope="col" class="text-center align-middle">To Location</th>
                <th scope="col" class="text-center align-middle">Expected Number of Working Day</th>
            </tr>
        </thead>
        <tbody> 

            @for($i = 1; $i <= 8; $i++)

                <tr>
                    <td style="width: 15%;">
                        <select class="form-control js-example-responsive"  name="{{$i}}equipment_id" id="{{$i}}equipment_id" data-live-search="true" >    
                            @foreach($equipments as $item)
                                <option value="{{ $item->equip_type_id }} {{ $item->id }}">{{ $item->equipment_id }}</option>
                            @endforeach     
                        </select>
                    </td>
                    <td style="width: 15%;">
                        <select class="form-control js-example-responsive"  name="{{$i}}company_name" data-live-search="true"  id="{{$i}}customer_id">    
                            @foreach($customers as $item)
                                <option value="{{ $item->id }}" customer="{{ $item->customer_name }}" customer_phone="{{ $item->customer_phone }}" >{{ $item->company_name }}</option>
                            @endforeach     
                        </select>
                    </td>
                    <td style="width: 15%;">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}customer_name" id="{{$i}}customer_name">
                        </div>
                    </td>
                    <td style="width: 10%;">
                        <div class="form-floating">
                            <input type="number" class="form-control" name="{{$i}}customer_phone" id="{{$i}}customer_phone">
                        </div>
                    </td>
                    <td style="width: 10%;">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}date" id="a_date{{$i}}">
                        </div>
                    </td>
                    <td style="width: 10%;">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}from_location" >
                        </div>
                    </td>
                    <td style="width: 10%;">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}to_location" >
                        </div>
                    </td>
                    <td style="width: 15%;">
                        <div class="form-floating">
                            <input type="number" class="form-control" name="{{$i}}expected_date" >
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

            var customer_name = element.attr("customer");
            $("#" + index + "customer_name").val(customer_name);
            var customer_phone = element.attr("customer_phone");
            $("#" + index + "customer_phone").val(customer_phone);
 
        });

        $("#" + index +"equipment_id").change(function () {

            $("#" + index + "customer_id").attr("required", "true");
            $("#a_date"+ index).attr("required", "true");

            var data = $("#" + index + 'equipment_id option:selected').val() ?? 'remove';

            if(data == 'remove') 
            {
                $("#" + index + "customer_id").removeAttr('required');
                $("#a_date" + index).removeAttr('required');
            }
 
        });
    }

</script>
