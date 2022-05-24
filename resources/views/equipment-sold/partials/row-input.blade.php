<div class="table-responsive">    
    <table class="table table-bordered">
        <thead>
            <tr>
                <!-- <th scope="col" class="text-center">Equipment Type</th> -->
                <th scope="col" class="text-center">Equipment ID</th>
                <th scope="col" class="text-center">Sale Description</th>
                <th scope="col" class="text-center">Sale Date</th>
                <th scope="col" class="text-center">Sale Price</th>
                <th scope="col" class="text-center">Sale To</th>
                <th scope="col" class="text-center">Note</th>
            </tr>
        </thead>
        <tbody>
            @for($i = 1; $i <= 8; $i++)
                <tr>
                    <td style="width: 10%;">
                        <select class="form-control js-example-responsive"  name="{{$i}}equipment_id" id="{{$i}}equipment_id" data-live-search="true" >    
                            @foreach($equipments as $item)
                                <option value="{{$item->equip_type_id}} {{ $item->id }}" select_type="{{ $item->id }}">{{ $item->equipment_id }}</option>
                            @endforeach     
                        </select>
                    </td>    
                    <td style="width: 20%;">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}sale_description" >
                        </div>
                    </td>
                    <td style="width: 10%;">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}sale_date" id="purchased_date{{$i}}" >
                        </div>
                    </td>
                    <td style="width: 10%;">
                        <div class="form-floating">
                            <input type="number" class="form-control" name="{{$i}}sale_price" id="{{$i}}sale_price" >
                        </div>
                    </td>
                    <td style="width: 20%;">
                        <div class="form-floating">
                            <input type="text" class="form-control" name="{{$i}}sale_to" >
                        </div>
                    </td>
                    <td style="width: 30%;">
                    <div class="form-floating">
                        <textarea name="{{$i}}note" class="form-control" rows="1" ></textarea>   
                        </div>
                    </td>
                <tr>
            @endfor
                        
        </tbody>
    </table>
</div>
<script>

    $('.js-example-responsive').select2({
        placeholder: '',
        allowClear: true
    }).val(null).trigger('change');

    for (let index = 1; index <= 8; index++) {

        $("#" + index +"equipment_id").change(function () {

            var element = $('#' + index + 'equipment_id' + ' option:selected');

            var equipment_id = element.attr("select_type");

            $("#purchased_date" + index).attr("required", "true"); 

            $("#"+ index +"sale_price").attr("required", "true");
        });

        var data = $("#" + index + 'equipment_id option:selected').val() ?? 'remove';

        if(data == 'remove') 
        { 
            $("#purchased_date" + index).removeAttr('required'); 

            $("#"+ index +"sale_price").removeAttr('required');
        }
    }



</script>
