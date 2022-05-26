<fieldset class="border p-2">
    <legend>Update Inventory</legend> 
    <div class="col-4 mb-3 p-0">
            <div class="form-border">
                <select class="js-example-responsive form-control" required name="category_id" id="category_id" data-live-search="true">
                    @foreach($categorys as $item)
                        <option value="{{ $item->id }}" sub_category="{{ $item->description }}">{{ $item->value }}</option>
                    @endforeach 
                </select>
            </div>
        </div>
    @include('inventory.partials.row-edit') 
</fieldset>

<script>
 
    var category_id = <?php echo $edit->category_id; ?>

    $('.js-example-responsive').select2({
        placeholder: 'Select Category',
        allowClear: true
    }).val(category_id).trigger('change');
    
</script>
