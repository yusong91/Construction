<?php $__env->startSection('page-title', "លេខកូដប្រព័ន្ធ"); ?>
<?php $__env->startSection('page-heading', " លេខកូដប្រព័ន្ធ"); ?>

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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="card">
        <div class="card-body">

            <div class="header border-bottom-light">
                <div class="row mb-3 flex-md-row flex-column-reverse">
                    <div class="col-md-6">
                        <?php if(isset($breadcrumbs)): ?>
                        <h3 class="card-title">
                            <?php echo e($breadcrumbs[count($breadcrumbs) - 1]['label']); ?>

                        </h3>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 text-right">
                        <?php if(auth()->user()->hasPermission('common-codes.create')): ?>
                            <?php if(isset($parentCommonCode)): ?>
                            <a href="<?php echo e(route('common-codes.create')); ?>?parent_id=<?php echo e($parentCommonCode->id); ?>" class="btn btn-primary">
                                <i class="fas fa-plus mr-2"></i>
                                <?php echo app('translator')->get('បន្ថែម'); ?>
                            </a>
                            <?php else: ?>
                            <a href="<?php echo e(route('common-codes.create')); ?>" class="btn btn-primary">
                                <i class="fas fa-plus mr-2"></i>
                                <?php echo app('translator')->get('បន្ថែម'); ?>
                            </a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <div class="table-responsive" id="users-table-wrapper">
                <table class="table table-borderless table-striped">
                    <thead>
                    <tr>
                        <th></th>
                        <th>#</th>
                        <th class="min-width-150">Key</th>
                        <th class="min-width-150">Value</th>
                        <th class="min-width-80"># Children</th>
                        <th class="text-center min-width-150"><?php echo app('translator')->get('Action'); ?></th>
                    </tr>
                    </thead>
                    <tbody class="sortable" data-url="<?php echo e(route('common-codes.update-order')); ?>">
                    <?php if($commonCodes->count()): ?>
                        <?php $__currentLoopData = $commonCodes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr id="item_<?php echo e($item->id); ?>">
                                <td><span><i class="fa fa-arrows-alt-v handler" style="cursor:pointer"></i></span></td>
                                <td class="align-middle no"><?php echo e(($commonCodes->perPage() * ($commonCodes->currentPage() - 1)) + $index + 1); ?></td>
                                <td class="align-middle min-width-150"><?php echo e($item->key); ?></td>
                                <td class="align-middle min-width-150"><?php echo e($item->value); ?></td>
                                <td class="align-middle min-width-80">
                                    <a href="<?php echo e(route('common-codes.show', $item)); ?>"><?php echo e($item->children_count); ?> តម្លៃ</a>
                                </td>
                                <td class="text-center">
                                    <?php if(auth()->user()->hasPermission('common-codes.edit')): ?>
                                    <a href="<?php echo e(route('common-codes.edit', $item)); ?>" class="btn btn-icon border-primary"
                                        title="<?php echo app('translator')->get('កែប្រែ'); ?>" data-toggle="tooltip" data-placement="top">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php endif; ?>

                                    <?php if(auth()->user()->hasPermission('common-codes.destroy')): ?>
                                    <a href="<?php echo e(route('common-codes.destroy', $item)); ?>" class="btn btn-icon border-danger"
                                        title="<?php echo app('translator')->get('លុប'); ?>"
                                        data-icon="warning"
                                        data-toggle="tooltip"
                                        data-placement="top"
                                        data-method="DELETE"
                                        data-confirm-title="<?php echo app('translator')->get('តើអ្នកប្រាកដក្នុងការលុបទិន្នន័យនេះមែនទេ?'); ?>"
                                        data-confirm-text="<?php echo app('translator')->get('អនុទិន្នន័យទាំងអស់នឹងត្រូវលុបចោលពីប្រព័ន្ធដោយស្វ័យប្រវត្តិ'); ?>"
                                        data-confirm-delete="<?php echo app('translator')->get('លុប'); ?>"
                                        data-button-cancel-text="<?php echo app('translator')->get('បោះបង់'); ?>">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6"><em><?php echo app('translator')->get('No records found.'); ?></em></td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php echo $commonCodes->appends(\Request::except('page'))->render(); ?>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo HTML::script('assets/js/as/sortable.js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/common-code/index.blade.php ENDPATH**/ ?>