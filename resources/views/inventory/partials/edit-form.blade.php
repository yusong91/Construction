<fieldset class="border p-2" style="overflow-x: scroll;">

<legend>Update Inventory</legend>

    <div class="col-4 mb-3 p-0">

            <div class="form-border">
            
                <select class="js-example-responsive form-control" required name="spare_id" data-live-search="true">
                    @foreach($spare_parts as $item)
                        <option value="{{ $item->id }}">{{ $item->value }}</option>
                    @endforeach 
                </select>

            </div>

        </div>

    @include('inventory.partials.row-edit') 
        
</fieldset>

<script>

var sparep_id = <?php echo $edit->sparep_id; ?>

$('.js-example-responsive').select2({
    placeholder: '',
    allowClear: true
}).val(sparep_id).trigger('change');

</script>
