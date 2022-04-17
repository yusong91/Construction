<table class="table table-bordered">
    <thead>
        <tr> 
            <th scope="col" class="text-center">Company Name</th>
            <th scope="col" class="text-center">Supplier/Sale Name</th>
            <th scope="col" class="text-center">Phone</th>
            <th scope="col" class="text-center">E-mail</th>
            <th scope="col" class="text-center">Job Title</th>
            <th scope="col" class="text-center">Address</th>
            <th scope="col" class="text-center">Other</th>
            <th scope="col" class="text-center">Notes</th> 
        </tr>
    </thead>
    <tbody>
            @for($i = 1; $i <= 7; $i++)
                <tr>
                    <td>
                        <div class="form-floating" style="width: 200px;">
                            <input type="text" class="form-control" name="{{$i}}company_name">
                            <!-- @error('form_date') <span class="error text-danger">សូមបញ្ចូល  @lang('date')</span> @enderror -->
                        </div>    
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}supplier_name" style="width: 200px;">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="{{$i}}phone" style="width: 150px;">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="email" class="form-control" name="{{$i}}email" style="width: 200px;">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}job" style="width: 150px;">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}address" style="width: 200px;">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}other" style="width: 200px;">
                        </div>   
                    </td>
                    <td>
                        <textarea name="{{$i}}note" class="form-control" rows="1" style="width: 350px;"></textarea>   
                    </td>            
                <tr>
            @endfor
         
    </tbody>
</table>
