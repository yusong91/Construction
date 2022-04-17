<fieldset class="border p-2 " style="overflow-x: scroll;">

    <legend>Update Maintenance & Spare Part</legend>

    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col" class="text-center align-middle">Date</th>
                <th scope="col" class="text-center align-middle">Spare Part</th>
                <th scope="col" class="text-center align-middle">Equipment ID</th>
                <th scope="col" class="text-center align-middle">Service</th>
                <th scope="col" class="text-center align-middle">Quantity</th>
                <th scope="col" class="text-center align-middle">Unit Price</th>
                <th scope="col" class="text-center align-middle">Amount</th>
                <th scope="col" class="text-center align-middle">Suplier Name</th>
                <th scope="col" class="text-center align-middle">Responsible Person</th>
                <th scope="col" class="text-center align-middle">Note</th>
                <th scope="col" class="text-center align-middle">Image of Broken</th>
                <th scope="col" class="text-center align-middle">Image of Replacement</th>
            </tr>
        </thead>
        <tbody> 
            <?php for($i = 1; $i <= 1; $i++): ?>
                    <tr>
                        <td>
                            <div class="form-floating">
                                <input type="text" class="form-control" id="a_date<?php echo e($i); ?>" name="date" style="width: 100px;" value="<?php echo e(getDateFormat($edit->date)); ?>">
                            </div>
                        </td>
                        <td>
                            <select class="js-example-responsive form-control" name="type_id" style="width: 200px;">
                                
                                <?php $__currentLoopData = $spare_parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <optgroup label="<?php echo e($items->value); ?>">
                                        <?php $__currentLoopData = $items->children_inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $edit->inventory_id ? 'selected' : ''); ?>><?php echo e($item->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
                            
                        <td>
                            <select class="js-example-responsive form-control" name="equipment_id" style="width: 200px;">
                                
                                <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <optgroup label="<?php echo e($items->value); ?>">
                                        <?php $__currentLoopData = $items->children_equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($item->equip_type_id); ?> <?php echo e($item->id); ?>" <?php echo e($item->id == $edit->equipment_id ? 'selected' : ''); ?>><?php echo e($item->equipment_id); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </optgroup>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>

                        <td>
                            <div class="form-floating">
                                <input type="text" class="form-control" name="service" style="width: 200px;" value="<?php echo e($edit->service); ?>">
                            </div>
                        </td>
    
                        <td>
                            <div class="form-floating">
                                <input type="number" class="form-control" name="quantity" style="width: 80px;" value="<?php echo e($edit->quantity); ?>">
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <input type="number" class="form-control" name="unit_price" style="width: 120px;" value="<?php echo e($edit->unit_price); ?>">
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <input type="number" class="form-control" name="amount" style="width: 80px;" value="<?php echo e($edit->amount); ?>">
                            </div>
                        </td>

                        <td>
                            <select class="js-example-responsive form-control"  name="supplier_id" style="width: 200px;">
                                
                                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $edit->supplier_id ? 'selected' : ''); ?>><?php echo e($item->company_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
                        
                        <td>
                            <select class="js-example-responsive form-control"  name="staff_id" style="width: 200px;">
                                
                                <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($item->id); ?>" <?php echo e($item->id == $edit->staff_id ? 'selected' : ''); ?>><?php echo e($item->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </td>
    
                        <td>
                            <div class="form-floating" style="width: 350px;">
                                <textarea name="note" class="form-control" rows="1"><?php echo e($edit->note); ?></textarea> 
                            </div>   
                        </td>

                        <td>
                            <div class="form-floating">
                                <div class="custom-file" >
                                    <input type="file" class="custom-file-input" id="file_broken<?php echo e($i); ?>" name="image_broken" style="width: 350px;">
                                    <label class="custom-file-label" for="file_broken<?php echo e($i); ?>"></label>
                                </div>
                            </div>
                        </td>

                        <td>
                            <div class="form-floating">
                                <div class="custom-file" >
                                    <input type="file" class="custom-file-input" id="file_replacement<?php echo e($i); ?>" name="image_replace" style="width: 350px;">
                                    <label class="custom-file-label" for="file_replacement<?php echo e($i); ?>"></label>
                                </div>
                            </div>
                        </td>
                    <tr>
                <?php endfor; ?>
                        
        </tbody>
    </table>

</fieldset><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/maintenance-sparepart/partials/row-edit.blade.php ENDPATH**/ ?>