<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col" class="text-center align-middle">Company</th>
            <th scope="col" class="text-center align-middle">Customer</th>
            <th scope="col" class="text-center align-middle">Equipment ID</th>
            <th scope="col" class="text-center align-middle">From Date</th>
            <th scope="col" class="text-center align-middle">To Date</th>
            <th scope="col" class="text-center align-middle">Number of Working Days</th>
            <th scope="col" class="text-center align-middle">Rental Price</th>
            <th scope="col" class="text-center align-middle">Amount</th>
            <th scope="col" class="text-center align-middle">Note</th>
            <th scope="col" class="text-center align-middle">Attached File</th>
        </tr>
    </thead>
    <tbody> 

        <?php for($i = 1; $i <= 8; $i++): ?>

            <tr>
                    
                <td>
                    <select class="form-control js-example-responsive"  name="<?php echo e($i); ?>customer_id" data-live-search="true" style="width: 250px;">    
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
                    <select class="form-control js-example-responsive"  name="<?php echo e($i); ?>equipment_id" data-live-search="true" style="width: 250px;">    
                        <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->equip_type_id); ?> <?php echo e($item->id); ?>"><?php echo e($item->equipment_id); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                    </select>
                </td>
 
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>from_date" id="a_date<?php echo e($i); ?>" style="width: 200px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>to_date" id="b_date<?php echo e($i); ?>" style="width: 130px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="<?php echo e($i); ?>work_day" style="width: 120px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>rental_price" style="width: 120px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="<?php echo e($i); ?>amount" style="width: 80px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating" style="width: 350px;">
                        <textarea name="<?php echo e($i); ?>note" class="form-control" rows="1"></textarea> 
                    </div>   
                </td>
                <td>
                    <div class="form-floating">
                        <div class="custom-file" >
                            <input type="file" class="custom-file-input" id="customFile" name="<?php echo e($i); ?>image" style="width: 350px;">
                            <label class="custom-file-label" for="customFile"></label>
                        </div>
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
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/revenue/partials/row-input.blade.php ENDPATH**/ ?>