<div class="table-responsive" style="margin-top: 40px;" >
    <table class="table table-borderless table-striped" style="width: 2000px;">
        <thead>
            <tr>
                <th class="text-center align-middle">No</th>
                <th class="text-center align-middle" style="width: 200px;">Equipment Type</th>
                <th class="text-center align-middle" style="width: 300px;">Equipment Id</th>
                <th class="text-center align-middle" style="width: 200px;">Purchased Date</th>
                <th class="text-center align-middle" style="width: 200px;">Brand</th>

                <th class="text-center align-middle" style="width: 80px;">Year</th>
                <th class="text-center align-middle" style="width: 300px;">Chassis No</th>
                <th class="text-center align-middle" style="width: 300px;">Engine No</th>
                <th class="text-center align-middle" style="width: 300px;">Receipt No</th>
                <th class="text-center align-middle" style="width: 80px;">Weight</th>
                <th class="text-center align-middle" style="width: 300px;">Vender</th>
                <th class="text-center align-middle" style="width: 80px;">Image</th>
                <th class="text-center align-middle" style="width: 550px;">Note</th>
                <th class="text-center align-middle">Action</th>
            </tr>
        </thead> 
        <tbody> 
            
            <?php if(count($equipments)): ?>       
                <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td class="text-center align-middle"><?php echo e(1 + $loop->index); ?></td>
                        <td class="text-center align-middle"><?php echo e($item->parent_quipment->value); ?></td>                 
                        <td class="text-center align-middle"><?php echo e($item->equipment_id); ?></td>
                        <td class="text-center align-middle"><?php echo e(getDateFormat($item->purchase_date)); ?></td>
                        <td class="text-center align-middle"><?php echo e($item->parent_brand->value); ?></td>
                        <td class="text-center align-middle"><?php echo e($item->year); ?></td>
                        <td class="text-center align-middle"><?php echo e($item->chassis_no); ?></td>
                        <td class="text-center align-middle"><?php echo e($item->engine_no); ?></td>
                        <td class="text-center align-middle"><?php echo e($item->receipt_no); ?></td>
                        <td class="text-center align-middle"><?php echo e($item->weight); ?></td>
                        <td class="text-center align-middle"><?php echo e($item->vender); ?></td>
                        <td class="text-center align-middle">image</td>
                        <td class="text-center align-middle"><?php echo e($item->note); ?></td>
                        <td class="text-center align-middle">
                            <a href="<?php echo e(route('equipment.edit', $item->id)); ?>" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i> </a>

                            <a href="<?php echo e(route('equipment.destroy', $item->id)); ?>" class="btn btn-icon" data-action="" title="Delete" data-toggle="tooltip" data-placement="top" data-method="DELETE"
                                data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                                data-confirm-text="<?php echo app('translator')->get('app.confirm_delete'); ?>"
                                data-confirm-delete="<?php echo app('translator')->get('app.yes_proceed'); ?>">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
                <tr>
                    <td colspan="5"><em><?php echo app('translator')->get('app.no_records_found'); ?></em></td>
                </tr>
            <?php endif; ?>
                                           
        </tbody>
    </table>
</div> <?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/equipment/partials/row-list.blade.php ENDPATH**/ ?>