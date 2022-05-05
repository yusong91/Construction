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
            <th scope="col" class="text-center">Note</th>
        </tr>
    </thead>
    <tbody>
        
            @for($i = 1; $i <= 1; $i++)
                <tr>
                    <td>
                        <div class="form-floating" style="width: 200px;">
                            <input type="text" required class="form-control" name="company_name" value="{{ $edit->company_name }}">
                            <!-- @error('form_date') <span class="error text-danger">សូមបញ្ចូល  @lang('date')</span> @enderror -->
                        </div>    
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" required class="form-control" name="supplier_name" style="width: 200px;" value="{{ $edit->supplier_name }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="number" required class="form-control" name="phone" style="width: 150px;" value="{{ $edit->phone }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" style="width: 200px;" value="{{ $edit->email }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="job" style="width: 150px;" value="{{ $edit->job }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="address" style="width: 200px;" value="{{ $edit->address }}">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="other" style="width: 200px;" value="{{ $edit->other }}">
                        </div>   
                    </td> 
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="note" style="width: 350px;" value="{{ $edit->note }}">
                        </div>   
                    </td>          
                <tr>
            @endfor         
    </tbody>
</table>
