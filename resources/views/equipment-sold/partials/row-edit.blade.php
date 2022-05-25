<fieldset class="border p-2" style="overflow-x: scroll;">

    <legend>Update Sold Equipment</legend>
                    
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
            @for($i = 1; $i <= 1; $i++)
                <tr>
                    
                    <td>
                        <select class="js-example-responsive form-control" name="equipment_id" style="width: 150px;" required>
                            @foreach($equipments as $item)
                                <option value="{{$item->equip_type_id}} {{$item->id}}" >{{ $item->equipment_id }}</option>
                            @endforeach                    
                        </select>
                    </td>    
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="sale_description" style="width: 200px;" value="{{ $edit->sale_description }}">
                        </div>
                    </td>
                    <td>
                    <div class="form-floating">
                            <input type="text" class="form-control" name="sale_date" id="purchased_date{{$i}}" style="width: 130px;" value="{{ $edit->sale_date }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="sale_price" style="width: 130px;" value="{{ $edit->sale_price }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="sale_to" style="width: 200px;" value="{{ $edit->sale_to }}">
                        </div>
                    </td>
                    <td>
                        <textarea name="note" class="form-control" rows="1" style="width: 350px;">{{ $edit->note }}</textarea>   
                    </td>
                <tr>
            @endfor
                        
        </tbody>
    </table>

</fieldset>
