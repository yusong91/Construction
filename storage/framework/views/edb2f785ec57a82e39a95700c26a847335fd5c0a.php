<div class="table-responsive" style="padding-top: 40px;">
    <table class="table table-borderless table-striped">
        <thead> 
            <th class="text-center align-middle">No</th>
            <th class="text-center align-middle">Company Name</th>
            <th class="text-center align-middle">Supplier/Sale Name</th>
            <th class="text-center align-middle">Phone</th>
            <th class="text-center align-middle">E-mail</th>
            <th class="text-center align-middle">Job Title</th>
            <th class="text-center align-middle">Address</th>
            <th class="text-center align-middle">Other</th>
            <th class="text-center align-middle">Action</th>
                    
        </thead> 
        <tbody> 

            <?php if(count($suppliers)): ?>

                <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td class="text-center align-middle"><?php echo e($loop->index + 1); ?></td>
                    <td class="text-center align-middle"><?php echo e($item->company_name); ?></td>
                    <td class="text-center align-middle"><?php echo e($item->supplier_name); ?></td>
                    <td class="text-center align-middle"><?php echo e($item->phone); ?></td>
                    <td class="text-center align-middle"><?php echo e($item->email); ?></td>
                    <td class="text-center align-middle"><?php echo e($item->job); ?></td>
                    <td class="text-center align-middle"><?php echo e($item->address); ?></td>
                    <td class="text-center align-middle"><?php echo e($item->other); ?></td>   
                    <td class="text-center align-middle">                
                       
                        <a href="<?php echo e(route('supplier.edit', $item->id)); ?>"
                                class="btn btn-icon edit"
                                title="Update"
                                data-toggle="tooltip" data-placement="top">
                                <i class="fas fa-edit"></i> 
                        </a>
                        <a href="<?php echo e(route('supplier.destroy', $item->id)); ?>"
                                class="btn btn-icon"
                                data-action=""
                                title="Delete" 
                                data-toggle="tooltip"
                                data-placement="top"
                                data-method="DELETE"
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
                    <td colspan="9"><em><?php echo app('translator')->get('app.no_records_found'); ?></em></td>
                </tr>
            <?php endif; ?>
                   
        </tbody>
    </table> 
</div><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/supplier/partials/row.blade.php ENDPATH**/ ?>