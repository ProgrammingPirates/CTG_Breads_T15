<?php $__env->startSection('title',__('Doctor Home')); ?>
<?php $__env->startSection('content'); ?>
<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Doctor Dashboard'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-xl-4 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4><?php echo e(__('Total Patient')); ?></h4>
                    </div>
                    <div class="card-body">
                        <h3><?php echo e($totalUser); ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-danger">
                    <i class="far fa-folder"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4><?php echo e(__('Total Appointment')); ?></h4>
                    </div>
                    <div class="card-body">
                        <h3><?php echo e($totalAppointment); ?></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-sm-6 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="far fa-file-pdf"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4><?php echo e(__('Total Review')); ?></h4>
                    </div>
                    <div class="card-body">
                        <h3><?php echo e($totalReview); ?></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 col-lg-7">
            <div class="card card-chart">
                <div class="card-header"><?php echo e(__("Today's appointment")); ?>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="w-100 display table datatable">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th><?php echo e(__('appointment id')); ?></th>
                                    <th><?php echo e(__('amount')); ?></th>
                                    <th><?php echo e(__('date')); ?></th>
                                    <th><?php echo e(__('payment status')); ?></th>
                                    <th><?php echo e(__('status')); ?></th>
                                    <th><?php echo e(__('change status')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $today_Appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($appointment->appointment_id); ?></td>
                                        <td><?php echo e($currency); ?><?php echo e($appointment->amount); ?></td>
                                        <td><?php echo e($appointment->date); ?><span class="d-block text-info"><?php echo e($appointment->time); ?></span></td>
                                        <td>
                                            <?php if($appointment->payment_status == 1): ?>
                                                <span class="btn btn-sm bg-success-light"><?php echo e(__('Paid')); ?></span>
                                            <?php else: ?>
                                                <span class="btn btn-sm bg-danger-light"><?php echo e(__('Remaining')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($appointment->appointment_status == 'pending' || $appointment->appointment_status == 'PENDING'): ?>
                                                <span class="badge badge-pill bg-warning-light"><?php echo e(__('Pending')); ?></span>
                                            <?php endif; ?>
                                            <?php if($appointment->appointment_status == 'approved' || $appointment->appointment_status == 'APPROVED'): ?>
                                                <span class="badge badge-pill bg-success-light"><?php echo e(__('Approved')); ?></span>
                                            <?php endif; ?>
                                            <?php if($appointment->appointment_status == 'canceled' || $appointment->appointment_status == 'CANCELED'): ?>
                                                <span class="badge badge-pill bg-danger-light"><?php echo e(__('Cancelled')); ?></span>
                                            <?php endif; ?>
                                            <?php if($appointment->appointment_status == 'completed' || $appointment->appointment_status == 'COMPLETED'): ?>
                                                <span class="badge badge-pill bg-default-light"><?php echo e(__('Completed')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <?php if($appointment->appointment_status == 'approved' ||  $appointment->appointment_status == 'completed'): ?>
                                                <a href="<?php echo e(url('completeAppointment/'.$appointment->id)); ?>" class="btn btn-sm bg-info-light <?php echo e($appointment->appointment_status == 'completed' ? 'disabled' : ''); ?>">
                                                    <i class="fas fa-check"></i> <?php echo e(__('Completed')); ?>

                                                </a>
                                            <?php elseif($appointment->appointment_status == 'pending' || $appointment->appointment_status == 'canceled'): ?>
                                                <a href="<?php echo e(url('acceptAppointment/'.$appointment->id)); ?>" class="btn btn-sm bg-success-light <?php echo e($appointment->appointment_status != 'pending' ? 'disabled' : ''); ?>">
                                                    <i class="fas fa-check"></i> <?php echo e(__('Accept')); ?>

                                                </a>
                                                <a href="<?php echo e(url('cancelAppointment/'.$appointment->id)); ?>" class="btn btn-sm bg-danger-light <?php echo e($appointment->appointment_status != 'pending' ? 'disabled' : ''); ?>">
                                                    <i class="fas fa-times"></i><?php echo e(__(' Cancel')); ?>

                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Sales Chart -->
        </div>
        <div class="col-md-12 col-lg-5">
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e(__('Appointments')); ?></h4>
                </div>
                <div class="card-body">
                    <canvas id="orderChart"></canvas>
                    <input type="hidden" name="years" value="<?php echo e($orderCharts['label']); ?>">
                    <input type="hidden" name="data" value="<?php echo e($orderCharts['data']); ?>">
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Latest Customers -->
            <div class="card card-table">
                <div class="card-header">
                    <h4 class="card-title"><?php echo e(__('Latest Customers')); ?></h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="w-100 display table datatable text-center">
                            <thead>
                                <tr>
                                    <th><?php echo e(__('Patient Name')); ?></th>
                                    <th><?php echo e(__('Phone')); ?></th>
                                    <th><?php echo e(__('Email')); ?></th>
                                    <th><?php echo e(__('Gender')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $allUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td>
                                            <h2 class="table-avatar">
                                                <a href="<?php echo e(url('patient/'.$allUser->id)); ?>" class="avatar avatar-sm mr-2">
                                                    <img class="avatar-img rounded-circle" src="<?php echo e($allUser->fullImage); ?>" alt="User Image"></a>
                                                <a href="<?php echo e(url('patient/'.$allUser->id)); ?>"><?php echo e($allUser->name); ?> </a>
                                            </h2>
                                        </td>
                                        <td>
                                            <a href="tel:<?php echo e($allUser->phone); ?>"><?php echo e($allUser->phone); ?></a>
                                        </td>
                                        <td>
                                            <a href="mailto:<?php echo e($allUser->email); ?>">
                                                <span class="text_transform_none"><?php echo e($allUser->email); ?></span>
                                            </a>
                                        </td>
                                        <td><?php echo e($allUser->gender); ?></td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /Latest Customers -->
        </div>
    </div>

</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(url('assets_admin/js/chart.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets_admin/js/chart.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'home'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/doctor/doctor/home.blade.php ENDPATH**/ ?>