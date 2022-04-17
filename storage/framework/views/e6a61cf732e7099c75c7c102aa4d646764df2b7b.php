<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col" class="text-center">Equipment ID</th>
            <th scope="col" class="text-center">Company Name</th>
            <th scope="col" class="text-center">Customer Name</th>
            <th scope="col" class="text-center">Customer Phone</th>
            <th scope="col" class="text-center">Date</th>
            <th scope="col" class="text-center">From Location</th>
            <th scope="col" class="text-center">To Location</th>
            <th scope="col" class="text-center">Expected Date</th>
        </tr>
    </thead>
    <tbody>

        <?php for($i = 1; $i <= 8; $i++): ?>

            <tr>
                <td>
                    <!-- <select class="form-control" name="<?php echo e($i); ?>equipment_id" style="width: 150px;">
                    <option value=""></option>
                        <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->equip_type_id); ?> <?php echo e($item->id); ?>"><?php echo e($item->equipment_id); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select> -->
                    <select class="form-control js-example-responsive"  name="<?php echo e($i); ?>equipment_id" data-live-search="true" style="width: 250px;">    
                        <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->equip_type_id); ?> <?php echo e($item->id); ?>"><?php echo e($item->equipment_id); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                    </select>
                </td>
                <td>
                    <!-- <select class="form-control" name="<?php echo e($i); ?>company_name" style="width: 200px;">
                        <option value=""></option>
                            <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->company_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </select> -->
                    <select class="form-control js-example-responsive"  name="<?php echo e($i); ?>company_name" data-live-search="true" style="width: 250px;">    
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->company_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                    </select>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>customer_name" style="width: 200px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="<?php echo e($i); ?>customer_phone" style="width: 130px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>date" id="purchased_date<?php echo e($i); ?>" style="width: 120px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>from_location" style="width: 200px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>to_location" style="width: 200px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>expected_date" style="width: 120px;">
                    </div>
                </td>  
            <tr>
        <?php endfor; ?>
                    
    </tbody>
</table>


<script>

    $('.js-example-responsive').select2({
        placeholder: '',
        allowClear: true
    }).val(null).trigger('change');

</script>
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/movement-rent/partials/row-input.blade.php ENDPATH**/ ?>