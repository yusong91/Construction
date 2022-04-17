<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo $__env->yieldContent('page-title'); ?> <?php echo e(setting('app_name')); ?></title>

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(url('assets/img/icons/logo-144.png')); ?>" />
    <link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo e(url('assets/img/icons/logo-152.png')); ?>" />
    <link rel="icon" type="image/png" href="<?php echo e(url('assets/img/icons/logo-32.png')); ?>" sizes="32x32" />
    <link rel="icon" type="image/png" href="<?php echo e(url('assets/img/icons/logo-16.png')); ?>" sizes="16x16" />
    <meta name="application-name" content="<?php echo e(setting('app_name')); ?>"/>
    <meta name="msapplication-TileColor" content="#FFFFFF" />
    <meta name="msapplication-TileImage" content="<?php echo e(url('assets/img/icons/logo-144.png')); ?>" />

    <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(url(mix('assets/css/vendor.css'))); ?>">
    <link media="all" type="text/css" rel="stylesheet" href="<?php echo e(url(mix('assets/css/app.css'))); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script> -->
    
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



<style>

        thead {
            background: #dddcdc
        }
</style>

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
        
        <main role="main">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
            
    </div>

    <script src="<?php echo e(url(mix('assets/js/vendor.js'))); ?>"></script>
    <script src="<?php echo e(url('assets/js/as/app.js')); ?>"></script>
    
    <script>

        for(var i = 1; i <= 8; i++)
        {
            $('#purchased_date'+i).datepicker({
                format: 'dd/mm/yyyy'
            });
        }

        for(var i = 1; i <= 8; i++)
        {
            $('#a_date'+i).datepicker({
                format: 'dd/mm/yyyy'
            });
        }

        for(var i = 1; i <= 8; i++)
        {
            $('#b_date'+i).datepicker({
                format: 'dd/mm/yyyy'
            });
        }

        $('#a_date').datepicker({
            format: 'dd/mm/yyyy'
        });

        $('#b_date').datepicker({
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
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/layouts/main_app.blade.php ENDPATH**/ ?>