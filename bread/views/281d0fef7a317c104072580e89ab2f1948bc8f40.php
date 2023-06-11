<?php $__env->startSection('title',__('Show Patient Appointment')); ?>
<?php $__env->startSection('content'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => $user->name . __(' Profile'),
        'url' => url('patient'),
        'urlTitle' => __('Patient')
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section_body">
        <div class="card">
            <div class="card">
                <div class="card-header">
                    <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="w-100 display table datatable">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th><?php echo e(__('appointment id')); ?></th>
                                    <th><?php echo e(__('Report or patient image')); ?></th>
                                   
                                    <th><?php echo e(__('doctor name')); ?></th>
                                   
                                    <th><?php echo e(__('view appointment')); ?></th>
                                    <?php if(auth()->user()->hasRole('doctor')): ?>
                                        <th><?php echo e(__('Add prescription')); ?></th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($appointment->appointment_id); ?></td>
                                        <td>
                                            <?php if($appointment->report_image != null): ?>
                                                <?php $__currentLoopData = $appointment->report_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <a href="<?php echo e($item); ?>" data-fancybox="gallery2">
                                                        <img src="<?php echo e($item); ?>" width="50px" height="50px" alt="Feature Image">
                                                    </a>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <?php echo e(__('Image Not available')); ?>

                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($currency); ?><?php echo e($appointment->amount); ?></td>
                                        <td><?php echo e($appointment->doctor['name']); ?></td>
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
                                            <?php if($appointment->appointment_status == 'approve' || $appointment->appointment_status == 'APPROVE'): ?>
                                                <span class="badge badge-pill bg-success-light"><?php echo e(__('Approved')); ?></span>
                                            <?php endif; ?>
                                            <?php if($appointment->appointment_status == 'cancel' || $appointment->appointment_status == 'CANCEL'): ?>
                                                <span class="badge badge-pill bg-danger-light"><?php echo e(__('Cancelled')); ?></span>
                                            <?php endif; ?>
                                            <?php if($appointment->appointment_status == 'complete' || $appointment->appointment_status == 'COMPLETE'): ?>
                                                <span class="badge badge-pill bg-default-light"><?php echo e(__('Completed')); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="#edit_specialities_details" onclick="show_appointment(<?php echo e($appointment->id); ?>)" data-toggle="modal" class="btn btn-sm btn-primary">
                                                <?php echo e(__(' View')); ?>

                                            </a>
                                        </td>
                                        <?php if(auth()->user()->hasRole('doctor')): ?>
                                        <td>
                                            <a href="<?php echo e(url('prescription/'.$appointment->id)); ?>"  class="btn btn-sm bg-success-light">
                                                <i class="far fa-plus"></i><?php echo e(__(' App prescription')); ?>

                                            </a>
                                        </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade hide" id="edit_specialities_details" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__("Appointment")); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td><?php echo e(__('appointment Id')); ?></td>
                        <td class="appointment_id"></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('Doctor name')); ?></td>
                        <td class="doctor_name"></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('patient name')); ?></td>
                        <td class="patient_name"></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('patient address')); ?></td>
                        <td class="patient_address"></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('patient age')); ?></td>
                        <td class="patient_age"></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('amount')); ?></td>
                        <td class="amount"></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('date')); ?></td>
                        <td class="date"></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('time')); ?></td>
                        <td class="time"></td>
                    </tr>
                   
                    <tr>
                        <td><?php echo e(__('illness information')); ?></td>
                        <td class="illness_info"></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'patients'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/patient/show_patient.blade.php ENDPATH**/ ?>