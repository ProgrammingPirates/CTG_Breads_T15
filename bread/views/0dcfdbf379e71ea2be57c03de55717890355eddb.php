<?php $__env->startSection('title',__('Appointment')); ?>
<style>
#button-16 .knobs:before
{
    content: 'YES';
    position: absolute;
    top: 4px;
    left: 4px;
    width: 20px;
    height: 10px;
    color: #fff;
    font-size: 10px;
    font-weight: bold;
    text-align: center;
    line-height: 1;
    padding: 9px 4px;
    background-color: #03A9F4;
    border-radius: 2px;
    transition: 0.3s ease all, left 0.3s cubic-bezier(0.18, 0.89, 0.35, 1.15);
}

#button-16 .checkbox:active + .knobs:before
{
    width: 46px;
}

#button-16 .checkbox:checked:active + .knobs:before
{
    margin-left: -26px;
}

#button-16 .checkbox:checked + .knobs:before
{
    content: 'NO';
    left: 42px;
    background-color: #F44336;
}

#button-16 .checkbox:checked ~ .layer
{
    background-color: #fcebeb;
}
</style>
<?php $__env->startSection('content'); ?>
<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Appointment'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section-body">
        <?php if(session('status')): ?>
            <?php echo $__env->make('superAdmin.auth.status',['status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>

        <div class="card">
            <div class="card-header w-100 text-right d-flex justify-content-between">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="w-100 display table datatable">
                        <thead>
                            <tr>
                                <th>
                                    <input name="select_all" value="1" id="master" type="checkbox" />
                                    <label for="master"></label>
                                </th>
                                <th> # </th>
                                <th><?php echo e(__('appointment id')); ?></th>
                                <th><?php echo e(__('Report or patient image')); ?></th>
                               
                                <?php if(!auth()->user()->hasRole('doctor')): ?>
                                    <th><?php echo e(__('doctor name')); ?></th>
                                <?php endif; ?>
                                <th><?php echo e(__('date')); ?></th>
                                
                                <?php if(auth()->user()->hasRole('doctor')): ?>
                                    <th><?php echo e(__('change status')); ?></th>
                                <?php endif; ?>
                                <th><?php echo e(__('view appointment')); ?></th>
                                <?php if(auth()->user()->hasRole('doctor')): ?>
                                    <th><?php echo e(__('Add prescription')); ?></th>
                                <?php endif; ?>
                                <?php if(auth()->user()->hasRole('doctor')): ?>
                                    <th><?php echo e(__('Create Zoom Meeting')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" value="<?php echo e($appointment->id); ?>" id="<?php echo e($appointment->id); ?>" data-id="<?php echo e($appointment->id); ?>" class="sub_chk">
                                        <label for="<?php echo e($appointment->id); ?>"></label>
                                    </td>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($appointment->appointment_id); ?></td>
                                    <td>
                                        <?php if($appointment->report_image != null): ?>
                                            <?php $__currentLoopData = $appointment->report_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <a href="<?php echo e($item); ?>" data-fancybox="gallery2">
                                                    <img src="<?php echo e($item); ?>" alt="Feature Image" width="50px" height="50px">
                                                </a>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <?php echo e(__('Image Not available')); ?>

                                        <?php endif; ?>
                                    </td>
                                   
                                    <?php if(!auth()->user()->hasRole('doctor')): ?>
                                        <td><?php echo e($appointment->doctor['name']); ?></td>
                                    <?php endif; ?>
                                    <td><?php echo e($appointment->date); ?><span class="d-block text-info"><?php echo e($appointment->time); ?></span></td>
                                    
                                    <td>
                                        <?php if($appointment->appointment_status == 'pending' || $appointment->appointment_status == 'pending' || $appointment->appointment_status == 'PENDING'): ?>
                                            <span class="badge badge-pill bg-warning-light"><?php echo e(__('Pending')); ?></span>
                                        <?php endif; ?>
                                        <?php if($appointment->appointment_status == 'approved' || $appointment->appointment_status == 'approve' || $appointment->appointment_status == 'APPROVED'): ?>
                                            <span class="badge badge-pill bg-success-light"><?php echo e(__('Approved')); ?></span>
                                        <?php endif; ?>
                                        <?php if($appointment->appointment_status == 'canceled' || $appointment->appointment_status == 'cancel' || $appointment->appointment_status == 'CANCELED'): ?>
                                            <span class="badge badge-pill bg-danger-light"><?php echo e(__('Cancelled')); ?></span>
                                        <?php endif; ?>
                                        <?php if($appointment->appointment_status == 'completed' || $appointment->appointment_status == 'complete' || $appointment->appointment_status == 'COMPLETED'): ?>
                                            <span class="badge badge-pill bg-default-light"><?php echo e(__('Completed')); ?></span>
                                        <?php endif; ?>
                                    </td>
                                    <?php if(auth()->user()->hasRole('doctor')): ?>
                                    <td class="d-flex w-100">
                                        <?php if($appointment->appointment_status == 'approved' || $appointment->appointment_status == 'approve' ||  $appointment->appointment_status == 'completed'): ?>
                                            <a href="<?php echo e(url('completeAppointment/'.$appointment->id)); ?>" class="btn btn-sm bg-info-light <?php echo e($appointment->appointment_status == 'completed' ? 'disabled' : ''); ?>">
                                                <i class="fas fa-check"></i> <?php echo e(__('Complete')); ?>

                                            </a>
                                        <?php elseif($appointment->appointment_status == 'pending' || $appointment->appointment_status == 'canceled' || $appointment->appointment_status == 'cancel'): ?>
                                            <a href="<?php echo e(url('acceptAppointment/'.$appointment->id)); ?>" class="btn btn-sm bg-success-light <?php echo e($appointment->appointment_status != 'pending' ? 'disabled' : ''); ?>">
                                                <i class="fas fa-check"></i> <?php echo e(__('Accept')); ?>

                                            </a>
                                            <a href="<?php echo e(url('cancelAppointment/'.$appointment->id)); ?>" class="btn btn-sm bg-danger-light ml-2 <?php echo e($appointment->appointment_status != 'pending' ? 'disabled' : ''); ?>">
                                                <i class="fas fa-times"></i><?php echo e(__(' Cancel')); ?>

                                            </a>
                                        <?php endif; ?>
                                    </td>
                                    <?php endif; ?>
                                        <?php if($appointment->is_from == 1): ?>
                                            <td>
                                                <a href="#edit_specialities_details" onclick="show_appointment(<?php echo e($appointment->id); ?>)" data-toggle="modal" class="text-info">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                                <a href="<?php echo e(url('edit_appointment/'.$appointment->id)); ?>"  data-toggle="tooltip" data-placement="top" title="Edit" data-toggle="modal" class="text-success">
                                                    <i class="far fa-edit"></i>
                                                </a>
                                                <a href="<?php echo e(url('delete_appointment/'.$appointment->id)); ?>"  data-toggle="tooltip" data-placement="top" title="Delete" data-toggle="modal" class="text-danger">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        <?php else: ?>
                                            <td>
                                                <a href="#edit_specialities_details" onclick="show_appointment(<?php echo e($appointment->id); ?>)" data-toggle="modal" class="text-info">
                                                    <i class="far fa-eye"></i>
                                                </a>
                                            </td>
                                        <?php endif; ?>
                                    <?php if(auth()->user()->hasRole('doctor')): ?>
                                    <?php if($appointment->prescription == 0): ?>
                                        <td>
                                            <a href="<?php echo e(url('prescription/'.$appointment->id)); ?>"  class="btn btn-sm bg-success-light">
                                                <i class="fas fa-plus"></i><?php echo e(__(' Add prescription')); ?>

                                            </a>
                                        </td>
                                    <?php else: ?>
                                        <td>
                                            <a href="<?php echo e(url('prescription/upload/'.$appointment->preData['pdf'])); ?>" data-fancybox="gallery2">
                                                <?php echo e(__('show prescription')); ?>

                                            </a>
                                        </td>
                                    <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(auth()->user()->hasRole('doctor')): ?>
                                    <td>
                                        <a href="<?php echo e(url('create_zoom_metting/'.$appointment->id)); ?>" ><?php echo e(__('Create Metting')); ?></a>
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
</section>
<div class="modal fade" id="edit_specialities_details" role="dialog" aria-hidden="true">
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
                        <td><?php echo e(__('Hospital')); ?></td>
                        <td class="hospital"></td>
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
                        <td><?php echo e(__('date')); ?></td>
                        <td class="date"></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('time')); ?></td>
                        <td class="time"></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('Drug Effects')); ?></td>
                        <td class="drug_effect"></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('Doctor Note')); ?></td>
                        <td class="doctor_note"></td>
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

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'appointment'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/appointment/appointment.blade.php ENDPATH**/ ?>