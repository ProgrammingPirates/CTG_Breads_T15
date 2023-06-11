

<?php $__env->startSection('title',__('Pathology')); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Pathology'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section_body">
        <?php if(session('status')): ?>
        <?php echo $__env->make('superAdmin.auth.status',[
            'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <div class="card">
            <div class="card-header w-100 text-right d-flex justify-content-between">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pathology_add')): ?>
                    <a href="<?php echo e(url('pathology/create')); ?>"><?php echo e(__('Add New')); ?></a>                
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
                                <th><?php echo e(__('Name')); ?></th>
                                <?php if(auth()->user()->hasRole('super admin')): ?>
                                    <th><?php echo e(__('Laboratory name')); ?></th>
                                <?php endif; ?>
                                <th><?php echo e(__('pathology Category name')); ?></th>
                                <th><?php echo e(__('Method')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <?php if(Gate::check('pathology_edit') || Gate::check('pathology_delete')): ?>
                                    <th><?php echo e(__('Actions')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $pathologies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pathology): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" value="<?php echo e($pathology->id); ?>" id="<?php echo e($pathology->id); ?>" data-id="<?php echo e($pathology->id); ?>" class="sub_chk">
                                        <label for="<?php echo e($pathology->id); ?>"></label>
                                    </td>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($pathology->test_name); ?></td>
                                    <?php if(auth()->user()->hasRole('super admin')): ?>
                                        <td><?php echo e($pathology->lab['name']); ?></td>
                                    <?php endif; ?>
                                    <td><?php echo e($pathology->pathology_category['name']); ?></td>
                                    <td><?php echo e($pathology->method); ?></td>
                                    <td>
                                        <label class="cursor-pointer">
                                            <input type="checkbox"id="status_1<?php echo e($pathology->id); ?>" class="custom-switch-input" onchange="change_status('pathology',<?php echo e($pathology->id); ?>)" <?php echo e($pathology->status == 1 ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <?php if(Gate::check('pathology_edit') || Gate::check('pathology_delete')): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pathology_edit')): ?>
                                            <a class="text-success" href="<?php echo e(url('pathology/'.$pathology->id.'/edit')); ?>">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pathology_delete')): ?>
                                            <a class="text-danger" href="javascript:void(0);" onclick="deleteData('pathology',<?php echo e($pathology->id); ?>)">
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
                <input type="button" value="delete selected" onclick="deleteAll('pathology_all_delete')" class="btn btn-primary">
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'pathology'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/lab/pathology/pathology.blade.php ENDPATH**/ ?>