<?php $__env->startSection('page-title', __('Activity Log')); ?>
<?php $__env->startSection('page-heading', isset($user) ? $user->present()->nameOrEmail : __('Activity Log')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <?php if(isset($user) && isset($adminView)): ?>
        <li class="breadcrumb-item">
            <a href="<?php echo e(route('activity.index')); ?>"><?php echo app('translator')->get('Activity Log'); ?></a>
        </li>
        <li class="breadcrumb-item active">
            <?php echo e($user->present()->nameOrEmail); ?>

        </li>
    <?php else: ?>
        <li class="breadcrumb-item active">
            <?php echo app('translator')->get('Activity Log'); ?>
        </li>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="card">
    <div class="card-body">
        <form action="" method="GET" id="users-form" class="border-bottom-light mb-3">
            <div class="row justify-content-between mt-3 mb-4">
                <div class="col-lg-5 col-md-6">
                    <div class="input-group custom-search-form">
                        <input type="text"
                               class="form-control input-solid"
                               name="search"
                               value="<?php echo e(Request::get('search')); ?>"
                               placeholder="<?php echo app('translator')->get('Search for Action'); ?>">

                        <span class="input-group-append">
                            <?php if(Request::has('search') && Request::get('search') != ''): ?>
                                <a href="<?php echo e(isset($adminView) ? route('activity.index') : route('profile.activity')); ?>"
                                   class="btn btn-light d-flex align-items-center"
                                   role="button">
                                    <i class="fas fa-times text-muted"></i>
                                </a>
                            <?php endif; ?>
                            <button class="btn btn-light" type="submit" id="search-activities-btn">
                                <i class="fas fa-search text-muted"></i>
                            </button>
                        </span>
                    </div>
                </div>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-borderless table-striped">
                <thead>
                    <?php if(isset($adminView)): ?>
                        <th class="min-width-150"><?php echo app('translator')->get('User'); ?></th>
                    <?php endif; ?>
                    <th><?php echo app('translator')->get('IP Address'); ?></th>
                    <th class="min-width-200"><?php echo app('translator')->get('Message'); ?></th>
                    <th class="min-width-200"><?php echo app('translator')->get('Log Time'); ?></th>
                    <th class="text-center"><?php echo app('translator')->get('More Info'); ?></th>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <?php if(isset($adminView)): ?>
                                <td>
                                    <?php if(isset($user)): ?>
                                        <?php echo e($activity->user->present()->nameOrEmail); ?>

                                    <?php else: ?>
                                        <a href="<?php echo e(route('activity.user', $activity->user_id)); ?>"
                                           data-toggle="tooltip" title="<?php echo app('translator')->get('View Activity Log'); ?>">
                                            <?php echo e($activity->user->present()->nameOrEmail); ?>

                                        </a>
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                            <td><?php echo e($activity->ip_address); ?></td>
                            <td><?php echo e($activity->description); ?></td>
                            <td><?php echo e($activity->created_at->format(config('app.date_time_format'))); ?></td>
                            <td class="text-center">
                                <a tabindex="0" role="button" class="btn btn-icon"
                                   data-trigger="focus"
                                   data-placement="left"
                                   data-toggle="popover"
                                   title="<?php echo app('translator')->get('User Agent'); ?>"
                                   data-content="<?php echo e($activity->user_agent); ?>">
                                    <i class="fas fa-info-circle"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<nav aria-label="Page navigation example">
    <ul class="pagination"> 
        <?php $page = $paginate->current_page; ?>
        <?php $__currentLoopData = $paginate->links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php 
                $active = $item->label == $page ? 'active' : '';
            ?> 
            <li class="page-item <?php echo e($active); ?>"><a class="page-link" href="<?php echo e($item->url); ?>"><?php echo $item->label; ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
    </ul>
</nav>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/vendor/vanguardapp/activity-log/src/../resources/views/index.blade.php ENDPATH**/ ?>