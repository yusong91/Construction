<table class="table table-bordered">
    <thead>
        <tr>
            <!-- <th scope="col" class="text-center">Equipment Type</th> -->
            <th scope="col" class="text-center">Equipment ID</th>
            <th scope="col" class="text-center">Sale Description</th>
            <th scope="col" class="text-center">Sale Date</th>
            <th scope="col" class="text-center">Sale Price</th>
            <th scope="col" class="text-center">Sale To</th>
            <th scope="col" class="text-center">Note</th>
        </tr>
    </thead>
    <tbody>
        @for($i = 1; $i <= 8; $i++)
            <tr>
                <!-- <td> 
                    <select class="form-control" required name="equipment_type" style="width: 150px;">
                        <option value=""></option>                                                 
                        </select>
                </td> -->
                <td>
                    <select class="form-control js-example-responsive"  name="{{$i}}equipment_id" data-live-search="true" style="width: 250px;">    
                        @foreach($equipments as $item)
                            <option value="{{$item->equip_type_id}} {{ $item->id }}">{{ $item->equipment_id }}</option>
                        @endforeach     
                    </select>
                </td>    
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}sale_description" style="width: 200px;">
                    </div>
                </td>
                <td>
                   <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}sale_date" id="purchased_date{{$i}}" style="width: 130px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="{{$i}}sale_price" style="width: 130px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}sale_to" style="width: 200px;">
                    </div>
                </td>
                <td>
                    <textarea name="{{$i}}note" class="form-control" rows="1" style="width: 350px;"></textarea>   
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
