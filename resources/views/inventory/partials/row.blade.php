<table class="table table-bordered mt-4">
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
        @for($i = 1; $i <= 7; $i++)
            <tr>
                <td>
                    <div class="form-floating" style="width: 200px;">
                        <input type="text"  class="form-control" name="{{$i}}name">
                            <!-- @error('form_date') <span class="error text-danger">សូមបញ្ចូល  @lang('date')</span> @enderror -->
                        </div>    
                    </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}menufacture" style="width: 200px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}vender" style="width: 200px;">
                    </div>
                </td>
                        
                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="{{$i}}quantity" style="width: 100px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}unit" style="width: 100px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="{{$i}}price" style="width: 100px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}purchased_date" id="purchased_date{{$i}}" style="width: 130px;">
                    </div>   
                </td>
         
                <td>
                    <input type="text" class="form-control" name="{{$i}}warehouse_location" style="width: 250px;">
                </td>

                <td>
                    <textarea name="{{$i}}note" class="form-control" rows="1" style="width: 350px;"></textarea>   
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
