<div class="table-responsive" style="padding-top: 40px;">
             <table class="table table-borderless table-striped">
                <thead> 
                    <th class="text-center verticel-center">No</th>
                    <th class="text-center verticel-center">Equipment Type</th>
                    <th class="text-center verticel-center">Equipment Id</th>
                    <th class="text-center verticel-center">Description</th>
                    <th class="text-center verticel-center">Date</th>
                    <th class="text-center verticel-center">Price</th>
                    <th class="text-center verticel-center">Sale To</th>
                    <th class="text-center verticel-center">Action</th>
                </thead>
                <tbody> 

                    <?php if(count($equipmentsolds)): ?>
                        <?php $__currentLoopData = $equipmentsolds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="text-center verticel-center"><?php echo e($loop->index + 1); ?></td>
                                <td class="text-center verticel-center"><?php echo e($items->parent_type->value); ?></td>
                                <td class="text-center verticel-center"><?php echo e($items->parent_equipment->equipment_id); ?></td>
                                <td class="text-center verticel-center"><?php echo e($items->sale_description); ?></td>
                                <td class="text-center verticel-center"><?php echo e(getDateFormat($items->sale_date)); ?></td>
                                <td class="text-center verticel-center">$<?php echo e($items->sale_price); ?></td>
                                <td class="text-center verticel-center"><?php echo e($items->sale_to); ?></td>
                                    
                                <td class="text-center verticel-center">
                                    
                                    <!-- <a href="" class="btn btn-icon edit" title="View" data-toggle="tooltip" data-placement="top"> <i class="fas fa-list"></i> </a> -->

                                    <a href="<?php echo e(route('equipmentsold.edit', $items->id)); ?>" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i> </a>

                                    <a href="<?php echo e(route('equipmentsold.destroy', $items->id)); ?>" class="btn btn-icon" data-action="" title="Delete" data-toggle="tooltip" data-placement="top" data-method="DELETE"
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
                            <td colspan="8"><em><?php echo app('translator')->get('app.no_records_found'); ?></em></td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table> 
        </div><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/equipment-sold/partials/row.blade.php ENDPATH**/ ?>