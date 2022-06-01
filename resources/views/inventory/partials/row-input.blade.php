<div class="table-responsive">
    <table class="table table-bordered">
        <thead> 
            <tr>
                <th scope="col" class="text-center align-middle">Item Name *</th>
                <th scope="col" class="text-center align-middle">Manufacture</th>
                <th scope="col" class="text-center align-middle">Vender</th>
                <th scope="col" class="text-center align-middle">Quantity *</th>
                <th scope="col" class="text-center align-middle">Unit *</th>
                <th scope="col" class="text-center align-middle">Price *</th>
                <th scope="col" class="text-center align-middle">Purchased Date *</th>
                <th scope="col" class="text-center align-middle">Warehouse Location *</th>
                <th scope="col" class="text-center align-middle">Notes</th>
                <th scope="col" class="text-center align-middle">Attached Image</th>
            </tr> 
        </thead> 
        <tbody> 
            @for($i = 1; $i <= 7; $i++)
                <tr>
                    <td>
                        <select class="form-control select-subcategory"  name="{{$i}}name" id="{{$i}}name" data-live-search="true" style="width: 250px; border: 2px solid #ccc;">    
                                
                        </select>            
                    </td>
                    <td> 
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}menufacture" id="{{$i}}menufacture" style="width: 200px;">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}vender" id="{{$i}}vender" style="width: 200px;">
                        </div>
                    </td>
                             
                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="{{$i}}quantity" id="{{$i}}quantity" style="width: 100px;">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}unit" id="{{$i}}unit" style="width: 100px;">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="{{$i}}price" id="{{$i}}price" style="width: 100px;">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}purchased_date" id="purchased_date{{$i}}" style="width: 150px;">
                        </div>   
                    </td>
            
                    <td>
                        <select class="form-control select-warehouse"  name="{{$i}}warehouse_id" id="{{$i}}warehouse_id" data-live-search="true" style="width: 250px; border: 2px solid #ccc;" >    
                            @foreach($warehouses as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach     
                        </select>            
                    </td>

                    <td>
                        <textarea name="{{$i}}note" class="form-control" rows="1" style="width: 350px;"></textarea>   
                    </td> 

                    <td>
                        <div class="form-floating">
                            <div class="custom-file" >
                                <input type="file" class="custom-file-input" id="{{$i}}customFile" name="{{$i}}image" style="width: 350px;">
                                <label class="custom-file-label" for="{{$i}}customFile"></label>
                            </div>
                        </div>
                    </td>  
                <tr>
            @endfor               
        </tbody>
    </table>
</div>