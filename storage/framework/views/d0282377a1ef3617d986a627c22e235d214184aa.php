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
    .cell-1 {
    border-collapse: separate;
    background: #ffffff;
    }
    thead {
        background: #dddcdc
    }
    .table-elipse {
        cursor: pointer
    }
    .row-child {
        background-color: #EFF2F4;
        color: #0B0B0B
    }

    tr td{
        padding: 0 !important;
        margin: 0 !important;
    }

    .form-border {

        border-radius: 3px !important;
        border: 1px solid #D5D4D4;
        padding: 0 0 0 0;
        margin: 0 0;
        box-sizing: border-box;
    }

    .form-control, .custom-file-label {
        border: 0;
    }
    
    .form-control{border-radius:0px !important;}

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

            <?php echo $__env->make('partials.button_group', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

            <?php echo $__env->make('equipment.partials.input-form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
    </div>
</div> 

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script>
// Add the following code if you want the name of the file appear on select
$(".custom-file-input").on("change", function() {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/equipment/create.blade.php ENDPATH**/ ?>