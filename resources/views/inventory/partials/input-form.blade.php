<fieldset class="border p-2" >
    <legend>New Inventory</legend>
    <div class="col-4 mb-3 p-0">
        <div class="form-border">
            <select class="form-control js-example-responsive" required name="category_id" id="category_id" data-live-search="true">
                @foreach($categorys as $item)
                    <option value="{{ $item->id }}" sub_category="{{ $item->description }}">{{ $item->value }}</option>
                @endforeach 
            </select>
        </div> 
    </div>
    @include('inventory.partials.row') 
</fieldset>
 
<script> 

    $('.select-subcategory').select2({
        placeholder: '', 
        allowClear: true
    }).val(null).trigger('change');

    $('.js-example-responsive').select2({
        placeholder: 'Select Category', 
        allowClear: true
    }).val(null).trigger('change');

    $('.select-warehouse').select2({
        placeholder: '', 
        allowClear: true
    }).val(null).trigger('change');

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });

    $("#category_id").change(function () {

        var element = $('#category_id' + ' option:selected');
        var sub_category = element.attr("sub_category") ?? '';
        var sub_categorys = sub_category == '' ? [] : sub_category.split(',');

        if(sub_categorys.length > 1){

            for (let i = 0; i <= 7 ; i++) {

                
                
                for (let index = 0; index < sub_categorys.length; index++) {
                    
                    $("#" + i + "name").append($('<option>', { value: sub_categorys[index], text: sub_categorys[index] }));
                }
                $("#" + i + "name").val(null);

            }

        } else {

            for (let i = 0; i <= 7 ; i++) {
          
                $("#" + i + "name").find('option').remove().end();
            }
        }
    });

    for (let i = 0; i <= 7; i++) {
       
        $("#" + i + "name").change(function () {

            var data = $("#" + i + 'name option:selected').val() ?? 'remove';
            if(data == 'remove')
            {
                $("#"+ i + "menufacture").removeAttr('required');

            } else {
                $("#"+ i + "menufacture").attr("required", "true");
            }
        });
    }

   


    // $('#1name').blur(function()
    // {
    //     if( !$(this).val() ) {
    //         $(this).parents('p').addClass('warning');
    //         console.log('song');
    //     }
    // });

</script>
