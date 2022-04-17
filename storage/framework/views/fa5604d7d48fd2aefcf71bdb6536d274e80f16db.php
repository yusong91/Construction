<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center align-middle">Company</th>
            <th class="text-center align-middle">Customer</th>
            <th class="text-center align-middle">Equipment ID</th>
            <th class="text-center align-middle">From Date</th>
            <th class="text-center align-middle">To Date</th>
            <th class="text-center align-middle">Number of Working Days</th>
            <th class="text-center align-middle">Rental Price</th>
            <th class="text-center align-middle">Amount</th>
            <th class="text-center align-middle">Note</th>
            <th class="text-center align-middle">Attached File</th>
        </tr>
    </thead>
    <tbody> 

        <?php for($i = 1; $i <= 1; $i++): ?>

            <tr>
                    
                <td>
                    <select class="js-example-responsive form-control" name="customer_id" style="width: 200px;">
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $edit->customer_id ? 'selected' : ''); ?> ><?php echo e($item->company_name); ?></option> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="customer_name" style="width: 200px;" value="<?php echo e($edit->customer_name); ?>">
                    </div>
                </td>
                        
                <td>
                    <select class="js-example-responsive form-control" name="equipment_id" style="width: 200px;">
                        <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->equip_type_id); ?> <?php echo e($item->id); ?>" <?php echo e($item->id == $edit->equipment_id ? 'selected' : ''); ?>><?php echo e($item->equipment_id); ?></option> 
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                                
                    </select>
                </td>
 
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="from_date" id="a_date<?php echo e($i); ?>" style="width: 200px;" value="<?php echo e(getDateFormat($edit->from_date)); ?>">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="to_date" id="b_date<?php echo e($i); ?>" style="width: 130px;" value="<?php echo e(getDateFormat($edit->to_date)); ?>">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="work_day" style="width: 120px;" value="<?php echo e($edit->number_working_day); ?>">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="rental_price" style="width: 120px;" value="<?php echo e($edit->rent_price); ?>">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="amount" style="width: 80px;" value="<?php echo e($edit->amount); ?>">
                    </div>
                </td>
                <td>
                    <div class="form-floating" style="width: 350px;">
                        <textarea name="note" class="form-control" rows="1"><?php echo e($edit->note); ?></textarea> 
                    </div>   
                </td>
                <td>
                    <div class="form-floating">
                        <div class="custom-file" >
                            <input type="file" class="custom-file-input" id="customFile" name="image" style="width: 350px;">
                            <label class="custom-file-label" for="customFile"></label>
                        </div>
                    </div>
                </td>
                    
            <tr>
        <?php endfor; ?>            
    </tbody>
</table>
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/revenue/partials/row-edit.blade.php ENDPATH**/ ?>