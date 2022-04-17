<table class="table table-bordered mt-4">
    <thead> 
        <tr>
            <th scope="col" class="text-center align-middle">Item Name</th>
            <th scope="col" class="text-center align-middle">Menufacture</th>
            <th scope="col" class="text-center align-middle">Vender</th>
            <th scope="col" class="text-center align-middle">Quantity</th>
            <th scope="col" class="text-center align-middle">Unit</th>
            <th scope="col" class="text-center align-middle">Price</th>
            <th scope="col" class="text-center align-middle">Purchased Date</th>
            <th scope="col" class="text-center align-middle">Warehouse Location</th>
            <th scope="col" class="text-center align-middle">Notes</th>
            <th scope="col" class="text-center align-middle">Attached Image</th>
        </tr> 
    </thead> 
    <tbody> 
        <?php for($i = 1; $i <= 7; $i++): ?>
            <tr>
                <td>
                    <div class="form-floating" style="width: 200px;">
                        <input type="text"  class="form-control" name="<?php echo e($i); ?>name">
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
                        <input type="text" class="form-control" name="<?php echo e($i); ?>menufacture" style="width: 200px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>vender" style="width: 200px;">
                    </div>
                </td>
                        
                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="<?php echo e($i); ?>quantity" style="width: 100px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>unit" style="width: 100px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="<?php echo e($i); ?>price" style="width: 100px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>purchased_date" id="purchased_date<?php echo e($i); ?>" style="width: 130px;">
                    </div>   
                </td>
         
                <td>
                    <input type="text" class="form-control" name="<?php echo e($i); ?>warehouse_location" style="width: 250px;">
                </td>

                <td>
                    <textarea name="<?php echo e($i); ?>note" class="form-control" rows="1" style="width: 350px;"></textarea>   
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
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/inventory/partials/row.blade.php ENDPATH**/ ?>