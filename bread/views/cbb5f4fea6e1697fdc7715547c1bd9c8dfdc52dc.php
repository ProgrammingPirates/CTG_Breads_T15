

<?php $__env->startSection('title',__('Test Reports')); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Test Reports'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section_body">
        <?php if(session('status')): ?>
        <?php echo $__env->make('superAdmin.auth.status',[
            'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <div class="card">
            <div class="card-header w-100 text-right d-flex justify-content-between">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover text-center mb-0 datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <?php if(auth()->user()->hasRole('super admin')): ?>
                                    <th><?php echo e(__('Laboratory Name')); ?></th>
                                    <th><?php echo e(__('Report')); ?></th>
                                <?php endif; ?>
                                <th><?php echo e(__('Prescirption')); ?></th>
                                <th><?php echo e(__('Date time')); ?></th>
                                
                                <th><?php echo e(__('View')); ?></th>
                                <?php if(auth()->user()->hasRole('laboratory')): ?>
                                   
                                    <th><?php echo e(__('Upload Report')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $test_reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test_report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <?php if(auth()->user()->hasRole('super admin')): ?>
                                        <td><?php echo e($test_report->lab['name']); ?></td>
                                        <td>
                                            <?php if($test_report->upload_report == null): ?>
                                                <?php echo e(__('Report Not Availabel.')); ?>

                                            <?php else: ?>
                                                <a href="<?php echo e('report_prescription/report/'.$test_report->upload_report); ?>" data-fancybox="gallery2">
                                                    <?php echo e(__('Report')); ?>

                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
                                    <td class="d-flex">
                                        <?php if($test_report->prescription != null): ?>
                                            <a href="<?php echo e('report_prescription/upload/'.$test_report->prescription); ?>" data-fancybox="gallery2">
                                                <img src="<?php echo e('report_prescription/upload/'.$test_report->prescription); ?>" alt="Feature Image" width="50px" height="50px">
                                            </a>
                                        <?php else: ?>
                                            <?php echo e(__('Prescirption Not available')); ?>

                                        <?php endif; ?>
                                    </td>
                                    <td><?php echo e($test_report->date); ?><span class="d-block text-info"><?php echo e($test_report->time); ?></span></td>
                                    <td><?php echo e($test_report->payment_type); ?></td>
                                    <td><?php echo e($currency); ?><?php echo e($test_report->amount); ?></td>
                                    <td>
                                        <a onclick="single_report(<?php echo e($test_report->id); ?>)" class="text-info ml-2" href="#edit_specialities_details" data-toggle="modal">
                                            <?php echo e(__('View')); ?>

                                        </a>
                                    </td>
                                    <?php if(auth()->user()->hasRole('laboratory')): ?>
                                       
                                        <td>
                                            <?php if($test_report->upload_report == null): ?>
                                                <a onclick="upload_report(<?php echo e($test_report->id); ?>)" class="text-info ml-2" href="#upload_report" data-toggle="modal">
                                                    <?php echo e(__('Upload Report')); ?>

                                                </a>
                                            <?php else: ?>
                                                <a class="text-success" href="<?php echo e('report_prescription/report/'.$test_report->upload_report); ?>" data-fancybox="gallery2">
                                                    <?php echo e(__('Report')); ?>

                                                </a>
                                            <?php endif; ?>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card_fotter">
                <input type="button" value="delete selected" onclick="deleteAll('doctor_all_delete')" class="btn btn-primary">
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="edit_specialities_details" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__("Test Report")); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tr>
                        <td><?php echo e(__('Report Id')); ?></td>
                        <td class="report_id"></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('patient name')); ?></td>
                        <td class="patient_name"></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('patient phone number')); ?></td>
                        <td class="patient_phone"></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('patient age')); ?></td>
                        <td class="patient_age"></td>
                    </tr>
                    <tr>
                        <td><?php echo e(__('patient gender')); ?></td>
                        <td class="patient_gender"></td>
                    </tr>
                    
                   
                    <table class="table types">
                    </table>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="upload_report" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?php echo e(__("Upload Report")); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="<?php echo e(url('upload_report')); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" name="report_id">
                    <div class="form-group">
                        <label for="email" class="col-form-label"> <?php echo e(__('Upload Report')); ?></label>
                        <input type="file" name="upload_report" class="form-control <?php $__errorArgs = ['upload_report'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" required>
                        <?php $__errorArgs = ['upload_report'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Upload')); ?></button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'test_report'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/lab/test_report.blade.php ENDPATH**/ ?>