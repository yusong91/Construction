<?php $__env->startSection('page-title', __('Dashboard')); ?>
<?php $__env->startSection('page-heading', __('Dashboard')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->get('Dashboard'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 


    <style>

.vertical-center {
  margin-right: 15px;
  position: absolute;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
  
</style>

<div class="card">
    <div class="card-body">
        <?php echo $__env->make('partials.button_group', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <fieldset class="border p-2">
            <legend>New Spare Part</legend>
            <div class="row ">
                <div class="col-12">
                    <form action="<?php echo e(isset($edit) ? route('sparepart.update', $edit->id) : route('sparepart.store')); ?>" id="user-form" method="POST" accept-charset="UTF-8">
                        <?php if(isset($edit)): ?>
                            <?php echo method_field('PUT'); ?>
                        <?php endif; ?> 
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" required class="form-control" value="<?php echo e($edit->value ?? ''); ?>"  name="value" id="value" placeholder="Spare Part">
                            </div>
                            <div class="form-group col-md-4">
                                <button type="submit" class="btn btn-primary"><?php echo e(isset($edit) ? 'Update' : 'Create'); ?> </button>
                            </div>
                        </div>
                    <?php echo e(csrf_field()); ?>

                    </form>
                </div> 
            </div>
        </fieldset>  

        <div class="table-responsive" style="padding-top: 40px;">
             <table class="table table-borderless table-striped">
                <thead> 
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle">Spare Part</th>
                    <th class="text-center align-middle">Action</th>
                    
                </thead>
                <tbody>    
                    
                    <?php if($spareparts): ?>

                        <?php $__currentLoopData = $spareparts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center align-middle"><?php echo e($loop->index + 1); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->value); ?></td>
                            
                            <td class="text-center align-middle">
                                <a href="<?php echo e(route('sparepart.edit', $item->id)); ?>"
                                        class="btn btn-icon edit"
                                        title="Update"
                                        data-toggle="tooltip" data-placement="top">
                                            <i class="fas fa-edit"></i> 
                                </a>

                                <a href="<?php echo e(route('sparepart.destroy', $item->id)); ?>"
                                    class="btn btn-icon"
                                    data-action=""
                                    title="Delete Project" 
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
                            <td colspan="7"><em><?php echo app('translator')->get('app.no_records_found'); ?></em></td>
                        </tr>
                    <?php endif; ?>

                </tbody>
            </table> 
        </div>

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    
    <!-- <?php echo JsValidator::formRequest('Vanguard\Http\Requests\SparePartRequest', '#user-form'); ?> -->
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/spare-part/index.blade.php ENDPATH**/ ?>