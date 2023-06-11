<link href="<?php echo e(url('assets/css/bootstrap.min.css')); ?>" rel="stylesheet">

<link rel="stylesheet" href="<?php echo e(url('assets/css/boxicons.min.css')); ?>">

<link rel="stylesheet" href="<?php echo e(url('assets/css/slick-theme.min.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(url('assets/css/slick.css')); ?>" />

<link rel="shortcut icon" type="image/x-icon" href="<?php echo e($setting->favicon); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_admin/css/datatables.min.css')); ?>" />

<link rel="stylesheet" href="<?php echo e(url('assets/plugins/fancybox/jquery.fancybox.min.css')); ?>">

<script type="text/javascript" src="<?php echo e(url('assets_admin/js/sweetalert2@10.js')); ?>"></script>

<link rel="stylesheet" href="<?php echo e(url('assets/css/style.css')); ?>">



<?php echo $__env->yieldContent('css'); ?>

<input type="hidden" name="rtl_direction" class="rtl_direction" value="<?php echo e(session('direction') == 'rtl' ? 'true' : 'false'); ?>">

<style>
    :root{
        --site_color : <?php echo $setting->website_color; ?>;
        --site_color_hover : <?php echo $setting->website_color.'e8'; ?>;
    }
</style>

<?php if(session('direction') == 'rtl'): ?>
    <link rel="stylesheet" href="<?php echo e(url('assets/css/rtl_direction.css')); ?>" type="text/css">
<?php endif; ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/layout/partials/head.blade.php ENDPATH**/ ?>