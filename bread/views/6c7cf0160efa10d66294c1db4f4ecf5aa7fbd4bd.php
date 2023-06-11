<?php $__env->startSection('title',__('Schedule')); ?>
<?php $__env->startSection('content'); ?>
<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Counsellor schedule'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <input type="hidden" name="start_time" value="<?php echo e($doctor->start_time); ?>">
        <input type="hidden" name="end_time" value="<?php echo e($doctor->end_time); ?>">
        <input type="hidden" name="timeslot" value="<?php echo e($doctor->timeslot == 'other' ? $doctor->custom_timeslot : $doctor->timeslot); ?>">
        <div class="card">
            <div class="card-header">
                <?php echo e(__('Schedule Timings')); ?>

            </div>
            <div class="card-body">
                <div class="profile-box">
                    <div class="card schedule-widget mb-0">
                        <div class="schedule-header">
                            <div class="schedule-nav">
                                <ul class="nav nav-tabs nav-justified">
                                    <?php $__currentLoopData = $doctor->workingHours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $working): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="nav-item">
                                            <a class="nav-link <?php echo e($loop->iteration == 1 ? 'active' : ''); ?>" onclick="display_timeslot(<?php echo e($working->id); ?>)" data-toggle="tab" href="#slot_sunday"><?php echo e($working->day_index); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>

                        <div class="tab-content">
                            <div id="slot_sunday" class="doc-times tab-pane fade show active">
                                <input type="hidden" name="working_id" value="<?php echo e($doctor->firstHours->id); ?>">
                                <h6 class="card-title d-flex float-right justify-content-between">
                                    <a class="edit-link btn btn-danger float-right mt-5" data-toggle="modal" onclick="edit_timeslot()" href="#edit_time_slot">
                                        <i class="fa fa-edit mr-1"></i> <?php echo e(__('Edit Slot')); ?>

                                    </a>
                                </h4>
                                <?php $__currentLoopData = json_decode($doctor->firstHours->period_list); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="badge badge-primary ml-2 mt-5">
                                    <?php echo e($list->start_time); ?> - <?php echo e($list->end_time); ?>

                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="modal fade" id="edit_time_slot" tabindex="-1" role="dialog" aria-labelledby="edit_time_slot" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="post" class="working_form">
                <?php echo csrf_field(); ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle"><?php echo e(__('Edit Time Slot')); ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="working_id" value="">
                    <div>
                        <div class="row">
                            <div class="col-md-4">
                                <label for=""><?php echo e(__('Day Status')); ?></label>
                            </div>
                            <div class="col-md-6">
                                <label class="cursor-pointer">
                                    <input type="checkbox" id="status_1" class="custom-switch-input" name="status" checked>
                                    <span class="custom-switch-indicator"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="hours-info mt-3">
                        <div class="row form-row hours-cont display_timing">
                            <div class="col-12 col-md-10">
                            </div>
                        </div>
                    </div>
                    <div class="add-more mb-3">
                        <a href="javascript:void(0);" class="add-hours"><i class="fa fa-plus-circle"></i> Add More</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'schedule'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/doctor/doctor/doctor_schedule.blade.php ENDPATH**/ ?>