<?php $__env->startSection('title',__('Admin User')); ?>
<?php $__env->startSection('content'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Admin Users'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section-body">
        <?php if(session('status')): ?>
            <?php echo $__env->make('superAdmin.auth.status',['status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <div class="card">
            <div class="card-header w-100 text-right d-flex justify-content-between">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_add')): ?>
                    <a href="<?php echo e(url('admin_users/create')); ?>"><?php echo e(__('Add New')); ?></a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="w-100 display table datatable">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Roles')); ?></th>
                                <th><?php echo e(__('Email')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <?php if(Gate::check('admin_user_edit') || Gate::check('admin_user_delete')): ?>
                                    <th> <?php echo e(__('Action')); ?> </th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td>
                                        <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <span class="badge badge-lg badge-primary m-1"><?php echo e($item['name']); ?></span>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </td>
                                    <td class="text_transform_none"><?php echo e($user->email); ?></td>
                                    <td>
                                        <label class="cursor-pointer">
                                            <input type="checkbox" id="status<?php echo e($user->id); ?>" class="custom-switch-input" name="status" onchange="change_status('admin_users',<?php echo e($user->id); ?>)" <?php echo e($user->status == 1 ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <?php if(Gate::check('admin_user_edit') || Gate::check('admin_user_delete')): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_edit')): ?>
                                            <a class="text-success" href="<?php echo e(url('admin_users/'.$user->id.'/edit/')); ?>">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_delete')): ?>
                                            <a class="text-danger" href="javascript:void(0);" href="javascript:void(0)" onclick="deleteData('admin_users',<?php echo e($user->id); ?>)">
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
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'admin_users'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/admin_user/admin_user.blade.php ENDPATH**/ ?>