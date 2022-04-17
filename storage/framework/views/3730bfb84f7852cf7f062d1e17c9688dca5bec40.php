<table class="table table-bordered">
    <thead>
        <tr>
            <!-- <th scope="col" class="text-center">Equipment Type</th> -->
            <th scope="col" class="text-center">Equipment ID</th>
            <th scope="col" class="text-center">Sale Description</th>
            <th scope="col" class="text-center">Sale Date</th>
            <th scope="col" class="text-center">Sale Price</th>
            <th scope="col" class="text-center">Sale To</th>
            <th scope="col" class="text-center">Note</th>
        </tr>
    </thead>
    <tbody>
        <?php for($i = 1; $i <= 8; $i++): ?>
            <tr>
                <!-- <td> 
                    <select class="form-control" required name="equipment_type" style="width: 150px;">
                        <option value=""></option>                                                 
                        </select>
                </td> -->
                <td>
                    <select class="form-control js-example-responsive"  name="<?php echo e($i); ?>equipment_id" data-live-search="true" style="width: 250px;">    
                        <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->equip_type_id); ?> <?php echo e($item->id); ?>"><?php echo e($item->equipment_id); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                    </select>
                </td>    
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>sale_description" style="width: 200px;">
                    </div>
                </td>
                <td>
                   <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>sale_date" id="purchased_date<?php echo e($i); ?>" style="width: 130px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="<?php echo e($i); ?>sale_price" style="width: 130px;">
                    </div>
                </td>
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>sale_to" style="width: 200px;">
                    </div>
                </td>
                <td>
                    <textarea name="<?php echo e($i); ?>note" class="form-control" rows="1" style="width: 350px;"></textarea>   
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
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/equipment-sold/partials/row-input.blade.php ENDPATH**/ ?>