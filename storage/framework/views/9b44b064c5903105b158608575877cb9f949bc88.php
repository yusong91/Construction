<?php $__env->startSection('page-title', "លេខកូដប្រព័ន្ធ"); ?>
<?php $__env->startSection('page-heading', isset($commonCode) ? __('កែប្រែ') : __('បង្កើត')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <?php if(isset($breadcrumbs)): ?>
        <?php $__currentLoopData = $breadcrumbs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bread): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($bread['isActive']): ?>
                <li class="breadcrumb-item active"><?php echo e($bread['label']); ?></li>
            <?php else: ?>
                <li class="breadcrumb-item"><a href="<?php echo e($bread['link']); ?>"><?php echo e($bread['label']); ?></a></li>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    <?php if(isset($commonCode)): ?>
        <li class="breadcrumb-item active"><?php echo e(__('កែប្រែ').$commonCode->value); ?></li>
    <?php else: ?>
        <li class="breadcrumb-item active"><?php echo e(__('បង្កើត')); ?></li>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if(isset($commonCode)): ?>
    <?php echo Form::model($commonCode, ['route' => ['common-codes.update', $commonCode->id], 'method' => 'PUT', 'id' => 'common-code-form']); ?>

<?php else: ?>
    <?php echo Form::open(['route' => 'common-codes.store', 'enctype'=>'multipart/form-data', 'id' => 'common-code-form']); ?>

<?php endif; ?>
    <?php echo csrf_field(); ?>
    <div class="card">
        <div class="card-body">
            <div class="row">

                <div class="col-md-3">
                    <h5 class="card-title">
                        <?php echo app('translator')->get('កូដ និងតម្លៃ'); ?>
                    </h5>
                    <p class="text-muted">
                        <?php echo app('translator')->get('សូមបញ្ចូលកូដ និងតម្លៃ'); ?>
                    </p>
                </div>
                
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="key"><?php echo app('translator')->get('កូដ'); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('key', $commonCode->key ?? null, ['class' => 'form-control input-solid', 'id' => 'key']); ?>

                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="value"><?php echo app('translator')->get('តម្លៃ'); ?> <span class="text-danger">*</span></label>
                                <?php echo Form::text('value', $commonCode->value ?? null, ['class' => 'form-control input-solid', 'id' => 'value']); ?>

                            </div>
                        </div>

                        <?php if(isset($commonCode)): ?>
                            <?php echo Form::hidden('parent_id', $commonCode->parent_id, ['class' => 'form-control input-solid', 'id' => 'parent_id']); ?>

                        <?php else: ?>
                            <?php echo Form::hidden('parent_id', isset($parentCommonCode) ? $parentCommonCode->id : 0, ['class' => 'form-control input-solid', 'id' => 'parent_id']); ?>

                        <?php endif; ?> 
                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="custom-file">
                                <label for="key"><?php echo app('translator')->get('កូដ'); ?></label>
                                <input type="file" class="custom-file-input" id="customFile" name="image" >
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">
        <?php echo e(__(isset($commonCode) ? 'កែប្រែ' : 'បង្កើត')); ?>

    </button>

<?php echo e(Form::close()); ?>


<script>
    $(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php if(isset($locationCode)): ?>
        <?php echo JsValidator::formRequest('Vanguard\Http\Requests\CommonCode\UpdateRequest', '#common-code-form'); ?>

    <?php else: ?>
        <?php echo JsValidator::formRequest('Vanguard\Http\Requests\CommonCode\CreateRequest', '#common-code-form'); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/common-code/add-edit.blade.php ENDPATH**/ ?>