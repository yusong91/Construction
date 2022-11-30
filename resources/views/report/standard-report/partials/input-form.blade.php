<div class="row">

    <div class="col-3">
        <div class="form-floating mb-3">
            <label for="a_date">@lang('Equipment Type')</label>
            <select class="form-control js-example-responsive" name="equipment_type" data-live-search="true" id="equipment_type" >
                <option value="">Select</option>
                @foreach($equipment_types as $item)
                    <option value="[{{$item->children_equipment }} | {{ $item->id }}]" {{ $equipment_type_selected === $item->id ? "selected" : ""}} > {{ $item->value }} </option>
                @endforeach
            </select>       
        </div>    
    </div> 

    <div class="col-3">
        <div class="form-floating mb-3">
            <label for="a_date">@lang('Equipment')</label>
            <select class="form-control js-example-responsive" name="equipment" data-live-search="true" id="equipment">
                <option value="">Select</option>
            </select>       
        </div>
    </div> 
            
    <div class="col-2">
        <div class="form-floating mb-3">
            <label for="a_date">@lang('From Date')</label>
            <input type="text" id="a_date" class="form-control" name="from_date" value="{{ isset($data['from_date']) ? $data['from_date'] : '' }}" required >       
        </div>
    </div> 

    <div class="col-2">
        <div class="form-floating mb-3">
            <label for="a_date">@lang('To Date')</label>
            <input type="text" id="b_date" class="form-control" name="to_date" value="{{ isset($data['to_date']) ? $data['to_date'] : '' }}" >       
        </div>
    </div> 
  
</div>

<script>

    var equipment_id = <?php echo $data['equipment'] ?? 0; ?>

    // $("#equipment_type").change(function () {
    //     var str_equipment = $("#equipment_type").val();
    //     var expose_array = str_equipment.split('|');
    //     var json_equipment = JSON.parse(expose_array);
    //     var equipment =  json_equipment[0];
    //     $('#equipment').empty()
    //     $('#equipment').append(`<option value="" >Select</option>`);
    //     for (let index = 0; index < equipment.length; index++) {
            
    //         const element = equipment[index];
    //         var selected = equipment_id == element.id ? 'selected' : '';
    //         $('#equipment').append(`<option value="${element.id}"   "${selected}"> ${element.equipment_id} </option>`);
    //     }        
    // });

    // if(equipment_id)
    // {
    //     var str_equipment = $("#equipment_type").val();

    //     var expose_array = str_equipment.split('|');
        
    //     var json_equipment = JSON.parse(expose_array);
        
    //     var equipment =  json_equipment[0];
        
    //     for (let index = 0; index < equipment.length; index++) {
            
    //         const element = equipment[index];
    //         var selected = equipment_id == element.id ? 'selected' : '';
    //         $('#equipment').append(`<option value="${element.id}" ${selected}> ${element.equipment_id} </option>`);
    //     }        
    // }

</script>