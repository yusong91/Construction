<table class="table table-bordered">
    <thead> 
        <tr>
            <th scope="col" class="text-center">Equipment ID *</th>
            <th scope="col" class="text-center">Brand *</th>
            <th scope="col" class="text-center">Historical Cost *</th>
            <th scope="col" class="text-center">Purchased Date</th>
            <th scope="col" class="text-center">Vendor Name</th>
            <th scope="col" class="text-center">Chassis No.</th>
            <th scope="col" class="text-center">Engine No *</th>
            <th scope="col" class="text-center">Weight</th>
            <th scope="col" class="text-center">Years</th>
            <th scope="col" class="text-center">Tax Receipt No.</th>
            <th scope="col" class="text-center">Notes</th>
            <th scope="col" class="text-center">Attached Image</th>
        </tr> 
    </thead>
    <tbody>

        @for($i = 1; $i <= 1; $i++)

            <tr>
                <td>
                    <div class="form-control" style="width: 150px;">
                        <input type="text" class="form-control" name="equipment_id" value="{{ $edit->	equipment_id }}">
                    </div>    
                </td>

                <td>
                    <select class="form-control js-example-basic-single"  name="brand_id" data-live-search="true" style="width: 250px;">
                        
                        @foreach($brands as $item)
                            <option value="{{ $item->id }}">{{ $item->value }}</option>
                        @endforeach     
                    </select>
                </td>
 
                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="historical_cost" style="width: 150px;" value="{{ $edit->historical_cost }}">
                    </div>
                </td>
                        
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="purchased_date" id="purchased_date{{$i}}" style="width: 150px;" value="{{ getDateFormat($edit->purchase_date) }}">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="vender" style="width: 200px;" value="{{ $edit->vender }}">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="chassis_no" style="width: 150px;" value="{{ $edit->chassis_no }}">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="engine_no" style="width: 150px;" value="{{ $edit->engine_no }}">
                    </div>   
                </td>
         
                <td>
                    <input type="number" class="form-control" name="weight" style="width: 80px;" value="{{ $edit->weight }}">
                </td>

                <td>
                    <input type="number" class="form-control" name="year" style="width: 80px;" value="{{ $edit->year }}">   
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="receipt_no" style="width: 150px;" value="{{ $edit->receipt_no }}">
                    </div> 
                </td>

                <td>
                    <div class="form-floating">
                        <textarea name="note" class="form-control" rows="1" style="width: 350px;">{{ $edit->note }}</textarea> 
                    </div>   
                </td>
                   
                <td>
                    <div class="form-floating">
                        <div class="custom-file" >
                            <input type="file" class="custom-file-input" id="{{$i}}customFile" name="image" style="width: 350px;">
                            <label class="custom-file-label" for="customFile">{{ $edit->image }}</label>
                        </div>
                    </div>
                </td>
            <tr>
        @endfor
                    
    </tbody>
</table>

<script>

    // var strEquipmentTypes = <?php echo collect($equipmentTypes); ?>
    // var datas  = Object.values(strEquipmentTypes);

    var id = '<?php echo $edit->equip_type_id; ?>';

    //var brands = <?php echo collect($brands); ?>

    //var datas_brand  = Object.values(brands);

    var edit = <?php echo $edit; ?>

    // for(i = 0; i < datas_brand.length; i++)
    // {
      
    //     if(datas_brand[i].id == edit.brand_id)
    //     {
    //         brand_id = datas_brand[i];
    //     } 
    // }

    $('.js-example-responsive').select2({
        placeholder: 'Equipment Type *',
        allowClear: true
    }).val(id).trigger('change');

    $(".js-example-basic-single").each(function() {

        }).select2({
            placeholder: '',
            allowClear: true
        
    }).val(edit.brand_id).trigger('change');
  
</script>
