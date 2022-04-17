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
        <div class="row ">
            <div class="col-4">     
                <form action="" method="GET" class="border-bottom-light"  accept-charset="UTF-8">
                    <div class="input-group custom-search-form">
                        <input  type="text"
                                class="form-control input-solid"
                                name="search"
                                value="<?php echo e(Request::get('search')); ?>"
                                placeholder="Search"/>
                                    <span class="input-group-append">
                                        <?php if(Request::has('search') && Request::get('search') != ''): ?>
                                            <a href="<?php echo e(route('supplier.index')); ?>" 
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
                    <?php echo e(csrf_field()); ?>

                </form>
            </div> 

            <div class="col-8">
                <div class="float-right">
                    <div class="row">
                        <div class="col-xl-5 col-md-5">
                            <a href="<?php echo e(route('supplier.create')); ?>" class="btn btn-primary" style="width: 147px;" >+ New Item</a>
                        </div>
                    </div>
                </div>      
            </div>
        </div>
        <?php echo $__env->make('supplier.partials.row', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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




<?php echo $__env->make('layouts.main_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/supplier/index.blade.php ENDPATH**/ ?>