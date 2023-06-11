<?php $__env->startSection('title',__('Show Doctor')); ?>
<?php $__env->startSection('content'); ?>
<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Doctor Details'),
        'url' => url('doctor'),
        'urlTitle' =>  __('Doctor'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card profile-widget mt-5">
        <div class="profile-widget-header">
            <a href="<?php echo e($doctor->fullImage); ?>" data-fancybox="gallery2">
                <img alt="image" src="<?php echo e($doctor->fullImage); ?>" class="rounded-circle profile-widget-picture">
            </a>
            <div class="btn-group mb-2 dropleft float-right p-3">
                <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <?php echo e(__('More Details')); ?>

                </button>   
                <div class="dropdown-menu" x-placement="bottom-start">
                    <a class="dropdown-item" href="<?php echo e(url('doctor/'.$doctor->id.'/'.Str::slug($doctor->name).'/schedule')); ?>"><?php echo e(__('Schedule Timing')); ?></a>
                    <a class="dropdown-item" href="<?php echo e(url('doctor/'.$doctor->id.'/'.Str::slug($doctor->name).'/patients')); ?>"><?php echo e(__('Patient')); ?></a>
                    <a class="dropdown-item" href="<?php echo e(url('doctor/'.$doctor->id.'/'.Str::slug($doctor->name).'/finance')); ?>"><?php echo e(__('Finance Details')); ?></a>
                    
                </div>
            </div>
        </div>
        <div class="profile-widget-description">
            <div class="profile-widget-name"><?php echo e($doctor->name); ?>

                <div class="text-muted d-inline font-weight-normal">
                    <?php if(isset($doctor->expertise)): ?>
                    <div class="slash"></div> 
                    <?php echo e($doctor->expertise['name']); ?>

                    <?php endif; ?>
                </div>
            </div>
            <?php echo e($doctor->desc); ?>

        </div>
    </div>
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h6><?php echo e(__('Patient Appointment')); ?></h6>
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
                            
                            <?php if(auth()->user()->hasRole('doctor')): ?>
                                <th><?php echo e(__('Add prescription')); ?></th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php $__currentLoopData = $totalAppointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                                <td><?php echo e($currency); ?><?php echo e($appointment->amount); ?></td>
                                <?php if(!auth()->user()->hasRole('doctor')): ?>
                                    <td><?php echo e($appointment->doctor['name']); ?></td>
                                <?php endif; ?>
                                
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
                                <?php if(auth()->user()->hasRole('doctor')): ?>
                                <td class="d-flex w-100">
                                    <?php if($appointment->appointment_status == 'approve' ||  $appointment->appointment_status == 'complete'): ?>
                                        <a href="<?php echo e(url('completeAppointment/'.$appointment->id)); ?>" class="btn btn-sm bg-info-light <?php echo e($appointment->appointment_status == 'complete' ? 'disabled' : ''); ?>">
                                            <i class="fas fa-check"></i> <?php echo e(__('Completed')); ?>

                                        </a>
                                    <?php elseif($appointment->appointment_status == 'pending' || $appointment->appointment_status == 'cancel'): ?>
                                        <a href="<?php echo e(url('acceptAppointment/'.$appointment->id)); ?>" class="btn btn-sm bg-success-light <?php echo e($appointment->appointment_status != 'pending' ? 'disabled' : ''); ?>">
                                            <i class="fas fa-check"></i> <?php echo e(__('Accept')); ?>

                                        </a>
                                        <a href="<?php echo e(url('cancelAppointment/'.$appointment->id)); ?>" class="btn btn-sm bg-danger-light ml-2 <?php echo e($appointment->appointment_status != 'pending' ? 'disabled' : ''); ?>">
                                            <i class="fas fa-times"></i><?php echo e(__(' Cancelled')); ?>

                                        </a>
                                    <?php endif; ?>
                                </td>
                                <?php endif; ?>
                                <td>
                                    <a href="#edit_specialities_details" onclick="show_appointment(<?php echo e($appointment->id); ?>)" data-toggle="modal" class="text-info">
                                        <?php echo e(__(' View')); ?>

                                    </a>
                                </td>
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
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
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

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'doctor'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/doctor/show_doctor.blade.php ENDPATH**/ ?>