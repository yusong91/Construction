<?php $__env->startSection('page-title', __('Dashboard')); ?>
<?php $__env->startSection('page-heading', __('Dashboard')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->get('Dashboard'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

<div class="card">
    <div class="card-body">

        <?php echo $__env->make('partials.button_group', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="row">
            <div class="col-4">
                <form action="" method="GET" class="border-bottom-light"  accept-charset="UTF-8">
                    <div class="input-group custom-search-form">
                        <input  type="text" class="form-control input-solid" name="search" value="<?php echo e(Request::get('search')); ?>" placeholder="Search"/>

                            <span class="input-group-append">
                            <?php if(Request::has('search') && Request::get('search') != ''): ?>
                                <a href="<?php echo e(route('equipment.show', $id)); ?>" class="btn btn-light d-flex align-items-center" role="button">
                                    <i class="fas fa-times text-muted"></i>
                                </a>
                            <?php endif; ?>
                            <button class="btn btn-light" type="submit" id="search-activities-btn">
                                <i class="fas fa-search text-muted"></i>
                            </button>
                        </span>

                    </div>
                    <?php echo e(csrf_field()); ?>

                </form>
     
            </div>  

            
        </div>

        <?php echo $__env->make('equipment.partials.row-list', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/equipment/list.blade.php ENDPATH**/ ?>