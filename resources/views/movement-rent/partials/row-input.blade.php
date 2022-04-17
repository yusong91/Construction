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

        @for($i = 1; $i <= 8; $i++)

            <tr>
                <td>
                    <!-- <select class="form-control" name="{{$i}}equipment_id" style="width: 150px;">
                    <option value=""></option>
                        @foreach($equipments as $item)
                            <option value="{{ $item->equip_type_id }} {{ $item->id }}">{{ $item->equipment_id }}</option>
                        @endforeach
                    </select> -->
                    <select class="form-control js-example-responsive"  name="{{$i}}equipment_id" data-live-search="true" style="width: 250px;">    
                        @foreach($equipments as $item)
                            <option value="{{ $item->equip_type_id }} {{ $item->id }}">{{ $item->equipment_id }}</option>
                        @endforeach     
                    </select>
                </td>
                <td>
                    <!-- <select class="form-control" name="{{$i}}company_name" style="width: 200px;">
                        <option value=""></option>
                            @foreach($customers as $item)
                                <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                            @endforeach
                        </select>
                    </select> -->
                    <select class="form-control js-example-responsive"  name="{{$i}}company_name" data-live-search="true" style="width: 250px;">    
                        @foreach($customers as $item)
                            <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                        @endforeach     
                    </select>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}customer_name" style="width: 200px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="{{$i}}customer_phone" style="width: 130px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}date" id="purchased_date{{$i}}" style="width: 120px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}from_location" style="width: 200px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}to_location" style="width: 200px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}expected_date" style="width: 120px;">
                    </div>
                </td>  
            <tr>
        @endfor
                    
    </tbody>
</table>


<script>

    $('.js-example-responsive').select2({
        placeholder: '',
        allowClear: true
    }).val(null).trigger('change');

</script>
