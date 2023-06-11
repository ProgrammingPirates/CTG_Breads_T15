<?php $__env->startSection('title',__('All patient')); ?>

<?php $__env->startSection('content'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
    'title' => __('Patient'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section_body">
        <?php if(session('status')): ?>
        <?php echo $__env->make('superAdmin.auth.status',[
        'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <div class="card">
            <div class="card-header w-100 text-right d-flex justify-content-between">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('patient_add')): ?>
                <a href="<?php echo e(url('patient/create')); ?>"><?php echo e(__("Add New")); ?></a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-hover table-center mb-0 text-center">
                        <thead>
                            <tr>
                                <th>
                                    <input name="select_all" value="1" id="master" type="checkbox" />
                                    <label for="master"></label>
                                </th>
                                <th>#</th>
                                <th><?php echo e(__('User Name')); ?></th>
                                <th><?php echo e(__('email')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <?php if(Gate::check('patient_edit') || Gate::check('patient_delete')): ?>
                                <th><?php echo e(__('Actions')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="id[]" value="<?php echo e($user->id); ?>" id="<?php echo e($user->id); ?>"
                                        data-id="<?php echo e($user->id); ?>" class="sub_chk">
                                    <label for="<?php echo e($user->id); ?>"></label>
                                </td>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td>
                                    <p class="table-avatar">
                                        <a href="<?php echo e(url('patient/'.$user->id)); ?>" class="avatar avatar-sm mr-2">
                                            <img class="avatar-img rounded-circle" src="<?php echo e($user->fullImage); ?>"
                                                alt="patient Image"></a>
                                        <a href="<?php echo e(url('patient/'.$user->id)); ?>"><?php echo e($user->name); ?></a>
                                    </p>
                                </td>
                                <td>
                                    <span class="text_transform_none"><?php echo e($user->email); ?></span>
                                </td>
                                <td>
                                    <label class="cursor-pointer">
                                        <input type="checkbox" id="status<?php echo e($user->id); ?>" class="custom-switch-input"
                                            name="status" onchange="change_status('user',<?php echo e($user->id); ?>)" <?php echo e($user->status == 1 ? 'checked' : ''); ?>>
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <?php if(Gate::check('patient_edit') || Gate::check('patient_delete')): ?>
                                    <a href="<?php echo e(url('patient/'.$user->id)); ?>" class="text-info">
                                        <i class="far fa-eye"></i>
                                    </a>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('patient_edit')): ?>
                                    <a class="text-success" href="<?php echo e(url('patient/'.$user->id.'/edit/')); ?>">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('patient_delete')): ?>
                                    <a class="text-danger" href="javascript:void(0);"
                                        onclick="deleteData('patient',<?php echo e($user->id); ?>)">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                    <?php endif; ?>
                                    
                                    <a href="<?php echo e(url('create_appointment/'.$user->id)); ?>" data-toggle="tooltip" data-placement="top" title="<?php echo e(__('Add Appointment')); ?>">
                                        <i class="far fa-solid fa-calendar-check"></i>
                                    </a>
                                    
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                <input type="button" value="delete selected" onclick="deleteAll('patient_all_delete')"
                    class="btn btn-primary">
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'patients'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/patient/patient.blade.php ENDPATH**/ ?>