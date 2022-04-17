<table class="table table-bordered">
    <thead>
        <tr>
        <th scope="col" class="text-center align-middle">Date</th>
            <th scope="col" class="text-center align-middle">Spare Part</th>
            <th scope="col" class="text-center align-middle">Equipment ID</th>
            <th scope="col" class="text-center align-middle">Service</th>
            <th scope="col" class="text-center align-middle">Quantity</th>
            <th scope="col" class="text-center align-middle">Unit Price</th>
            <th scope="col" class="text-center align-middle">Amount</th>
            <th scope="col" class="text-center align-middle">Suplier Name</th>
            <th scope="col" class="text-center align-middle">Responsible Person</th>
            <th scope="col" class="text-center align-middle">Note</th>
            <th scope="col" class="text-center align-middle">Image of Broken</th>
            <th scope="col" class="text-center align-middle">Image of Replacement</th>
        </tr>
    </thead>
    <tbody> 
        @for($i = 1; $i <= 8; $i++)
                <tr>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="a_date{{$i}}" name="{{$i}}date" style="width: 120px;">
                        </div>
                    </td>
                    <td>
                        <select class="form-control js-example-responsive"  name="{{$i}}type_id" data-live-search="true" style="width: 200px;"> 
                            @foreach($spare_parts as $items)
                                <optgroup label="{{ $items->value }}">
                                    @foreach($items->children_inventory as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </td>
                        
                    <td>
                        <select class="form-control js-example-responsive"  name="{{$i}}equipment_id" data-live-search="true" style="width: 200px;">
                            @foreach($equipments as $items)
                                <optgroup label="{{ $items->value }}">
                                    @foreach($items->children_equipment as $item)
                                        <option value="{{ $item->equip_type_id }} {{ $item->id }}">{{ $item->equipment_id }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}service" style="width: 200px;">
                        </div>
                    </td>
 
                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="{{$i}}quantity" style="width: 80px;">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="{{$i}}unit_price" style="width: 120px;">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="{{$i}}amount" style="width: 80px;">
                        </div>
                    </td>

                    <td>
                        <select class="form-control js-example-responsive"  name="{{$i}}supplier_id" data-live-search="true" style="width: 200px;"> 
                            @foreach($suppliers as $item)
                                <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                            @endforeach
                        </select>
                    </td>
                    
                    <td>
                        <select class="form-control js-example-responsive"  name="{{$i}}staff_id" data-live-search="true" style="width: 200px;"> 
                            @foreach($staffs as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
 
                    <td>
                        <div class="form-floating" style="width: 350px;">
                            <textarea name="{{$i}}note" class="form-control" rows="1"></textarea> 
                        </div>   
                    </td>

                    <td>
                        <div class="form-floating">
                            <div class="custom-file" >
                                <input type="file" class="custom-file-input" id="file_broken{{$i}}" name="{{$i}}image_broken" style="width: 350px;">
                                <label class="custom-file-label" for="file_broken{{$i}}"></label>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <div class="custom-file" >
                                <input type="file" class="custom-file-input" id="file_replacement{{$i}}" name="{{$i}}image_replace" style="width: 350px;">
                                <label class="custom-file-label" for="file_replacement{{$i}}"></label>
                            </div>
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
