<nav class="navbar navbar-expand-lg navbar-light fixed-top pl-0 pr-0 py-0" >

   <div class="navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
            <img src="<?php echo e(url('assets/img/logo.png')); ?>" class="logo-lg" height="35" alt="<?php echo e(setting('app_name')); ?>">
            <img src="<?php echo e(url('assets/img/logo.png')); ?>" class="logo-sm" height="35" alt="<?php echo e(setting('app_name')); ?>">
        </a>
    </div>

    <div>
        <?php if(app('impersonate')->isImpersonating()): ?>
            <a href="<?php echo e(route('impersonate.leave')); ?>" class="navbar-toggler text-danger hidden-md">
                <i class="fas fa-user-secret"></i>
            </a>
        <?php endif; ?>
 
        <button class="navbar-toggler" type="button" id="sidebar-toggle">
            <i class="fas fa-align-right text-muted"></i>
        </button>

        <button class="navbar-toggler mr-3"
                type="button"
                data-toggle="collapse"
                data-target="#top-navigation"
                aria-controls="top-navigation"
                aria-expanded="false"
                aria-label="Toggle navigation">
            <i class="fas fa-bars text-muted"></i>
        </button>
    </div>
 
    <div class="nav-item collapse navbar-collapse" id="top-navigation"> 

        <!-- <div class="row ml-2">
            <div class="col-lg-12 d-flex align-items-left align-items-md-center flex-column flex-md-row py-3">
                <h4 class="page-header mb-0">
                    <?php echo $__env->yieldContent('page-heading'); ?>
                </h4>

                <ol class="breadcrumb mb-0 font-weight-light">
                    <li class="breadcrumb-item">
                        <a href="<?php echo e(url('/')); ?>" class="text-muted">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>

                    <?php echo $__env->yieldContent('breadcrumbs'); ?>
                </ol>
            </div>
        </div> -->

        <ul class="navbar-nav ml-auto pr-4 flex-row"> 
            <?php if(app('impersonate')->isImpersonating()): ?>
                <li class="nav-item d-flex align-items-center visible-lg">
                    <a href="<?php echo e(route('impersonate.leave')); ?>" class="btn text-danger">
                        <i class="fas fa-user-secret mr-2"></i>
                        <?php echo app('translator')->get('Stop Impersonating'); ?>
                    </a>
                </li>
            <?php endif; ?>

            <li class="nav-item d-flex align-items-center visible-lg">
                <a class="nav-link <?php echo e(Request::is('/') ? 'active' : ''); ?>"  href="<?php echo e(route('dashboard')); ?>"><h5 class="header mb-0">Dashboard</h5></a>
            </li>

            <li class="nav-item d-flex align-items-center visible-lg">
                <a class="nav-link <?php echo e(Request::is('equipment*', 'sparepart*', 'inventory*', 'supplier*', 'customer*') ? 'active' : ''); ?>"  href="<?php echo e(route('equipment.index')); ?>"><h5 class="header mb-0">List</h5></a>
            </li>

            <li class="nav-item d-flex align-items-center visible-lg">
                <a class="nav-link <?php echo e(Request::is('transaction*', 'equipmentsold*', 'movement*', 'revenue*', 'maintenance*') ? 'active' : ''); ?>"  href="<?php echo e(route('transaction.index')); ?>"><h5 class="header mb-0">Transactions</h5></a>
            </li>

            <li class="nav-item d-flex align-items-center visible-lg">
                <a class="nav-link <?php echo e(Request::is('report-standard*' , 'report-equipment*', 'report-movement*') ? 'active' : ''); ?>"  href="<?php echo e(route('report-standard.index')); ?>"><h5 class="header mb-0">Report</h5></a>
            </li>

            <li class="nav-item dropdown d-flex align-items-center visible-lg">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                    <span style="font-size:17px; font-weight:bold; font-weight: 540;">Setting<span>
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo e(route('common-codes.show', 7)); ?>">Brand</a>
                    <a class="dropdown-item" href="<?php echo e(route('common-codes.show', 10)); ?>">Equipment Type</a>
                    <a class="dropdown-item" href="<?php echo e(route('staff.index')); ?>">Staff</a>
            </li>

            <?php if (\Vanguard\Plugins\Vanguard::hasHook('navbar:items')) { 
                collect(\Vanguard\Plugins\Vanguard::getHookHandlers('navbar:items'))
                    ->each(function ($hook) {
                        echo resolve($hook)->handle();
                    });
            } ?>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"
                   href="#"
                   id="navbarDropdown"
                   role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true"
                   aria-expanded="false">

                    <?php

                        $icon = "profile.png";

                        if (auth()->user()->avatar) {

                            $icon = auth()->user()->avatar;
                        }
                    ?>

                    <img src="<?php echo e(url('assets/img/profile.png')); ?>"
                         width="50"
                         height="50"
                         class="rounded-circle img-thumbnail img-responsive">
                </a>
                <div class="dropdown-menu dropdown-menu-right position-absolute p-0" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item py-2" href="<?php echo e(route('profile')); ?>">
                        <i class="fas fa-user text-muted mr-2"></i>
                        <?php echo app('translator')->get('My Profile'); ?>
                    </a>

                    <?php if(config('session.driver') == 'database'): ?>
                        <a href="<?php echo e(route('profile.sessions')); ?>" class="dropdown-item py-2">
                            <i class="fas fa-list text-muted mr-2"></i>
                            <?php echo app('translator')->get('Active Sessions'); ?>
                        </a>
                    <?php endif; ?>

                    <?php if (\Vanguard\Plugins\Vanguard::hasHook('navbar:dropdown')) { 
                collect(\Vanguard\Plugins\Vanguard::getHookHandlers('navbar:dropdown'))
                    ->each(function ($hook) {
                        echo resolve($hook)->handle();
                    });
            } ?>

                    <div class="dropdown-divider m-0"></div>

                    <a class="dropdown-item py-2" href="<?php echo e(route('auth.logout')); ?>">
                        <i class="fas fa-sign-out-alt text-muted mr-2"></i>
                        <?php echo app('translator')->get('Logout'); ?>
                    </a>
                </div>
            </li>
        </ul>

    </div>
    </div>
</nav>
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/partials/navbar.blade.php ENDPATH**/ ?>