<div class="table-responsive" style="padding-top: 20px; padding-bottom: 10px;">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col" class="text-center align-middle">Type</th>
                <th scope="col" class="text-center align-middle">Spare Part/Service Name</th>
                <th scope="col" class="text-center align-middle">Equipment ID</th>
                <th scope="col" class="text-center align-middle">Quantity</th>
                <th scope="col" class="text-center align-middle">Unit</th>
                <th scope="col" class="text-center align-middle">Unit Price</th>
                <th scope="col" class="text-center align-middle">Invoice Number</th>
                <th scope="col" class="text-center align-middle">Invoice Date</th>
                <th scope="col" class="text-center align-middle">Suplier Name</th>
                <th scope="col" class="text-center align-middle">Responsible Person</th>
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
                                <input type="text" class="form-control form-borderless" name="{{$i}}service_name" style="width: 250px;">
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
                            <select class="form-control js-example-responsive"  name="{{$i}}equipment_id" data-live-search="true" style="width: 200px;">
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
                                <input type="number" class="form-control form-borderless" name="{{$i}}quantity" style="width: 80px;">
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
                                <input type="number" class="form-control form-borderless" name="{{$i}}invoice_number" id="{{$i}}invoice_number" style="width: 150px;">
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <input type="text" class="form-control form-borderless" name="{{$i}}invoice_date" style="width: 80px;">
                            </div>
                        </td>

                        <td>
                            <select class="form-control js-example-responsive"  name="{{$i}}supplier_id" data-live-search="true" style="width: 200px;"> 
                                @foreach($suppliers as $item)
                                    <option value="{{ $item->id }}">{{ $item->company_name }}</option>
                                @endforeach
                            </select>
                        </td>
                        
                        <td>
                            <select class="form-control js-example-responsive"  name="{{$i}}staff_id" data-live-search="true" style="width: 200px;"> 
                                @foreach($staffs as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
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
    }).val('new_spare_part').trigger('change');

    for (let index = 1; index <= 8; index++) {

        $("#" + index + "select_spart_part").hide();

        $("#" + index +"category_select").change(function () {

            var element = $('#' + index + 'category_select' + ' option:selected');

            var select_type = element.attr("select_type");

            console.log(select_type);

            switch (select_type) {

                case "new_spare_part":
                    $("#" + index + "select_spart_part").hide();
                    $("#" + index + "service_name").show();
                    $("#" + index + "unit").prop( "disabled", false);
                    $("#" + index + "unit_price").prop( "disabled", false);
                    $("#" + index + "invoice_number").prop( "disabled", false);
                    break;

                case "inventory":
                    $("#" + index + "select_spart_part").show();
                    $("#" + index + "service_name").hide();
                    $("#" + index + "unit").prop( "disabled", true );
                    $("#" + index + "unit_price").prop( "disabled", true );
                    $("#" + index + "invoice_number").prop( "disabled", true );
                    break;
            
                default:
                    break;
            }

            //$("#" + index + "service").val(select_type);         
        });
    }


</script>
