<?php $__env->startSection('title',__('All Doctor')); ?>
<?php $__env->startSection('content'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Doctor'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(session('status')): ?>
        <?php echo $__env->make('superAdmin.auth.status',[
            'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
    <div class="section_body">
    <div class="card">
            <div class="card-header w-100 text-right d-flex justify-content-between">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doctor_add')): ?>
                    <a href="<?php echo e(url('doctor/create')); ?>"><?php echo e(__('Add New')); ?></a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-hover table-center mb-0">
                        <thead>
                            <tr>
                                <th>
                                    <input name="select_all" value="1" id="master" type="checkbox" />
                                    <label for="master"></label>
                                </th>
                                <th>#</th>
                                <th><?php echo e(__('Doctor Name')); ?></th>
                                <th><?php echo e(__('email')); ?></th>
                                <th><?php echo e(__('Speciality')); ?></th>
                             
                                <th><?php echo e(__('Member Since')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <?php if(Gate::check('doctor_edit') || Gate::check('doctor_delete')): ?>
                                    <th><?php echo e(__('Actions')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" value="<?php echo e($doctor->id); ?>" id="<?php echo e($doctor->id); ?>" data-id="<?php echo e($doctor->id); ?>" class="sub_chk">
                                        <label for="<?php echo e($doctor->id); ?>"></label>
                                    </td>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <a href="<?php echo e(url('doctor/'.$doctor->id.'/'.Str::slug($doctor->name).'/dashboard')); ?>" class="avatar avatar-sm mr-2">
                                            <img class="avatar-img rounded-circle" src="<?php echo e($doctor->fullImage); ?>" alt="doctor Image"></a>
                                        <a href="<?php echo e(url('doctor/'.$doctor->id.'/'.Str::slug($doctor->name).'/dashboard')); ?>"><?php echo e($doctor->name); ?></a>
                                    </td>
                                    <td>
                                        <a href="mailto:<?php echo e($doctor->user['email']); ?>">
                                            <span class="text_transform_none"><?php echo e($doctor->user['email']); ?></span>
                                        </a>
                                    </td>
                                    <td>
                                        <?php if($doctor->expertise != null): ?>
                                            <?php echo e($doctor->expertise['name']); ?>

                                        <?php else: ?>
                                            <?php echo e(__('Not define')); ?>

                                        <?php endif; ?>
                                    </td>
                                    
                                    <?php
                                        $since = explode(" , ",$doctor->since)
                                    ?>
                                    <td><?php echo e($since[0]); ?><br><small><?php echo e($since[1]); ?></small></td>
                                    <td>
                                        <label class="cursor-pointer">
                                            <input type="checkbox"id="status_1<?php echo e($doctor->id); ?>" class="custom-switch-input" onchange="change_status('doctor',<?php echo e($doctor->id); ?>)" <?php echo e($doctor->status == 1 ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <?php if(Gate::check('doctor_edit') || Gate::check('doctor_delete')): ?>
                                            <a href="<?php echo e(url('doctor/'.$doctor->id.'/'.Str::slug($doctor->name).'/dashboard')); ?>" class="text-info">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doctor_edit')): ?>
                                            <a class="text-success" href="<?php echo e(url('doctor/'.$doctor->id.'/edit')); ?>">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doctor_delete')): ?>
                                            <a class="text-danger" href="javascript:void(0);" onclick="deleteData('doctor',<?php echo e($doctor->id); ?>)">
                                                <i class="far fa-trash-alt"></i>
                                            </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'doctor'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/doctor/doctor.blade.php ENDPATH**/ ?>