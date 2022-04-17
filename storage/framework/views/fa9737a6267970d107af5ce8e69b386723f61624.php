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
        <form action="<?php echo e(route('staff.store')); ?>" id="user-form" method="POST" accept-charset="UTF-8">
            
            <fieldset class="border p-2 ">

                <legend>New Staff</legend>

                <div class="row">
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" required class="form-control" name="name" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="a_date" name="dob" placeholder="Date of Birth">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" required name="job" placeholder="Job">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="number" class="form-control" required name="phone" placeholder="Phone">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea name="address" class="form-control" rows="2" placeholder="Address"></textarea> 
                        </div>
                    </div>
                </div>

            </fieldset>
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-primary mt-4">Create</button>
            
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/staff/create.blade.php ENDPATH**/ ?>