<div class="table-responsive" style="padding-top: 40px;">
             <table class="table table-borderless table-striped">
                <thead> 
                    <th class="text-center verticel-center">No</th>
                    <th class="text-center verticel-center">Name</th>
                    <th class="text-center verticel-center">Date of Birth</th>
                    <th class="text-center verticel-center">Job</th>
                    <th class="text-center verticel-center">Phone</th>
                    <th class="text-center verticel-center">Address</th>
                    <th class="text-center verticel-center">Action</th>
                </thead>
                <tbody> 

                    <?php if(count($staffs)): ?>
                        <?php $__currentLoopData = $staffs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                           
                            <tr>
                                <td class="text-center verticel-center"><?php echo e($loop->index + 1); ?></td>
                                <td class="text-center verticel-center"><?php echo e($item->name); ?></td>
                                <td class="text-center verticel-center"><?php echo e(getDateFormat($item->dob)); ?></td>
                                <td class="text-center verticel-center"><?php echo e($item->job); ?></td>
                                <td class="text-center verticel-center"><?php echo e($item->phone); ?></td>
                                <td class="text-center verticel-center"><?php echo e($item->address); ?></td>
                                <td class="text-center verticel-center">
                                
                                    <a href="" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"><i class="fas fa-list"></i></a>

                                    <a href="<?php echo e(route('staff.edit', $item->id)); ?>" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i></a>

                                    <a href="<?php echo e(route('staff.destroy', $item->id)); ?>" class="btn btn-icon" data-action="" data-toggle="tooltip" data-placement="top" data-method="DELETE"
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
                            <td colspan="6"><em><?php echo app('translator')->get('app.no_records_found'); ?></em></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table> 
    </div>
       <?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/staff/partials/row.blade.php ENDPATH**/ ?>