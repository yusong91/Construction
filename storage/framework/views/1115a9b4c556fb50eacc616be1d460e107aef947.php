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
                                            <a href="<?php echo e(route('customer.index')); ?>" 
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
                        <div class="col-xl-1 col-md-1 pr-4">
                            <a href="" class="vertical-center" ><img src="<?php echo e(url('assets/img/pdf.png')); ?>" width="25"></a>
                        </div>
                        <div class="col-xl-1 col-md-1 pr-4">
                            <a href="" class="vertical-center"  ><img src="<?php echo e(url('assets/img/excel.png')); ?>" width="25" ></a>
                        </div>
                        <div class="col-xl-5 col-md-5">
                            <a href="<?php echo e(route('customer.create')); ?>" class="btn btn-primary" style="width: 156px;" >+ New Company</a>
                        </div>
                    </div>
                </div>              
            </div>
        </div>

        <div class="table-responsive" style="padding-top: 40px;">
             <table class="table table-borderless table-striped">
                <thead> 
                    <th class="text-center verticel-center">Company/Customer Name</th>
                    <th class="text-center verticel-center">Rental Service</th>
                    <th class="text-center verticel-center">Payment</th>
                    <th class="text-center verticel-center">Action</th>
                </thead>
                <tbody> 

                    <?php if(count($customers)): ?>
                        <?php $__currentLoopData = $customers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <tr>
                                
                                <th scope="row" colspan="3"><h5><?php echo e($items->company_name); ?></h5></th>
                                <th class="text-center verticel-center">
                                    <a href="<?php echo e(route('customer.edit', $items->id)); ?>" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i></a>
                                    <a href="<?php echo e(route('customer.destroy', $items->id)); ?>" class="btn btn-icon" data-action="" data-toggle="tooltip" data-placement="top" data-method="DELETE"
                                        data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                                        data-confirm-text="<?php echo app('translator')->get('app.confirm_delete'); ?>"
                                        data-confirm-delete="<?php echo app('translator')->get('app.yes_proceed'); ?>">
                                                    <i class="fas fa-trash"></i>
                                    </a>
                                </th>
                            </tr>

                            <?php $__currentLoopData = $items->child_revenue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <tr>
                                
                                <td class="text-center verticel-center"><?php echo e($item->customer_name); ?></td>
                                <td ><?php echo e($item->equipment[0]['parent_quipment']->value); ?> : <?php echo e($item->equipment[0]->equipment_id); ?></td>
                                <td class="text-center verticel-center">$<?php echo e($item->rent_price * $item->number_working_day); ?></td>
                                <td></td>
                            </tr>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4"><em><?php echo app('translator')->get('app.no_records_found'); ?></em></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table> 
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/customer/index.blade.php ENDPATH**/ ?>