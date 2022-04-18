<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

    <title><?php echo $__env->yieldContent('page-title'); ?> - <?php echo e(setting('app_name')); ?></title>

    <?php echo HTML::style('assets/css/app.css'); ?>

    <?php echo HTML::style('assets/css/fontawesome-all.min.css'); ?>


    <?php echo $__env->yieldContent('header-scripts'); ?>

    <?php if (\Vanguard\Plugins\Vanguard::hasHook('auth:styles')) { 
                collect(\Vanguard\Plugins\Vanguard::getHookHandlers('auth:styles'))
                    ->each(function ($hook) {
                        echo resolve($hook)->handle();
                    });
            } ?>
</head>
<body class="auth">

    <div class="container">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo HTML::script('assets/js/vendor.js'); ?>

    <?php echo HTML::script('assets/js/as/app.js'); ?>

    <?php echo HTML::script('assets/js/as/btn.js'); ?>

    <?php echo $__env->yieldContent('scripts'); ?>
    <?php if (\Vanguard\Plugins\Vanguard::hasHook('auth:scripts')) { 
                collect(\Vanguard\Plugins\Vanguard::getHookHandlers('auth:scripts'))
                    ->each(function ($hook) {
                        echo resolve($hook)->handle();
                    });
            } ?>
</body>
</html>
<?php /**PATH /Users/yusonghoun/Web Software/construction/resources/views/layouts/auth.blade.php ENDPATH**/ ?>