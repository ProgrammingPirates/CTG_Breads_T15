<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/daterangepicker/daterangepicker.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('title',__('Doctor Report')); ?>
<?php $__env->startSection('content'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Doctor Report'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(session('status')): ?>
    <?php echo $__env->make('superAdmin.auth.status',[
        'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div class="section_body">
        <div class="card">
            <div class="card-body">
                <form action="<?php echo e(url('doctor_report')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-6">
                            <input type="text" class="form-control" name="update_start_end_date">
                        </div>
                        <div class="col-md-6 col-lg-6 col-6">
                            <input type="submit" value="<?php echo e(__('Apply')); ?>" class="btn btn-primary">
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4><?php echo e(__('Total Doctor')); ?></h4>
                      </div>
                      <div class="card-body">
                        <h3><?php echo e(count($doctors)); ?></h3>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-success">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4><?php echo e(__('Subscription Based Doctor')); ?></h4>
                      </div>
                      <div class="card-body">
                        <h3><?php echo e($subscriptionDoctor); ?></h3>
                      </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12">
                <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                        <i class="fas fa-columns"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4><?php echo e(__('Commission Based Doctor')); ?></h4>
                      </div>
                      <div class="card-body">
                        <h3><?php echo e($commissionDoctor); ?></h3>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">

                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="table-responsive text-center">
                    <table class="w-100 display table datatable">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th><?php echo e(__('Doctor Image')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Email')); ?></th>
                                <th><?php echo e(__('Phone')); ?></th>
                                <th><?php echo e(__('Based On')); ?></th>
                                <th><?php echo e(__('Total Appointment')); ?></th>
                                <th><?php echo e(__('Doctor Status')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <a href="<?php echo e($doctor->fullImage); ?>" data-fancybox="gallery2">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="<?php echo e($doctor->fullImage); ?>" height="50" width="50">
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo e($doctor->name); ?>

                                    </td>
                                    <td>
                                        <a href="mailto:<?php echo e($doctor->user['email']); ?>">
                                            <span class="text_transform_none"><?php echo e($doctor->user['email']); ?></span>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="tel:<?php echo e($doctor->user['phone']); ?>"><?php echo e($doctor->user['phone']); ?></a>
                                    </td>
                                    <td><?php echo e($doctor->based_on); ?></td>
                                    <td>
                                        <?php echo e($doctor->totalOrder); ?>

                                    </td>
                                    <td>
                                        <?php if($doctor->status == 1): ?>
                                            <div class="badge badge-success"><?php echo e(__('Active')); ?></div>
                                        <?php else: ?>
                                            <div class="badge badge-danger"><?php echo e(__('Dective')); ?></div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('assets/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'doctor_report'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/report/doctor_report.blade.php ENDPATH**/ ?>