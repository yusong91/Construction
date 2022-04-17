<?php $__env->startSection('page-title', __('Movement')); ?>


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

.test {

    width: 50%;
  }

</style>

<div class="card">
    <div class="card-body">

        <?php echo $__env->make('partials.button_group_transaction', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        
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
                                                    <a href="<?php echo e(route('movement.index')); ?>" 
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
                            <a href="<?php echo e(route('movement.create')); ?>" class="btn btn-primary" style="width: 180px;" >+ Movement & Rent</a>
                        </div>
                    </div> 
                </div>      
            </div>

        </div>

        <div class="table-responsive" style="padding-top: 40px;">
             <table class="table table-borderless table-striped" style="width: 2000px;">
                <thead> 
                    <th class="text-center">No</th>
                    <th class="text-center" style="width: 100 px;">Equipment Type</th>
                    <th class="text-center" style="width: 100 px;">Equipment Id</th>
                    <th class="text-center" style="width: 100 px;">Company Name</th>
                    <th class="text-center" style="width: 200 px;">Customer Name</th>
                    <th class="text-center" style="width: 100 px;">Customer Telephone</th>
                    <th class="text-center" style="width: 200 px;">Date</th>
                    <th class="text-center" style="width: 200 px;">From Location</th>
                    <th class="text-center" style="width: 200 px;">To Location</th>
                    <th class="text-center" style="width: 200 px;">Expected Number of Working Days</th>
                    <th class="text-center" style="width: 100 px;">Action</th>
                    
                </thead>
                <tbody> 

                <?php if(count($movements)): ?>
                    <?php $__currentLoopData = $movements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center align-middle"><?php echo e($loop->index + 1); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->parent_type->value); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->parent_equipment->equipment_id); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->parent_customer->company_name); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->customer_name); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->customer_phone); ?></td>
                            <td class="text-center align-middle"><?php echo e(getDateFormat($item->date)); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->from_location); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->to_location); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->expected_date); ?></td>
                            <td class="text-center align-middle">
                            
                                <!-- <a href="" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-list"></i> </a> -->

                                <a href="<?php echo e(route('movement.edit', $item->id)); ?>" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i> </a>

                                <a href="<?php echo e(route('movement.destroy', $item->id)); ?>"
                                    class="btn btn-icon"
                                    data-action=""
                                    title="Delete" 
                                    data-toggle="tooltip"
                                    data-placement="top"
                                    data-method="DELETE"
                                    data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                                    data-confirm-text="<?php echo app('translator')->get('app.confirm_delete'); ?>"
                                    data-confirm-delete="<?php echo app('translator')->get('app.yes_proceed'); ?>">
                                                <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9"><em><?php echo app('translator')->get('app.no_records_found'); ?></em></td>
                    </tr>
                <?php endif; ?>
            
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


<?php echo $__env->make('layouts.main_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/movement-rent/index.blade.php ENDPATH**/ ?>