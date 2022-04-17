<form action="<?php echo e(route('equipment.update', $edit->id)); ?>" method="post" enctype="multipart/form-data" accept-charset="UTF-8" autocomplete="off">
    <?php echo method_field('PUT'); ?>
    <fieldset class="border p-2 " style="overflow-x: scroll;">

        <legend>New Equipment</legend>

        <div class="col-4 mb-3 p-0">

            <div class="form-border">
            
                <select class="js-example-responsive form-control" required name="equip_type_id" data-live-search="true">
                    <?php $__currentLoopData = $equipmentTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $edit->equip_type_id ? 'selected' : ''); ?> ><?php echo e($item->value); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                </select>

            </div>

        </div>
                
        <?php echo $__env->make('equipment.partials.row-edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
                        
    </fieldset> 
    <?php echo e(csrf_field()); ?>

        <button type="submit" class="btn btn-primary mt-3 mb-2">Update</button>

</form>

    
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/equipment/partials/edit-form.blade.php ENDPATH**/ ?>