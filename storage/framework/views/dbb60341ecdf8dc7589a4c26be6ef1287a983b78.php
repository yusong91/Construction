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
    <?php for($i = 1; $i <= 1; $i++): ?>
            <tr>
                <td>
                    <div class="form-floating" style="width: 200px;">
                        <input type="text"  class="form-control" name="name" value="<?php echo e($edit->name); ?>">
                    </div>    
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="menufacture" style="width: 200px;" value="<?php echo e($edit->menufacture); ?>">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="vender" style="width: 200px;" value="<?php echo e($edit->vender); ?>">
                    </div>
                </td>
                        
                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="quantity" style="width: 100px;" value="<?php echo e($edit->quantity); ?>">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="unit" style="width: 100px;" value="<?php echo e($edit->unit); ?>">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="price" style="width: 100px;" value="<?php echo e($edit->price); ?>">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="purchased_date" id="purchased_date<?php echo e($i); ?>" style="width: 130px;" value="<?php echo e(getDateFormat($edit->menufacture)); ?>">
                    </div>   
                </td>
         
                <td>
                    <input type="text" class="form-control" name="warehouse_location" style="width: 250px;" value="<?php echo e($edit->warehouse_location); ?>">
                </td>

                <td>
                    <textarea name="note" class="form-control" rows="1" style="width: 350px;"><?php echo e($edit->note); ?></textarea>   
                </td>

                <td>
                    <div class="form-floating">
                        <div class="custom-file" >
                            <input type="file" class="custom-file-input" id="customFile" name="image" style="width: 350px;">
                            <label class="custom-file-label" for="customFile"><?php echo e($edit->image); ?></label>
                        </div>
                    </div>
                </td>
            <tr>
     <?php endfor; ?>               
    </tbody>
</table>
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/inventory/partials/row-edit.blade.php ENDPATH**/ ?>