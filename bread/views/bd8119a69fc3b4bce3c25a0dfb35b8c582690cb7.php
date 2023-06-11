<meta charset="utf-8">

<title><?php echo e(App\Models\Setting::find(1)->business_name); ?> | <?php echo $__env->yieldContent('title'); ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

<link rel="shortcut icon" type="image/x-icon" href="<?php echo e(App\Models\Setting::find(1)->favicon); ?>">

<input type="hidden" name="base_url" value="<?php echo e(url('/')); ?>">

<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_admin/css/bootstrap.min.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_admin/css/fontawesome.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_admin/css/feathericon.min.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_admin/css/select2.min.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_admin/css/bootstrap-datetimepicker.min.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(url('assets/plugins/fancybox/jquery.fancybox.min.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_admin/css/jquery.timepicker.min.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_admin/css/datatables.min.css')); ?>" />

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_admin/css/summernote.min.css')); ?>">

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('assets_admin/css/flatpickr.min.css')); ?>">

<script type="text/javascript" src="<?php echo e(url('assets_admin/js/sweetalert2@10.js')); ?>"></script>

<?php echo $__env->yieldContent('css'); ?>

<link rel="stylesheet" href="<?php echo e(asset('assets_admin/css/style.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets_admin/css/components.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('assets_admin/css/admin_custom.css')); ?>">

<?php if(session('direction') == 'rtl'): ?>
    <link rel="stylesheet" href="<?php echo e(url('assets_admin/css/rtl_direction.css')); ?>" type="text/css">
<?php endif; ?>

<?php
    $color = App\Models\Setting::first()->color;
?>

<style>
    :root{
        --primary_color : <?php echo $color ?>;
        --primary_color_hover : <?php echo $color.'cc' ?>;
    }
</style>
<?php /**PATH C:\xampp\htdocs\bread\resources\views/layout/partials/head_admin.blade.php ENDPATH**/ ?>