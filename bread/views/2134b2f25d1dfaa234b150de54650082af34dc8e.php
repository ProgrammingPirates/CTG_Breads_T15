<?php $__env->startSection('title',__('Setting')); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
    'title' => __('Setting'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php if(session('status')): ?>
    <?php echo $__env->make('superAdmin.auth.status',[
    'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if(isset($error)): ?>
    <div class="alert alert-danger"><?php echo e($error); ?></div>
    <?php endif; ?>

    <div class="card">

        <div class="card-header w-100 text-right d-flex justify-content-between">
            <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <a href="<?php echo e(url('/set_key')); ?>" ><?php echo e(__('Set Zoom Key')); ?></a>
            
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatable table table-hover table-center mb-0 text-center">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('Metting Id')); ?></th>
                            <th><?php echo e(__('Topic')); ?></th>
                            <th><?php echo e(__('Start Time')); ?></th>
                            <th><?php echo e(__('Duration')); ?></th>
                            <th><?php echo e(__('Agenda')); ?></th>
                            <th><?php echo e(__('Join Url')); ?></th>
                            <th><?php echo e(__('Action')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'setting'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/doctor/setting/setting.blade.php ENDPATH**/ ?>