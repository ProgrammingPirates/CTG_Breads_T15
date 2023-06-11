<!-- jQuery -->
<script src="<?php echo e(url('assets_admin/js/jquery.min.js')); ?>"></script>

<!-- Bootstrap Core JS -->
<script src="<?php echo e(url('assets_admin/js/popper.min.js')); ?>"></script>
<script src="<?php echo e(url('assets_admin/js/bootstrap.min.js')); ?>"></script>


<?php if(Route::is(['pagee'])): ?>
    <script src="<?php echo e(url('assets_admin/plugins/raphael/raphael.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets_admin/plugins/morris/morris.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets_admin/js/chart.morris.js')); ?>"></script>
<?php endif; ?>

<!-- Select2 JS -->
	<script src="<?php echo e(url('assets_admin/js/select2.min.js')); ?>"></script>

<!-- Datetimepicker JS -->
	<script src="<?php echo e(url('assets_admin/js/moment.min.js')); ?>"></script>
	<script src="<?php echo e(url('assets_admin/js/bootstrap-datetimepicker.min.js')); ?>"></script>

<!-- Datetimepicker JS -->
    <script  src="<?php echo e(url('assets_admin/js/jquery.nicescroll.min.js')); ?>"></script>

<!-- Datatables JS -->
    <script type="text/javascript" src="<?php echo e(url('assets_admin/js/datatables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('assets_admin/js/pdfmake.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('assets_admin/js/vfs_fonts.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('assets_admin/js/sweetalert2@10.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('assets/plugins/fancybox/jquery.fancybox.min.js')); ?>"></script>

    <script src="<?php echo e(url('assets_admin/js/summernote-bs4.js')); ?>"></script>

    <?php echo $__env->yieldContent('js'); ?>

    <script src="<?php echo e(url('assets/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.js')); ?>"></script>
    <script src="<?php echo e(url('assets_admin/js/jquery.timepicker.min.js')); ?>"></script>

    <script src="<?php echo e(url('assets_admin/js/flatpickr.js')); ?>"></script>
<!-- Custom JS -->
	<script  src="<?php echo e(url('assets_admin/js/script.js')); ?>"></script>
	<script  src="<?php echo e(url('assets_admin/js/stisla.js')); ?>"></script>
	<script  src="<?php echo e(url('assets_admin/js/admin_custom.js')); ?>"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>

<?php /**PATH C:\xampp\htdocs\bread\resources\views/layout/partials/footer_admin-scripts.blade.php ENDPATH**/ ?>