<fieldset class="border p-2" style="overflow-x: scroll;">

    <legend>Update Customer</legend>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center">Company Name *</th>
                <th scope="col" class="text-center">Customer Name</th>
                <th scope="col" class="text-center">Customer Phone *</th>
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Job Title</th>
                <th scope="col" class="text-center">Address</th>
                <th scope="col" class="text-center">Other</th>
            </tr>
        </thead>
        <tbody>
                @for($i = 1; $i <= 1; $i++)

                    <tr>
                        <td style="width: 10%;">
                            <div class="form-floating">
                                <input type="text" class="form-control" required name="company_name" value="{{ $edit->company_name }}">
                                <!-- @error('form_date') <span class="error text-danger">សូមបញ្ចូល  @lang('date')</span> @enderror -->
                            </div>    
                        </td>

                        <td style="width: 10%;">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="customer_name" value="{{ $edit->customer_name }}">
                            </div>
                        </td>

                        <td style="width: 10%;">
                            <div class="form-floating">
                                <input type="number" class="form-control" required name="customer_phone" value="{{ $edit->customer_phone }}">
                            </div>
                        </td>
                            
                        <td style="width: 15%;">
                            <div class="form-floating">
                                <input type="email" class="form-control" name="email" value="{{ $edit->email }}">
                            </div>
                        </td>

                        <td style="width: 10%;">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="job" value="{{ $edit->job }}">
                            </div>
                        </td>

                        <td style="width: 15%;">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="address" value="{{ $edit->address }}">
                            </div>
                        </td>

                        <td style="width: 20%;">
                            <textarea name="other" class="form-control" rows="1" >{{ $edit->other }}</textarea>   
                        </td>
                    <tr>
                @endfor     
        </tbody>
    </table>

</fieldset>
