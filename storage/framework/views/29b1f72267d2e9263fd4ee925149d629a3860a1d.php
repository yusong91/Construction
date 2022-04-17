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
        <?php for($i = 1; $i <= 8; $i++): ?>
                <tr>
                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="a_date<?php echo e($i); ?>" name="<?php echo e($i); ?>date" style="width: 120px;">
                        </div>
                    </td>
                    <td>
                        <select class="form-control js-example-responsive"  name="<?php echo e($i); ?>type_id" data-live-search="true" style="width: 200px;"> 
                            <?php $__currentLoopData = $spare_parts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <optgroup label="<?php echo e($items->value); ?>">
                                    <?php $__currentLoopData = $items->children_inventory; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </optgroup>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                        
                    <td>
                        <select class="form-control js-example-responsive"  name="<?php echo e($i); ?>equipment_id" data-live-search="true" style="width: 200px;">
                            <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <optgroup label="<?php echo e($items->value); ?>">
                                    <?php $__currentLoopData = $items->children_equipment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($item->equip_type_id); ?> <?php echo e($item->id); ?>"><?php echo e($item->equipment_id); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </optgroup>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="text" class="form-control" name="<?php echo e($i); ?>service" style="width: 200px;">
                        </div>
                    </td>
 
                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="<?php echo e($i); ?>quantity" style="width: 80px;">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="<?php echo e($i); ?>unit_price" style="width: 120px;">
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <input type="number" class="form-control" name="<?php echo e($i); ?>amount" style="width: 80px;">
                        </div>
                    </td>

                    <td>
                        <select class="form-control js-example-responsive"  name="<?php echo e($i); ?>supplier_id" data-live-search="true" style="width: 200px;"> 
                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->company_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
                    
                    <td>
                        <select class="form-control js-example-responsive"  name="<?php echo e($i); ?>staff_id" data-live-search="true" style="width: 200px;"> 
                            <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </td>
 
                    <td>
                        <div class="form-floating" style="width: 350px;">
                            <textarea name="<?php echo e($i); ?>note" class="form-control" rows="1"></textarea> 
                        </div>   
                    </td>

                    <td>
                        <div class="form-floating">
                            <div class="custom-file" >
                                <input type="file" class="custom-file-input" id="file_broken<?php echo e($i); ?>" name="<?php echo e($i); ?>image_broken" style="width: 350px;">
                                <label class="custom-file-label" for="file_broken<?php echo e($i); ?>"></label>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="form-floating">
                            <div class="custom-file" >
                                <input type="file" class="custom-file-input" id="file_replacement<?php echo e($i); ?>" name="<?php echo e($i); ?>image_replace" style="width: 350px;">
                                <label class="custom-file-label" for="file_replacement<?php echo e($i); ?>"></label>
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
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/maintenance-sparepart/partials/row-input.blade.php ENDPATH**/ ?>