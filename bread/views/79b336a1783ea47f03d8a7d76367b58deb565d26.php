<?php $__env->startSection('title',__('All role')); ?>
<?php $__env->startSection('content'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Role'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(session('status')): ?>
    <?php echo $__env->make('superAdmin.auth.status',[
        'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div class="section_body">
        <div class="card">
            <div class="card-header">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_add')): ?>
                    <a href="<?php echo e(url('role/create')); ?>" class="w-100 text-right"><?php echo e(__('Add New')); ?></a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="w-100 display table datatable text-center">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th><?php echo e(__('role name')); ?></th>
                                <th><?php echo e(__('permissions')); ?></th>
                                <?php if(Gate::check('role_edit') || Gate::check('role_delete')): ?>
                                    <th> <?php echo e(__('Action')); ?> </th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($role->name); ?></td>
                                    <td>
                                        <?php if($role->name == "super admin"): ?>
                                            <span class="badge badge-lg badge-primary m-1"><?php echo e(__('All')); ?></span>
                                        <?php else: ?>
                                            <?php $__empty_1 = true; $__currentLoopData = $role->permissions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $permission): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <span class="badge badge-lg badge-primary m-1"><?php echo e($permission->name); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <span class="badge  badge-lg badge-warning m-1"><?php echo e(__('No Data')); ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?php if(Gate::check('role_edit') || Gate::check('role_delete')): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_edit')): ?>
                                                <?php if($role->default == 0): ?>
                                                    <a class="text-success <?php echo e($role->name == 'super admin' ? 'disabled' : ''); ?> <?php echo e($role->name == 'pharmacy' ? 'disabled' : ''); ?> <?php echo e($role->name == 'doctor' ? 'disabled' : ''); ?>" href="<?php echo e(url('role/'.$role->id.'/edit/')); ?>">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_delete')): ?>
                                                <?php if($role->default == 0): ?>
                                                    <a href="javascript:void(0)"  class="text-danger <?php echo e($role->name == 'super admin' ? 'disabled' : ''); ?> <?php echo e($role->name == 'pharmacy' ? 'disabled' : ''); ?> <?php echo e($role->name == 'doctor' ? 'disabled' : ''); ?>" onclick="deleteData('role',<?php echo e($role->id); ?>)">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                <?php endif; ?>
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

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'role'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/role/role.blade.php ENDPATH**/ ?>