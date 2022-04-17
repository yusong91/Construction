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
                                                    <a href="<?php echo e(route('inventory.index')); ?>" 
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
                        <div class="col-xl-1 col-md-5 pr-4">
                            <a href="" class="vertical-center"  ><img src="<?php echo e(url('assets/img/excel.png')); ?>" width="25" ></a>
                        </div>
                        <div class="col-xl-5 col-md-5">
                            <a href="<?php echo e(route('inventory.create')); ?>" class="btn btn-primary" style="width: 147px;" >+ New Item</a>
                        </div>
                    </div>  
                </div>           
            </div>
        </div>

        <div class="table-responsive" style="padding-top: 40px;">
             <table class="table table-borderless table-striped" style="width: 2000px;">
                <thead> 
                    <th class="text-center align-middle">No</th>
                    <th class="text-center align-middle" style="width: 200px;">Item Name</th>
                    <th class="text-center align-middle" style="width: 300px;">Warehouse Location</th>
                    <th class="text-center align-middle" style="width: 80px;">Quantity</th>
                    <th class="text-center align-middle" style="width: 100px;">In Stock</th>
                    <th class="text-center align-middle" style="width: 100px;">Price</th>
                    <th class="text-center align-middle" style="width: 100px;">Unit</th>
                    <th class="text-center align-middle" style="width: 100px;">Used</th>
                    <th class="text-center align-middle" style="width: 200px;">Vender</th>
                    <th class="text-center align-middle" style="width: 200px;">Menufacture</th>
                    <th class="text-center align-middle" style="width: 150px;">Purchased Date</th>
                    <th class="text-center align-middle" style="width: 80px;">Image</th>
                    <th class="text-center align-middle" style="width: 400px;">Note</th>
                    <th class="text-center align-middle">Action</th>
                    
                </thead>
                <tbody> 
                    
                <?php if($inventory_groups): ?>
                    <?php $__currentLoopData = $inventory_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $items): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <th></th>
                        <th scope="row" colspan="13"><h5> <?php echo e($items[0]->parent_sparepart['value']); ?></h5></th>
                    </tr>
                        <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td class="text-center align-middle"><?php echo e($loop->index + 1); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->name); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->warehouse_location); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->quantity); ?></td>
                            <td class="text-center align-middle"><?php echo e($item->quantity - $item->used); ?></td>
                            <td class="text-center align-middle">$<?php echo e($item->price); ?></td> 
                            <td class="text-center align-middle"><?php echo e($item->unit); ?></td>   
                            <td class="text-center align-middle"><?php echo e($item->used); ?></td>   
                            <td class="text-center align-middle"><?php echo e($item->vender); ?></td>   
                            <td class="text-center align-middle"><?php echo e($item->menufacture); ?></td> 
                            <td class="text-center align-middle"><?php echo e(getDateFormat($item->purchased_date)); ?></td>
                            <td class="text-center align-middle"><img src="<?php echo e(url('/storage/song.jpg')); ?>" class="rounded mx-auto d-block" alt="" style="width: 100px;"></td>
                            <td class="text-center align-middle"><?php echo e($item->note); ?></td>
                            <td class="text-center align-middle">
                                
                                <a href="<?php echo e(route('inventory.edit', $item->id)); ?>" class="btn btn-icon edit" title="Update" data-toggle="tooltip" data-placement="top"> <i class="fas fa-edit"></i></a>

                                <a href="<?php echo e(route('inventory.destroy', $item->id)); ?>" class="btn btn-icon" data-action="" title="Delete" data-toggle="tooltip" data-placement="top" data-method="DELETE"
                                    data-confirm-title="<?php echo app('translator')->get('app.please_confirm'); ?>"
                                    data-confirm-text="<?php echo app('translator')->get('app.confirm_delete'); ?>"
                                    data-confirm-delete="<?php echo app('translator')->get('app.yes_proceed'); ?>">
                                                <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?> 
                    <tr>
                        <td colspan="13"><em><?php echo app('translator')->get('app.no_records_found'); ?></em></td>
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


<?php echo $__env->make('layouts.main_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/inventory/index.blade.php ENDPATH**/ ?>