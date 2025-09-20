<?php if(Session::has('flashMessageSuccess')): ?>
    <div class="alert alert-success text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <?php echo e(Session::get('flashMessageSuccess')); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('flashMessageAlert')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <?php echo e(Session::get('flashMessageAlert')); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('flashMessageWarning')): ?>
    <div class="alert alert-warning  text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <i class="fa fa-info-circle mr-2"></i> <?php echo e(Session::get('flashMessageWarning')); ?>

    </div>
<?php endif; ?>

<?php if(Session::has('flashMessageDanger')): ?>
    <div class="alert alert-danger text-center" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>
        <?php echo e(Session::get('flashMessageDanger')); ?>

    </div>
<?php endif; ?>

<?php if($errors->any()): ?>
<div class="alert alert-danger text-center" role="alert">
    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div>* <?php echo e($error); ?></div>
   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php endif; ?>
<?php /**PATH C:\laragon\www\mydreamhome\resources\views/layouts/includes/flash.blade.php ENDPATH**/ ?>