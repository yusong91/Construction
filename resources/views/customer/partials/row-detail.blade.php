<fieldset class="border p-2" style="overflow-x: scroll;">

    <legend>Customer Info</legend>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">Company Name</th>
                <th scope="col" class="text-center">Customer Name</th>
                <th scope="col" class="text-center">Customer Phone</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Job Title</th>
                <th scope="col" class="text-center">Address</th>
                <th scope="col" class="text-center">Other</th>
            </tr>
        </thead>
        <tbody>
                @for($i = 1; $i <= 1; $i++)

                    <tr>
                        <td>
                            <div class="form-floating" style="width: 200px;">
                                <input type="text" class="form-control" name="company_name" value="{{ $edit->company_name }}">
                                <!-- @error('form_date') <span class="error text-danger">សូមបញ្ចូល  @lang('date')</span> @enderror -->
                            </div>    
                        </td>

                        <td>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="customer_name" style="width: 200px;" value="{{ $edit->customer_name }}">
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <input type="number" class="form-control" name="customer_phone" style="width: 150px;" value="{{ $edit->customer_phone }}">
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
                            <textarea name="other" class="form-control" rows="1" style="width: 350px;">{{ $edit->other }}</textarea>   
                        </td>
                    <tr>
                @endfor     
        </tbody>
    </table>

</fieldset>
