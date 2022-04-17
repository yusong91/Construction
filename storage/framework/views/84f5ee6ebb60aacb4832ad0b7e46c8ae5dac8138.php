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

    legend.scheduler-border {
        width:auto; /* Or auto */
        padding:0 10px; /* To give a bit of padding on the left and right */
        border-bottom:none;
    }

    tr td{
        padding: 0 !important;
        margin: 0 !important;
    }
    .form-control, .custom-file-label {
        border: 0;
    }
    

</style>

<div class="card">
    <div class="card-body">
        <?php echo $__env->make('partials.button_group', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <form action="<?php echo e(route('customer.store')); ?>" method="POST"  accept-charset="UTF-8" autocomplete="off">
            <?php echo $__env->make('customer.partials.input-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-primary mt-4">Create</button>
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/customer/create.blade.php ENDPATH**/ ?>