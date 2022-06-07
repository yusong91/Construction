<div class="table-responsive" style="padding-top: 20px; padding-bottom: 10px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center align-middle">Type *</th>
                <th scope="col" class="text-center align-middle">Spare-Part/Service Name *</th>
                <th scope="col" class="text-center align-middle">Equipment ID *</th>
                <th scope="col" class="text-center align-middle">Suplier Name *</th>
                <th scope="col" class="text-center align-middle">Responsible Person *</th>
                <th scope="col" class="text-center align-middle">Quantity *</th>
                <th scope="col" class="text-center align-middle">Unit *</th>
                <th scope="col" class="text-center align-middle">Unit Price *</th>
                <th scope="col" class="text-center align-middle">Invoice Date</th>
                <th scope="col" class="text-center align-middle">Invoice Number *</th>
                <th scope="col" class="text-center align-middle">Invoice Number/Other Attachment *</th>
                <th scope="col" class="text-center align-middle">Note</th>
                <th scope="col" class="text-center align-middle">Image of Broken</th>
                <th scope="col" class="text-center align-middle">Image of Replacement</th>
            </tr>
        </thead>
        <tbody>  
           
                    <tr>
                        <td> 
                            <select class="form-control category"  name="category_id" data-live-search="true" style="width: 200px;" id="category_select"> 
                                @foreach($types as $key => $value)
                                    <option value="{{ $key }}" select_type="{{ $key }}" >{{ $value }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <div id="service_name">
                                <input type="text" class="form-control form-borderless" name="service_name" id="service_name" style="width: 250px;">
                            </div>
                            <div id="select_spart_part">
                                <select class="form-control js-example-responsive"  name="type_id" id="type_id" data-live-search="true" style="width: 250px;"> 
                                    @foreach($spare_parts as $items)
                                        <optgroup label="{{ $items->value }}">
                                            @foreach($items->children_inventory as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </optgroup>
                                    @endforeach
                                </select>
                            </div>
                        </td>
                            
                        <td>
                            <select class="form-control js-example-responsive"  name="equipment_id" id="equipment_id" data-live-search="true" style="width: 200px;">
                                @foreach($equipments as $items)
                                    <optgroup label="{{ $items->value }}">
                                        @foreach($items->children_equipment as $item)
                                            <option value="{{ $item->equip_type_id }} {{ $item->id }}">{{ $item->equipment_id }}</option>
                                        @endforeach
                                    </optgroup>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <select class="form-control js-example-responsive"  name="supplier_id" id="supplier_id" data-live-search="true" style="width: 200px;"> 
                                @foreach($suppliers as $item)
                                    <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        
                        <td>
                            <select class="form-control js-example-responsive"  name="staff_id" id="staff_id" data-live-search="true" style="width: 200px;"> 
                                @foreach($staffs as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <div class="form-floating">
                                <input type="number" class="form-control form-borderless" name="quantity" id="quantity" style="width: 100px;" value="{{ $edit->quantity }}">
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <input type="text" class="form-control form-borderless" name="unit" id="unit" style="width: 80px;" value="{{ $edit->unit }}">
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <input type="number" class="form-control form-borderless" name="unit_price" id="unit_price" style="width: 120px;" value="{{ $edit->unit_price }}">
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <input type="text" class="form-control form-borderless" name="invoice_date" id="a_date" style="width: 130px;" value="{{ getDateFormat($edit->invoice_date) }}">
                            </div>
                        </td> 

                        <td> 
                            <div class="form-floating">
                                <input type="number" class="form-control form-borderless" name="invoice_number" id="invoice_number" style="width: 170px;" value="{{ $edit->invoice_number }}">
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <div class="custom-file" >
                                    <input type="file" class="custom-file-input" id="invoice_file" name="invoice_file" style="width: 350px;">
                                    <label class="custom-file-label form-borderless" for="invoice_file"></label>
                                </div>
                            </div>
                        </td>
    
                        <td>
                            <div class="form-floating" style="width: 350px;">
                                <textarea name="note" class="form-control form-borderless" rows="1">{{ $edit->note }}</textarea> 
                            </div>   
                        </td>

                        <td>
                            <div class="form-floating">
                                <div class="custom-file" >
                                    <input type="file" class="custom-file-input" id="file_broken" name="image_broken" style="width: 350px;">
                                    <label class="custom-file-label form-borderless" for="file_broken"></label>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <div class="custom-file" >
                                    <input type="file" class="custom-file-input" id="file_replacement" name="image_replace" style="width: 350px;">
                                    <label class="custom-file-label form-borderless" for="file_replacement"></label>
                                </div>
                            </div>
                        </td>
                    <tr>
            
                        
        </tbody>
    </table>
</div>

<script>

    $('.js-example-responsive').select2({
        placeholder: '',
        allowClear: true
    }); 

    var type_category = '<?php echo $edit->type;?>'
    $('.category').select2({
        placeholder: '',
        allowClear: true
    }).val(type_category).trigger('change');

    switch (type_category) {

        case "new_spare_part":
            $("#select_spart_part").hide();
            $("#service_name").show();
            $("#unit").prop( "disabled", false);
            $("#unit_price").prop( "disabled", false);
            $("#invoice_number").prop( "disabled", false);
            $("#a_date").prop( "disabled", false);
            $("#invoice_file").prop( "disabled", false);
                
            $("#service_name" ).val('');
            $("#service_name").show();

            $("#service_name").attr("required", "true");
            $("#quantity").attr("required", "true");
            $("#unit").attr("required", "true");
            $("#unit_price").attr("required", "true");
            $("#invoice_number").attr("required", "true");
            $("#invoice_file").attr("required", "true");
            $("#supplier_id").attr("required", "true");
            $("#staff_id").attr("required", "true");

            break;

        case "service":
            $("#select_spart_part").hide();
            $("#service_name").show();
            $("#unit").prop( "disabled", false);
            $("#unit_price").prop( "disabled", false);
            $("#a_date").prop( "disabled", false);
            $("#invoice_number").prop( "disabled", false);
            $("#invoice_file").prop( "disabled", false);

            $("#service_name").val('');
            $("#service_name").show();

            $("#service_name").attr("required", "true");
            $("#quantity").attr("required", "true");
            $("#unit").attr("required", "true");
            $("#unit_price").attr("required", "true");
            $("#invoice_file").attr("required", "true");
            $("#invoice_number").attr("required", "true");
            $("#supplier_id").attr("required", "true");
            $("#staff_id").attr("required", "true");
            break;

        case "inventory":
            $("#select_spart_part").show();
            $("#service_name").hide();
            $("#unit").prop( "disabled", true );
            $("#unit_price").prop( "disabled", true );
            $("#invoice_number").prop( "disabled", true );
            $("#a_date").prop( "disabled", true );
            $("#invoice_file").prop( "disabled", true );

            $("#quantity").removeAttr('required');
            $("#service_name").removeAttr('required');
            $("#equipment_id").removeAttr('required');
            $("#unit").removeAttr('required');
            $("#unit_price").removeAttr('required');
            $("#invoice_file").removeAttr('required');
            $("#invoice_number").removeAttr('required');
            $("#supplier_id").attr("required", "true");
            $("#staff_id").attr("required", "true");
            break;

        default:
            break;
    }

        //$("#select_spart_part").hide();

        $("#category_select").change(function () {

            var element = $('#category_select' + ' option:selected');

            var select_type = element.attr("select_type");

            $("#equipment_id").attr("required", "true");

            switch (select_type) {

                    case "new_spare_part":
                        $("#select_spart_part").hide();
                        $("#service_name").show();
                        $("#unit").prop( "disabled", false);
                        $("#unit_price").prop( "disabled", false);
                        $("#invoice_number").prop( "disabled", false);
                        $("#a_date").prop( "disabled", false);
                        $("#invoice_file").prop( "disabled", false);
                            
                        $("#service_name" ).val('');
                        $("#service_name").show();

                        $("#service_name").attr("required", "true");
                        $("#quantity").attr("required", "true");
                        $("#unit").attr("required", "true");
                        $("#unit_price").attr("required", "true");
                        $("#invoice_number").attr("required", "true");
                        $("#invoice_file").attr("required", "true");
                        $("#supplier_id").attr("required", "true");
                        $("#staff_id").attr("required", "true");
        
                        break;

                    case "service":
                        $("#select_spart_part").hide();
                        $("#service_name").show();
                        $("#unit").prop( "disabled", false);
                        $("#unit_price").prop( "disabled", false);
                        $("#a_date").prop( "disabled", false);
                        $("#invoice_number").prop( "disabled", false);
                        $("#invoice_file").prop( "disabled", false);

                        $("#service_name").val('');
                        $("#service_name").show();

                        $("#service_name").attr("required", "true");
                        $("#quantity").attr("required", "true");
                        $("#unit").attr("required", "true");
                        $("#unit_price").attr("required", "true");
                        $("#invoice_file").attr("required", "true");
                        $("#invoice_number").attr("required", "true");
                        $("#supplier_id").attr("required", "true");
                        $("#staff_id").attr("required", "true");
                        break;

                    case "inventory":
                        $("#select_spart_part").show();
                        $("#service_name").hide();
                        $("#unit").prop( "disabled", true );
                        $("#unit_price").prop( "disabled", true );
                        $("#invoice_number").prop( "disabled", true );
                        $("#a_date").prop( "disabled", true );
                        $("#invoice_file").prop( "disabled", true );

                        $("#quantity").removeAttr('required');
                        $("#service_name").removeAttr('required');
                        $("#equipment_id").removeAttr('required');
                        $("#unit").removeAttr('required');
                        $("#unit_price").removeAttr('required');
                        $("#invoice_file").removeAttr('required');
                        $("#invoice_number").removeAttr('required');
                        $("#supplier_id").attr("required", "true");
                        $("#staff_id").attr("required", "true");
                        break;

                    default:
                        break;
            }
        });

        $("#invoice_number").change(function () {

            var first_invoice_number = $("invoice_number").val();

            var first_invoice_date = $("#a_date").val();

            var invoice_number = $("#invoice_number").val();

            var invoice_date = $("#a_date"+i).val();

            if(first_invoice_date == invoice_date && first_invoice_number == invoice_number )
            {
                $("#invoice_file").prop( "disabled", true);

            } 
            
        });

        $("#category_select").change(function () {

            var data = $("#category_select option:selected").val() ?? 'remove';

            if(data == 'remove') 
            {
                $("#quantity").removeAttr('required');
                $("#service_name").removeAttr('required');
                $("#equipment_id").removeAttr('required');
                $("#unit").removeAttr('required');
                $("#unit_price").removeAttr('required');
                $("#invoice_number").removeAttr('required');
                $("#a_date").removeAttr('required');
                $("#supplier_id").removeAttr('required');
                $("#staff_id").removeAttr('required');
            }   
        });
    


</script>
