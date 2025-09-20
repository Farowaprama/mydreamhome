<!DOCTYPE html>
<html lang="<?php echo e(app()->getLocale()); ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="<?php echo asset('assets/images/favicon.png'); ?>" sizes="16x16">
    <link rel="icon" type="image/png" href="<?php echo asset('assets/images/favicon.png'); ?>" sizes="32x32">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    
    <title>Dream Home</title>
    
    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
    <style>
        .dnone{
                display: none;
            }
    </style>
</head>

<body>
    <div id="app">
    <?php echo $__env->yieldContent('content'); ?>
    </div>

    <!-- Scripts -->
    <script src="anew_assets/js/jquery.min.js"></script>
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
    <?php echo $__env->yieldContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\laragon\www\mydreamhome\resources\views/layouts/app.blade.php ENDPATH**/ ?>