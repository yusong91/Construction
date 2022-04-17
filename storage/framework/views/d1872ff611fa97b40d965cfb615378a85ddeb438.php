<fieldset class="border p-2" style="overflow-x: scroll;">

<legend>Update Inventory</legend>

    <div class="col-4 mb-3 p-0">

            <div class="form-border">
            
                <select class="js-example-responsive form-control" required name="spare_id" data-live-search="true">
                    <?php $__currentLoopData = $spare_parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </select>

            </div>

        </div>

    <?php echo $__env->make('inventory.partials.row-edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        
</fieldset>

<script>

var sparep_id = <?php echo $edit->sparep_id; ?>

$('.js-example-responsive').select2({
    placeholder: 'Equipment Type *',
    allowClear: true
}).val(sparep_id).trigger('change');

</script>
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/inventory/partials/edit-form.blade.php ENDPATH**/ ?>