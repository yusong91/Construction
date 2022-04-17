<fieldset class="border p-2 " style="overflow-x: scroll;">

    <legend>Update Movement & Rent</legend>

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

            <?php for($i = 1; $i <= 1; $i++): ?>

                <tr>
                    <td>
                        <select class="js-example-responsive form-control" name="equipment_id" style="width: 150px;">
                        <option value=""></option>
                            <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->equip_type_id); ?> <?php echo e($item->id); ?>" <?php echo e($item->id == $edit->equipment_id ? 'selected' : ''); ?>><?php echo e($item->equipment_id); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    <td>
                        <select class="js-example-responsive form-control" name="customer_id" style="width: 200px;">
                            <option value=""></option>
                                <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $edit->customer_id ? 'selected' : ''); ?>><?php echo e($item->company_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </select>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="customer_name" style="width: 200px;" value="<?php echo e($edit->customer_name); ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="customer_phone" style="width: 130px;" value="<?php echo e($edit->customer_phone); ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="date" id="purchased_date<?php echo e($i); ?>" style="width: 120px;" value="<?php echo e(getDateFormat($edit->date)); ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="from_location" style="width: 200px;" value="<?php echo e($edit->from_location); ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="to_location" style="width: 200px;" value="<?php echo e($edit->to_location); ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="expected_date" style="width: 120px;" value="<?php echo e($edit->expected_date); ?>">
                        </div>
                    </td>  
                <tr>
            <?php endfor; ?>
                        
        </tbody>
    </table>

</fieldset><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/movement-rent/partials/row-edit.blade.php ENDPATH**/ ?>