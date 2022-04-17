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

    tr td{
            padding: 0 !important;
            margin: 0 !important;
    }
    .form-control, .custom-file-label {
            border: 0;
    }

    .select2-container .select2-selection--single{
            height:40px !important;
            width: 100%;
        }
        
        .select2-container--default .select2-selection--single{
            border: 0 solid #C3CAD2 !important; 
            border-radius: 3 !important; 
            padding: 6px 6px;
            width: 100%;
        }  

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 30px;
            width: 100%;
            position: absolute;
            top: 6px !important;
            right: 1px;
            width: 20px
        } 
    
</style>

<div class="card">
    <div class="card-body">
        <?php echo $__env->make('partials.button_group_transaction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        <form action="<?php echo e(route('maintenance.store')); ?>" id="user-form" method="POST" accept-charset="UTF-8" autocomplete="off">
            <?php echo $__env->make('maintenance-sparepart.partials.input-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo e(csrf_field()); ?>

            <button type="submit" class="btn btn-primary mt-4">Create</button>
        </form>
    </div>
</div>

<script>

    for(var i = 1; i <= 8; i++)
    {
        $("#file_broken" + i).on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });

        $("#file_replacement" + i).on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    }
    
</script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/maintenance-sparepart/create.blade.php ENDPATH**/ ?>