<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col" class="text-center">Equipment ID *</th>
            <th scope="col" class="text-center">Brand *</th>
            <th scope="col" class="text-center">Historical Cost *</th>
            <th scope="col" class="text-center">Purchased Date</th>
            <th scope="col" class="text-center">Vendor Name</th>
            <th scope="col" class="text-center">Chassis No.</th>
            <th scope="col" class="text-center">Engine No *</th>
            <th scope="col" class="text-center">Weight</th>
            <th scope="col" class="text-center">Years</th>
            <th scope="col" class="text-center">Tax Receipt No.</th>
            <th scope="col" class="text-center">Notes</th>
            <th scope="col" class="text-center">Attached Image</th>
        </tr> 
    </thead>
    <tbody>

        <?php for($i = 1; $i <= 8; $i++): ?>

            <tr>
                <td>
                    <div class="form-floating" style="width: 150px;">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>equipment_id" >
                    </div>    
                </td>

                <td>
                    <select class="form-control js-example-basic-single"  name="<?php echo e($i); ?>brand_id" data-live-search="true" style="width: 250px;">
                        
                            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($item->id); ?>"><?php echo e($item->value); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>     
                    </select>
                </td>
 
                <td>
                    <div class="form-floating">
                        <input type="number" class="form-control" name="<?php echo e($i); ?>historical_cost" style="width: 150px;">
                    </div>
                </td>
                        
                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>purchased_date" id="purchased_date<?php echo e($i); ?>" style="width: 150px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>vendor" style="width: 200px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>chassis_no" style="width: 150px;">
                    </div>
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>engine_no" style="width: 150px;">
                    </div>   
                </td>
         
                <td>
                    <input type="number" class="form-control" name="<?php echo e($i); ?>weight" style="width: 80px;">
                </td>

                <td>
                    <input type="number" class="form-control" name="<?php echo e($i); ?>year" style="width: 80px;">   
                </td>

                <td>
                    <div class="form-floating">
                        <input type="text" class="form-control" name="<?php echo e($i); ?>receipt_no" style="width: 150px;">
                    </div> 
                </td>

                <td>
                    <div class="form-floating">
                        <textarea name="<?php echo e($i); ?>note" class="form-control" rows="1" style="width: 350px;"></textarea> 
                    </div>   
                </td>
                   
                <td>
                    <div class="form-floating">
                        <div class="custom-file" >
                            <input type="file" class="custom-file-input" id="<?php echo e($i); ?>customFile" name="<?php echo e($i); ?>image" style="width: 350px;">
                            <label class="custom-file-label" for="<?php echo e($i); ?>customFile"></label>
                        </div>
                    </div>
                </td>
            <tr>
        <?php endfor; ?>
                    
    </tbody>
</table>

 
<script>
    
    $('.js-example-responsive').select2({
        placeholder: 'Equipment Type *',
        allowClear: true
    }).val(null).trigger('change');
    
   
    $(".js-example-basic-single").each(function() {

        }).select2({
            placeholder: '',
            allowClear: true
        
    }).val(null).trigger('change');
  
</script>
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/equipment/partials/row.blade.php ENDPATH**/ ?>