<div class="table-responsive" style="padding-top: 40px;">
    <table class="table table-borderless table-striped" style="width: 1500px;">
        <thead> 
            <th class="text-center align-middle">No</th>
            <th class="text-center align-middle" style="width: 120px;">Equipment ID</th>
            <th class="text-center align-middle" style="width: 200px;">Customer</th>
            <th class="text-center align-middle" style="width: 100px;">From Date</th>
            <th class="text-center align-middle" style="width: 100px;">To Date</th>
            <th class="text-center align-middle" style="width: 200px;">Number of Working Days</th>
            <th class="text-center align-middle" style="width: 150px;">Rental Price</th>
            <th class="text-center align-middle" style="width: 100px;">Amount</th>
            <th class="text-center align-middle" style="width: 300px;">Notes</th>
            <th class="text-center align-middle">Action</th>            
        </thead>
        <tbody>  
            
        <?php if(count($revenues)): ?>
            <?php $__currentLoopData = $revenues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="text-center align-middle"><?php echo e(1 + $loop->index); ?></td>
                    <td class="text-center align-middle"><?php echo e($item->parent_equipment->equipment_id); ?></td>
                    <td class="text-center align-middle"><?php echo e($item->parent_customer->company_name); ?></td>
                    
                    <td class="text-center align-middle"><?php echo e(getDateFormat($item->from_date)); ?></td>
                    <td class="text-center align-middle"><?php echo e(getDateFormat($item->to_date)); ?></td>
                    <td class="text-center align-middle"><?php echo e($item->number_working_day); ?></td>
                    <td class="text-center align-middle">$<?php echo e($item->rent_price); ?></td>
                    <td class="text-center align-middle">$<?php echo e($item->amount); ?></td>
                    <td class="text-center align-middle"><?php echo e($item->note); ?></td>
                    <td class="text-center align-middle">
                            
                        <a href="<?php echo e(route('revenue.edit', $item->id)); ?>" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i> </a>

                        <a href="<?php echo e(route('revenue.destroy', $item->id)); ?>" class="btn btn-icon" data-action="" title="Delete"  data-toggle="tooltip" data-placement="top" data-method="DELETE" data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>" data-confirm-text="<?php echo app('translator')->get('app.confirm_delete'); ?>" data-confirm-delete="<?php echo app('translator')->get('app.yes_proceed'); ?>">
                            <i class="fas fa-trash"></i>
                        </a>
                    </td> 
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <tr>
                <td colspan="10"><em><?php echo app('translator')->get('app.no_records_found'); ?></em></td>
            </tr>
        <?php endif; ?>
               
        </tbody>
    </table> 
</div><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/revenue/partials/row.blade.php ENDPATH**/ ?>