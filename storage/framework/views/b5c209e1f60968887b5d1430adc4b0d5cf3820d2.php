<?php $__env->startSection('page-title', __('Dashboard')); ?>
<?php $__env->startSection('page-heading', __('Dashboard')); ?>

<?php $__env->startSection('breadcrumbs'); ?>
    <li class="breadcrumb-item active">
        <?php echo app('translator')->get('Dashboard'); ?>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('partials.messages', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 

<div class="card">
    <div class="card-body">

        <?php echo $__env->make('partials.button_group', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 
        <div class="row">
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
                                                    <a href="<?php echo e(route('equipment.index')); ?>" 
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
                            <a href="<?php echo e(route('equipment.create')); ?>" class="btn btn-primary" style="width: 147px;" >New Equipment</a>
                        </div>

                    </div>
                </div>                  
            </div>
        </div>

        <div class="table-responsive" style="margin-top: 40px;">
            <table class="table table-borderless table-striped">
                <thead>
                <tr>
                    <th class="text-center align-middle">Equipment Type</th>
                    <th class="text-center align-middle">Equipment Id</th>
                    <th class="text-center align-middle">Total Quantity</th>
                    <th class="text-center align-middle">Sold Out</th>
                    <th class="text-center align-middle">Unit</th>
                    <th class="text-center align-middle">Image</th>
                    <th class="text-center align-middle">Action</th>
                </tr>
                </thead>
                <tbody>  
                    <?php if(count($equipments)): ?>
                        <?php $__currentLoopData = $equipments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
 
                            <tr> 
                                <td class="text-center align-middle"><?php echo e($item['value']); ?></td>
                                <td class="text-center align-middle"><?php echo e(str_replace( array('\'', '"',';', '[', ']'), ' ', $item['child_qeuipment']->pluck('equipment_id'))); ?></td>
                                <td class="text-center align-middle"><?php echo e($item['child_qeuipment']->count()); ?></td>
                                <td class="text-center align-middle"><?php echo e($item['soldout']); ?></td>
                                <td class="text-center align-middle">គ្រឿង</td>
                                <td class="text-center align-middle"><img src="<?php echo e(url('/storage/song.jpg')); ?>" width="100"></td>
                                <td class="text-center align-middle">

                                    <a href="<?php echo e(route('equipment.show', $item['id'])); ?>"
                                        class="btn btn-icon edit"
                                        title="List Eqipment"
                                        data-toggle="tooltip" data-placement="top">
                                            <i class="fas fa-list"></i> 
                                    </a>
                                </td>
                            </tr>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="7"><em><?php echo app('translator')->get('No records found.'); ?></em></td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div> 

    </div>
</div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <?php echo HTML::script('assets/js/as/btn.js'); ?>

    <?php echo HTML::script('assets/js/as/login.js'); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.main_app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/equipment/index.blade.php ENDPATH**/ ?>