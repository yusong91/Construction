<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col" class="text-center">Company Name</th>
            <th scope="col" class="text-center">Customer Name</th>
            <th scope="col" class="text-center">Customer Phone</th>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Job Title</th>
            <th scope="col" class="text-center">Address</th>
            <th scope="col" class="text-center">Other</th>
        </tr>
    </thead>
    <tbody>
            <?php for($i = 1; $i <= 8; $i++): ?>

                <tr>
                    <td>
                        <div class="form-floating" style="width: 200px;">
                            <input type="text" class="form-control" name="<?php echo e($i); ?>company_name">
                            <!-- <?php $__errorArgs = ['form_date'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class="error text-danger">សូមបញ្ចូល  <?php echo app('translator')->get('date'); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> -->
                        </div>    
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="<?php echo e($i); ?>customer_name" style="width: 200px;">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="<?php echo e($i); ?>customer_phone" style="width: 150px;">
                        </div>
                    </td>
                        
                    <td>
                        <div class="form-floating">
                            <input type="email" class="form-control" name="<?php echo e($i); ?>email" style="width: 200px;">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="<?php echo e($i); ?>job" style="width: 150px;">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="<?php echo e($i); ?>address" style="width: 200px;">
                        </div>
                    </td>

                    <td>
                        <textarea name="<?php echo e($i); ?>other" class="form-control" rows="1" style="width: 350px;"></textarea>   
                    </td>
                <tr>
            <?php endfor; ?>     
    </tbody>
</table>
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/customer/partials/row-input.blade.php ENDPATH**/ ?>