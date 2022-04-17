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
        <form action="<?php echo e(route('staff.update', $edit->id)); ?>" id="user-form" method="POST" accept-charset="UTF-8">
            <?php echo method_field('PUT'); ?>
            <fieldset class="border p-2 ">

                <legend>New Staff</legend>

                <div class="row">
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" required class="form-control" name="name" placeholder="Name" value="<?php echo e($edit->name); ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="a_date" name="dob" placeholder="Date of Birth" value="<?php echo e(getDateFormat($edit->dob)); ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="text" class="form-control" required name="job" placeholder="Job" value="<?php echo e($edit->job); ?>">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-floating">
                            <input type="number" class="form-control" required name="phone" placeholder="Phone" value="<?php echo e($edit->phone); ?>">
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12">
                        <div class="form-floating">
                            <textarea name="address" class="form-control" rows="2" placeholder="Address"><?php echo e($edit->address); ?></textarea> 
                        </div>
                    </div>
                </div>

            </fieldset>
            <?php echo e(csrf_field()); ?>

            <button type="submit" class="btn btn-primary mt-4">Update</button>
            
        </form>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/staff/edit.blade.php ENDPATH**/ ?>