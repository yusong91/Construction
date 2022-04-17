<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('page-title'); ?> - <?php echo e(setting('app_name')); ?></title>

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(url('assets/img/icons/logo-144x144.png')); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo e(url('assets/img/icons/logo-152x152.png')); ?>" />
    <link rel="icon" type="image/png" href="<?php echo e(url('assets/img/icons/logo-32x32.png')); ?>" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php echo e(url('assets/img/icons/logo-16x16.png')); ?>" sizes="16x16" />
    <meta name="application-name" content="<?php echo e(setting('app_name')); ?>"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?php echo e(url('assets/img/icons/logo-144x144.png')); ?>" />

    <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(url(mix('assets/css/vendor.css'))); ?>">
    <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(url(mix('assets/css/app.css'))); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>


    <?php echo $__env->yieldContent('styles'); ?>

    <?php if (\Vanguard\Plugins\Vanguard::hasHook('app:styles')) { 
                collect(\Vanguard\Plugins\Vanguard::getHookHandlers('app:styles'))
                    ->each(function ($hook) {
                        echo resolve($hook)->handle();
                    });
            } ?>
</head>
<body>
    <?php echo $__env->make('partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container-fluid">
        <div class="row">
            <?php echo $__env->make('partials.sidebar.main', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div class="content-page">
                <main role="main" class="px-4">
                    <?php echo $__env->yieldContent('content'); ?>
                </main>
            </div>
        </div>
    </div>

    
    <script src="<?php echo e(url(mix('assets/js/vendor.js'))); ?>"></script>
    <script src="<?php echo e(url('assets/js/as/app.js')); ?>"></script>


    <script>
        $('#a_date').datepicker({
            format: 'dd/mm/yyyy'
        });
    </script>

    <?php echo $__env->yieldContent('scripts'); ?>

    <?php if (\Vanguard\Plugins\Vanguard::hasHook('app:scripts')) { 
                collect(\Vanguard\Plugins\Vanguard::getHookHandlers('app:scripts'))
                    ->each(function ($hook) {
                        echo resolve($hook)->handle();
                    });
            } ?>
</body>
</html>
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/layouts/app.blade.php ENDPATH**/ ?>