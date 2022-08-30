<div class="table-responsive">
    <table class="table table-bordered" style="width: 150%;"> 
        <thead>
            <tr>
                <th class="text-center">Customer Name *</th>
                <th class="text-center">Company Name</th>
                <th class="text-center">Customer Phone *</th>
                <th class="text-center">Email</th>
                <th class="text-center">Job Title</th>
                <th class="text-center">Address</th>
                <th class="text-center">Other</th>
            </tr>
        </thead> 
        <tbody>
            @for($i = 1; $i <= 8; $i++)

                <tr>
                    <td style="width: 10%;">
                        <div class="form-floating" >
                            <input type="text" class="form-control" name="{{$i}}company_name" id="{{$i}}company_name">
                            <!-- @error('form_date') <span class="error text-danger">សូមបញ្ចូល  @lang('date')</span> @enderror -->
                        </div>    
                    </td>

                    <td style="width: 10%;">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}customer_name" id="{{$i}}customer_name">
                        </div>
                    </td>

                    <td style="width: 10%;">
                        <div class="form-floating">
                            <input type="number" class="form-control" name="{{$i}}customer_phone" id="{{$i}}customer_phone">
                        </div>
                    </td>
                            
                    <td style="width: 15%;">
                        <div class="form-floating">
                            <input type="email" class="form-control" name="{{$i}}email" id="{{$i}}email">
                        </div>
                    </td>

                    <td style="width: 10%;">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}job"  id="{{$i}}job" >
                        </div>
                    </td>

                    <td style="width: 15%;">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}address" id="{{$i}}address" >
                        </div>
                    </td>

                    <td style="width: 20%;">
                        <textarea name="{{$i}}other" class="form-control" rows="1" ></textarea>   
                    </td>
                <tr>
            @endfor     
        </tbody>
    </table>
</div>

<script>

    for (let index = 0; index <= 8; index++) {
        
        $("#" + index +"company_name").change(function () {

            $("#" + index + "customer_phone").attr("required", "true");
            
            var data = $("#" + index + 'equipment_id option:selected').val() ?? 'remove';

            if(data == 'remove') 
            {
                $("#" + index + "customer_phone").removeAttr('required');
            }

        });
    }

</script>