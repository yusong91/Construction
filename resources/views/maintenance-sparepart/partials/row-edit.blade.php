<fieldset class="border p-2 " style="overflow-x: scroll;">

    <legend>Update Maintenance & Spare Part</legend>

    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col" class="text-center align-middle">Date</th>
                <th scope="col" class="text-center align-middle">Spare Part</th>
                <th scope="col" class="text-center align-middle">Equipment ID</th>
                <th scope="col" class="text-center align-middle">Service</th>
                <th scope="col" class="text-center align-middle">Quantity</th>
                <th scope="col" class="text-center align-middle">Unit</th>
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
            @for($i = 1; $i <= 1; $i++)
                <tr>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="a_date{{$i}}" name="date" style="width: 100px;" value="{{ getDateFormat($edit->date) }}">
                        </div>
                    </td>
                    <td>
                        <select class="js-example-responsive form-control" name="type_id" style="width: 200px;">        
                            @foreach($spare_parts as $items)
                                <optgroup label="{{ $items->value }}">
                                    @foreach($items->children_inventory as $item)
                                        <option value="{{ $item->id }}" {{ $item->id == $edit->inventory_id ? 'selected' : '' }}>{{ $item->name }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </td>        
                    <td>
                        <select class="js-example-responsive form-control" name="equipment_id" style="width: 200px;">
                            @foreach($equipments as $items)
                                <optgroup label="{{ $items->value }}">
                                    @foreach($items->children_equipment as $item)
                                        <option value="{{ $item->equip_type_id }} {{ $item->id }}" {{ $item->id == $edit->equipment_id ? 'selected' : '' }}>{{ $item->equipment_id }}</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="service" style="width: 200px;" value="{{ $edit->service }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="quantity" style="width: 80px;" value="{{ $edit->quantity }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="unit" style="width: 120px;" value="{{ $edit->unit }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="unit_price" style="width: 120px;" value="{{ $edit->unit_price }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="amount" style="width: 80px;" value="{{ $edit->amount }}">
                        </div>
                    </td>
                    <td>
                        <select class="js-example-responsive form-control"  name="supplier_id" style="width: 200px;">                
                            @foreach($suppliers as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $edit->supplier_id ? 'selected' : '' }}>{{ $item->company_name }}</option>
                            @endforeach
                        </select>
                    </td>  
                    <td>
                        <select class="js-example-responsive form-control"  name="staff_id" style="width: 200px;">                
                            @foreach($staffs as $item)
                                <option value="{{ $item->id }}" {{ $item->id == $edit->staff_id ? 'selected' : '' }}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </td>
                    <td>
                        <div class="form-floating" style="width: 350px;">
                            <textarea name="note" class="form-control" rows="1">{{ $edit->note}}</textarea> 
                        </div>   
                    </td>
                    <td>
                        <div class="form-floating">
                            <div class="custom-file" >
                                <input type="file" class="custom-file-input" id="file_broken" name="image_broken" style="width: 350px;">
                                <label class="custom-file-label" for="file_broken"></label>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <div class="custom-file" >
                                <input type="file" class="custom-file-input" id="file_replacement" name="image_replace" style="width: 350px;">
                                <label class="custom-file-label" for="file_replacement"></label>
                            </div>
                        </div>
                    </td>
                <tr>
            @endfor            
        </tbody>
    </table>
</fieldset>