<div class="section-header">
    <h1><?php echo e($title); ?></h1>
    <div class="section-header-breadcrumb">
        <?php if(auth()->user()->hasRole('super admin')): ?>
            <div class="breadcrumb-item active"><a href="<?php echo e(url('/home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
        <?php endif; ?>
        <?php if(auth()->user()->hasRole('pharmacy')): ?>
            <div class="breadcrumb-item active"><a href="<?php echo e(url('/home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
        <?php endif; ?>
        <?php if(auth()->user()->hasRole('doctor')): ?>
            <div class="breadcrumb-item active"><a href="<?php echo e(url('/doctor_home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
        <?php endif; ?>
        <?php if(auth()->user()->hasRole('laboratory')): ?>
            <div class="breadcrumb-item active"><a href="<?php echo e(url('/pathologist_home')); ?>"><?php echo e(__('Dashboard')); ?></a></div>
        <?php endif; ?>
        <?php if(isset($url) && isset($urlTitle)): ?>
            <div class="breadcrumb-item active"><a href="<?php echo e($url); ?>"><?php echo e($urlTitle); ?></a></div>
        <?php endif; ?>
        <?php if(isset($url1) && isset($urlTitle1)): ?>
            <div class="breadcrumb-item active"><a href="<?php echo e($url1); ?>"><?php echo e($urlTitle1); ?></a></div>
        <?php endif; ?>
        <div class="breadcrumb-item"><?php echo e($title); ?></div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\bread\resources\views/layout/breadcrumb.blade.php ENDPATH**/ ?>