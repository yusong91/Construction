<table class="table table-bordered">
    <thead>
        <tr> 
            <th scope="col" class="text-center">Company Name</th>
            <th scope="col" class="text-center">Supplier/Sale Name</th>
            <th scope="col" class="text-center">Phone</th>
            <th scope="col" class="text-center">E-mail</th>
            <th scope="col" class="text-center">Job Title</th>
            <th scope="col" class="text-center">Address</th>
            <th scope="col" class="text-center">Other</th>
        </tr>
    </thead>
    <tbody>
        
            <?php for($i = 1; $i <= 1; $i++): ?>
                <tr>
                    <td>
                        <div class="form-floating" style="width: 200px;">
                            <input type="text" required class="form-control" name="company_name" value="<?php echo e($edit->company_name); ?>">
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
                            <input type="text" required class="form-control" name="supplier_name" style="width: 200px;" value="<?php echo e($edit->supplier_name); ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="number" required class="form-control" name="phone" style="width: 150px;" value="<?php echo e($edit->phone); ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="email" class="form-control" name="email" style="width: 200px;" value="<?php echo e($edit->email); ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="job" style="width: 150px;" value="<?php echo e($edit->job); ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="address" style="width: 200px;" value="<?php echo e($edit->address); ?>">
                        </div>
                    </td>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="other" style="width: 300px;" value="<?php echo e($edit->other); ?>">
                        </div>   
                    </td>          
                <tr>
            <?php endfor; ?>         
    </tbody>
</table>
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/supplier/partials/row-edit.blade.php ENDPATH**/ ?>