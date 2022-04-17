<div class="table-responsive" style="padding-top: 10px;">
    <table class="table table-bordered table-striped">
        <thead> 
            <th class="text-center align-middle">Equipment Type</th>
            <th class="text-center">Equipment ID</th>
            <th class="text-center">Brand</th>
            <th class="text-center">Available</th>
            <th class="text-center">Historical Cost</th>
            <th class="text-center">Purchased Date</th>            
        </thead>
        <tbody> 

        <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr >
                <td class="text-center align-middle"><?php echo e($item->parent_quipment->value); ?></td>
                <td class="text-center align-middle"><?php echo e($item->equipment_id); ?></td>
                <td class="text-center align-middle"><?php echo e($item->parent_brand->value); ?></td>
                <td class="text-center align-middle">---</td>

                <td class="text-center align-middle">$<?php echo e($item->historical_cost); ?></td>
                <td class="text-center align-middle"><?php echo e(getDateFormat($item->purchase_date)); ?></td>                
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
        </tbody>
    </table> 
</div><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/report/equipmentoutstand-report/partials/row.blade.php ENDPATH**/ ?>