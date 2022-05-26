<table class="table table-bordered">
    <thead>
        <tr> 
            <th scope="col" class="text-center">Company Name *</th>
            <th scope="col" class="text-center">Supplier/Sale Name</th>
            <th scope="col" class="text-center">Phone *</th>
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
                        <input type="text" class="form-control" name="{{$i}}company_name" id="{{$i}}company_name">
                        <!-- @error('form_date') <span class="error text-danger">សូមបញ្ចូល  @lang('date')</span> @enderror -->
                    </div>    
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}supplier_name" id="{{$i}}supplier_name" style="width: 200px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="{{$i}}phone" id="{{$i}}phone" style="width: 150px;">
                    </div>
                </td>
                    <td>
                        <div class="form-floating">
                            <input type="email" class="form-control" name="{{$i}}email" id="{{$i}}email" style="width: 200px;">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}job" id="{{$i}}job" style="width: 150px;">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}address" id="{{$i}}address" style="width: 200px;">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}other" id="{{$i}}other" style="width: 200px;">
                        </div>   
                    </td>
                    <td>
                        <textarea name="{{$i}}note" class="form-control" rows="1" style="width: 350px;"></textarea>   
                    </td>            
                <tr>
        @endfor
    </tbody>
</table>

<script>

    for (let index = 1; index <= 8; index++){

        $("#" + index + "company_name").change(function () {

            $("#" + index + "phone").attr("required", "true");

            var data = $("#" + index + 'company_name').val() ?? 'remove';

            if(data == 'remove') 
            {
                $("#" + index + "phone").removeAttr('required');
            }
        });
    }

</script>