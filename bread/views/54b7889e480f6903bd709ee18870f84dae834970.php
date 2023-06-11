<?php $__env->startSection('title',__('All Treatments')); ?>
<?php $__env->startSection('content'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Treatments'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section-body">
        <?php if(session('status')): ?>
            <?php echo $__env->make('superAdmin.auth.status',['status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <div class="card">
            <div class="card-header w-100 text-right d-flex justify-content-between">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('treatment_add')): ?>
                    <a href="<?php echo e(url('treatments/create')); ?>"><?php echo e(__('Add New')); ?></a>
                <?php endif; ?>
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
                                <th><?php echo e(__('image')); ?></th>
                                <th><?php echo e(__('Name')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <?php if(Gate::check('treatment_edit') || Gate::check('treatment_delete')): ?>
                                    <th> <?php echo e(__('Action')); ?> </th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $treats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $treat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" value="<?php echo e($treat->id); ?>" id="<?php echo e($treat->id); ?>" data-id="<?php echo e($treat->id); ?>" class="sub_chk">
                                        <label for="<?php echo e($treat->id); ?>"></label>
                                    </td>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <a href="<?php echo e($treat->fullImage); ?>" data-fancybox="gallery2">
                                            <img src="<?php echo e($treat->fullImage); ?>" width="50" height="50" class="rounded" alt="">
                                        </a>
                                    </td>
                                    <td><?php echo e($treat->name); ?></td>
                                    <td>
                                        <label class="cursor-pointer">
                                            <input type="checkbox" id="status<?php echo e($treat->id); ?>" class="custom-switch-input" name="status" onchange="change_status('treatments',<?php echo e($treat->id); ?>)" <?php echo e($treat->status == 1 ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <?php if(Gate::check('treatment_edit') || Gate::check('treatment_delete')): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('treatment_edit')): ?>
                                            <a class="text-success" href="<?php echo e(url('treatments/'.$treat->id.'/edit/')); ?>">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('treatment_delete')): ?>
                                            <a class="text-danger" href="javascript:void(0);" href="javascript:void(0)" onclick="deleteData('treatments',<?php echo e($treat->id); ?>)">
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
            <div class="card-footer">
                <input type="button" value="<?php echo e(__('Delete Selected')); ?>" onclick="deleteAll('treatment_all_delete')" class="btn btn-primary">
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'treatments'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/treatments/treatments.blade.php ENDPATH**/ ?>