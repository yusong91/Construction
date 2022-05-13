<div class="table-responsive" style="padding-top: 20px; padding-bottom: 10px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center align-middle">Type *</th>
                <th scope="col" class="text-center align-middle">Spare-Part/Service Name *</th>
                <th scope="col" class="text-center align-middle">Equipment ID *</th>
                <th scope="col" class="text-center align-middle">Quantity *</th>
                <th scope="col" class="text-center align-middle">Unit *</th>
                <th scope="col" class="text-center align-middle">Unit Price *</th>
                <th scope="col" class="text-center align-middle">Invoice Number *</th>
                <th scope="col" class="text-center align-middle">Invoice Date *</th>
                <th scope="col" class="text-center align-middle">Suplier Name *</th>
                <th scope="col" class="text-center align-middle">Responsible Person *</th>
                <th scope="col" class="text-center align-middle">Invoice Number/Other Attachment</th>
                <th scope="col" class="text-center align-middle">Note</th>
                <th scope="col" class="text-center align-middle">Image of Broken</th>
                <th scope="col" class="text-center align-middle">Image of Replacement</th>
            </tr>
        </thead>
        <tbody> 
            @for($i = 1; $i <= 8; $i++)
                    <tr>
                        <td> 
                            <select class="form-control js-example-responsive"  name="{{$i}}category_id" data-live-search="true" style="width: 200px;" id="{{$i}}category_select"> 
                                @foreach($types as $key => $value)
                                    <option value="{{ $key }}" select_type="{{ $key }}" >{{ $value }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <div id="{{$i}}service_name">
                                <input type="text" class="form-control form-borderless" name="{{$i}}service_name" id="service_name{{$i}}" style="width: 250px;">
                            </div>
                            <div id="{{$i}}select_spart_part">
                                <select class="form-control js-example-responsive"  name="{{$i}}type_id" id="{{$i}}type_id" data-live-search="true" style="width: 250px;"> 
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
                            <select class="form-control js-example-responsive"  name="{{$i}}equipment_id" id="{{$i}}equipment_id" data-live-search="true" style="width: 200px;">
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
                            <div class="form-floating">
                                <input type="number" class="form-control form-borderless" name="{{$i}}quantity" id="{{$i}}quantity" style="width: 100px;">
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <input type="text" class="form-control form-borderless" name="{{$i}}unit" id="{{$i}}unit" style="width: 80px;">
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <input type="number" class="form-control form-borderless" name="{{$i}}unit_price" id="{{$i}}unit_price" style="width: 120px;">
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <input type="number" class="form-control form-borderless" name="{{$i}}invoice_number" id="{{$i}}invoice_number" style="width: 170px;">
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <input type="text" class="form-control form-borderless" name="{{$i}}invoice_date" id="a_date{{$i}}" style="width: 130px;">
                            </div>
                        </td> 

                        <td>
                            <select class="form-control js-example-responsive"  name="{{$i}}supplier_id" id="{{$i}}supplier_id" data-live-search="true" style="width: 200px;"> 
                                @foreach($suppliers as $item)
                                    <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        
                        <td>
                            <select class="form-control js-example-responsive"  name="{{$i}}staff_id" id="{{$i}}staff_id" data-live-search="true" style="width: 200px;"> 
                                @foreach($staffs as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <div class="form-floating">
                                <div class="custom-file" >
                                    <input type="file" class="custom-file-input" id="{{$i}}invoice_file" name="{{$i}}invoice_file" style="width: 350px;">
                                    <label class="custom-file-label form-borderless" for="{{$i}}invoice_file"></label>
                                </div>
                            </div>
                        </td>
    
                        <td>
                            <div class="form-floating" style="width: 350px;">
                                <textarea name="{{$i}}note" class="form-control form-borderless" rows="1"></textarea> 
                            </div>   
                        </td>

                        <td>
                            <div class="form-floating">
                                <div class="custom-file" >
                                    <input type="file" class="custom-file-input" id="file_broken{{$i}}" name="{{$i}}image_broken" style="width: 350px;">
                                    <label class="custom-file-label form-borderless" for="file_broken{{$i}}"></label>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <div class="custom-file" >
                                    <input type="file" class="custom-file-input" id="file_replacement{{$i}}" name="{{$i}}image_replace" style="width: 350px;">
                                    <label class="custom-file-label form-borderless" for="file_replacement{{$i}}"></label>
                                </div>
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

        $("#" + index + "select_spart_part").hide();

        $("#" + index +"category_select").change(function () {

            var element = $('#' + index + 'category_select' + ' option:selected');

            var select_type = element.attr("select_type");

            $("#" + index + "equipment_id").attr("required", "true");

            switch (select_type) {

                case "new_spare_part":
                    $("#" + index + "select_spart_part").hide();
                    $("#" + index + "service_name").show();
                    $("#" + index + "unit").prop( "disabled", false);
                    $("#" + index + "unit_price").prop( "disabled", false);
                    $("#" + index + "invoice_number").prop( "disabled", false);
                    $("#a_date" + index).prop( "disabled", false);
                    $("#" + index + "invoice_file").prop( "disabled", false);

                    $("#service_name" + index).val('');
                    $("#service_name" + index).show();

                    $("#service_name" + index).attr("required", "true");
                    $("#" + index + "quantity").attr("required", "true");
                    $("#" + index + "unit").attr("required", "true");
                    $("#" + index + "unit_price").attr("required", "true");
                    $("#" + index + "invoice_number").attr("required", "true");
                    $("#a_date" + index).attr("required", "true");
                    $("#" + index + "supplier_id").attr("required", "true");
                    $("#" + index + "staff_id").attr("required", "true");

                    break;

                case "inventory":
                    $("#" + index + "select_spart_part").show();
                    $("#service_name" + index).hide();
                    $("#" + index + "unit").prop( "disabled", true );
                    $("#" + index + "unit_price").prop( "disabled", true );
                    $("#" + index + "invoice_number").prop( "disabled", true );
                    $("#a_date" + index).prop( "disabled", true );
                    $("#" + index + "invoice_file").prop( "disabled", true );

                    $("#" + index + "quantity").removeAttr('required');
                    $("#service_name" + i).removeAttr('required');
                    $("#" + index + "equipment_id").removeAttr('required');
                    $("#" + index + "unit").removeAttr('required');
                    $("#" + index + "unit_price").removeAttr('required');
                    $("#" + index + "invoice_number").removeAttr('required');
                    $("#a_date" + i).removeAttr('required');

                    $("#" + index + "supplier_id").attr("required", "true");
                    $("#" + index + "staff_id").attr("required", "true");

                    break;

                case "service":

                    console.log('service');

                    break;
            
                default:
                    break;
            }

        });

        for (let i=0; i<=8; i++){
       
            $("#" + i + "category_select").change(function () {

                var data = $("#" + i + 'category_select option:selected').val() ?? 'remove';

                if(data == 'remove') 
                {
                    $("#" + i + "quantity").removeAttr('required');
                    $("#service_name" + i).removeAttr('required');
                    $("#" + i + "equipment_id").removeAttr('required');
                    $("#" + i + "unit").removeAttr('required');
                    $("#" + i + "unit_price").removeAttr('required');
                    $("#" + i + "invoice_number").removeAttr('required');
                    $("#a_date" + i).removeAttr('required');
                    $("#" + i + "supplier_id").removeAttr('required');
                    $("#" + i + "staff_id").removeAttr('required');
                }
                
            });
        }


        





    }


</script>
