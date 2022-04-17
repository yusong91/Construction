<div class="table-responsive" style="padding-top: 40px;">
             <table class="table table-borderless table-striped" style="width: 2000px;">
                <thead> 
                    <th class="text-center align-middle" style="width: 100px;">Date</th>
                    <th class="text-center align-middle" style="width: 200px;">Equipment ID</th>
                    <th class="text-center align-middle" style="width: 200px;">Spare Part</th>
                    <th class="text-center align-middle" style="width: 200px;">Service</th>
                    <th class="text-center align-middle" style="width: 100px;">Quantity</th>
                    <th class="text-center align-middle" style="width: 150px;">Unit Price</th>
                    <th class="text-center align-middle" style="width: 100px;">Amount</th>
                    <th class="text-center align-middle" style="width: 200px;">Supplier Name</th>
                    <th class="text-center align-middle" style="width: 200px;">Responsible Person</th>
                    <th class="text-center align-middle" style="width: 400px;">Memo</th>
                    <th class="text-center align-middle">Image of Broken</th>
                    <th class="text-center align-middle">Image of Replacement</th> 
                    <th class="text-center align-middle">Action</th>  
                </thead>
                <tbody> 

                <?php if(count($maintenances)): ?>

                    <?php $__currentLoopData = $maintenances; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <tr>
                            <td class="text-center align-middle"><?php echo e(getDateFormat($item->date)); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->parent_equipment->equipment_id); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->parent_inventory->name); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->service); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->quantity); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->unit_price); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->amount); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->parent_supplier->company_name); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->parent_staff->name); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->note); ?></td>
                            <td class="text-center align-middle"><img src="<?php echo e(url('assets/img/old.jpg')); ?>" width="100"></td>
                            <td class="text-center align-middle"><img src="<?php echo e(url('assets/img/new.jpg')); ?>" width="100"></td>
                                
                            <td class="align-middle">
                                
                                <a href="<?php echo e(route('maintenance.edit', $item->id)); ?>" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i> </a>

                                <a href="<?php echo e(route('maintenance.destroy', $item->id)); ?>" class="btn btn-icon" data-action="" title="Delete" data-toggle="tooltip" data-placement="top" data-method="DELETE"
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
                        <td colspan="13"><em><?php echo app('translator')->get('app.no_records_found'); ?></em></td>
                    </tr>
                <?php endif; ?>
                    
                </tbody>
            </table> 
        </div><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/maintenance-sparepart/partials/row.blade.php ENDPATH**/ ?>