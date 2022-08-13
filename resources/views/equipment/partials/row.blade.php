<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col" class="text-center">Equipment ID *</th>
            <th scope="col" class="text-center">Brand *</th>
            <th scope="col" class="text-center">Historical Cost *</th>
            <th scope="col" class="text-center">Purchased Date</th>
            <th scope="col" class="text-center">Vendor Name</th>
            <th scope="col" class="text-center">Chassis No.</th>
            <th scope="col" class="text-center">Engine No.</th>
            <th scope="col" class="text-center">Weight</th>
            <th scope="col" class="text-center">Year</th>
            <th scope="col" class="text-center">Tax Receipt No.</th>
            <th scope="col" class="text-center">Notes</th>
            <th scope="col" class="text-center">Attached Image</th>
        </tr> 
    </thead>
    <tbody>

        @for($i = 1; $i <= 8; $i++)

            <tr>
                <td>
                    <div class="form-floating" style="width: 150px;">
                        <input type="text" class="form-control" name="{{$i}}equipment_id" id="{{$i}}equipment_id">
                    </div>    
                </td>

                <td>
                    <select class="form-control js-example-basic-single"  name="{{$i}}brand_id" id="{{$i}}brand_id" data-live-search="true" style="width: 250px;">
                        @foreach($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->value }}</option>
                        @endforeach     
                    </select>
                </td>
 
                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="{{$i}}historical_cost" id="{{$i}}historical_cost" style="width: 150px;">
                    </div>
                </td>
                        
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}purchased_date" id="purchased_date{{$i}}" style="width: 150px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}vendor" id="{{$i}}vendor" style="width: 200px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}chassis_no" id="{{$i}}chassis_no" style="width: 150px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}engine_no" id="{{$i}}engine_no" style="width: 150px;">
                    </div>   
                </td>
         
                <td>
                    <input type="number" class="form-control" name="{{$i}}weight" id="{{$i}}weight" style="width: 80px;">
                </td>

                <td>
                    <input type="number" class="form-control" name="{{$i}}year" id="{{$i}}year" style="width: 80px;">   
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="{{$i}}receipt_no" id="{{$i}}receipt_no" style="width: 150px;">
                    </div> 
                </td>

                <td>
                    <div class="form-floating">
                        <textarea name="{{$i}}note" class="form-control" rows="1" style="width: 350px;"></textarea> 
                    </div>   
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

 
<script>
    
    $('.js-example-responsive').select2({
        placeholder: 'Equipment Type *',
        allowClear: true
    }).val(null).trigger('change');
    
   
    $(".js-example-basic-single").each(function() {

        }).select2({
            placeholder: '',
            allowClear: true
        
    }).val(null).trigger('change');

    for (let i = 0; i <=8; i++) {
       
        $("#"+ i +"equipment_id").change(function () {
        
            $("#"+ i +"brand_id").attr("required", "true");
            $("#"+ i +"historical_cost").attr("required", "true");

            var data = $("#" + i + 'equipment_id').val();

            if(data == '') 
            { 
                $("#"+ i +"brand_id").removeAttr('required'); 
                $("#"+ i +"historical_cost").removeAttr('required');
            } 

        });
    }

</script>
