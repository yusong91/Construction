<div class="table-responsive">
    <table class="table table-bordered">
        <thead> 
            <tr>
                <th scope="col" class="text-center align-middle">Item Name</th>
                <th scope="col" class="text-center align-middle">Menufacture</th>
                <th scope="col" class="text-center align-middle">Vender</th>
                <th scope="col" class="text-center align-middle">Quantity</th>
                <th scope="col" class="text-center align-middle">Unit</th>
                <th scope="col" class="text-center align-middle">Price</th>
                <th scope="col" class="text-center align-middle">Purchased Date</th>
                <th scope="col" class="text-center align-middle">Warehouse Location</th>
                <th scope="col" class="text-center align-middle">Notes</th>
                <th scope="col" class="text-center align-middle">Attached Image</th>
            </tr> 
        </thead> 
        <tbody> 
        @for($i = 1; $i <= 1; $i++)
                <tr>
                    <td>
                         
                        <select class="form-control select-subcategory"  name="name" id="name" data-live-search="true" style="width: 250px; border: 2px solid #ccc;">    
                            
                        </select>  
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="menufacture" style="width: 200px;" value="{{ $edit->menufacture }}">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="vender" style="width: 200px;" value="{{ $edit->vender }}">
                        </div>
                    </td>
                            
                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="quantity" style="width: 100px;" value="{{ $edit->quantity }}">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="unit" style="width: 100px;" value="{{ $edit->unit }}">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="price" style="width: 100px;" value="{{ $edit->price }}">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="purchased_date" id="purchased_date{{$i}}" style="width: 140px;" value="{{ getDateFormat($edit->menufacture) }}">
                        </div>   
                    </td>
            
                    <td>
                        <select class="warehouse form-control" required name="warehouse_id" data-live-search="true" style="width: 200px;">
                            @foreach($warehouses as $item)
                                <option value="{{ $item->id }}" >{{ $item->name }}</option>
                            @endforeach 
                        </select>
                    </td>

                    <td>
                        <textarea name="note" class="form-control" rows="1" style="width: 350px;">{{ $edit->note }}</textarea>   
                    </td>

                    <td>
                        <div class="form-floating">
                            <div class="custom-file" >
                                <input type="file" class="custom-file-input" id="customFile" name="image" style="width: 350px;">
                                <label class="custom-file-label" for="customFile">{{ $edit->image }}</label>
                            </div>
                        </div>
                    </td>
                <tr>
        @endfor               
        </tbody>
    </table>
</div>