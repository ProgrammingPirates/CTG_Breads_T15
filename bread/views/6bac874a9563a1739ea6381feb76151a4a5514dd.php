

<?php $__env->startSection('title',__('All Language')); ?>

<?php $__env->startSection('content'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Language'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(session('status')): ?>
    <?php echo $__env->make('superAdmin.auth.status',[
        'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div class="section_body">
        <div class="card">
            <div class="card-header w-100 text-right d-flex justify-content-between">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <div>
                    <a href="<?php echo e(url('downloadFile')); ?>" class="btn btn-primary"><?php echo e(__('Download Sample File')); ?></a>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language_add')): ?>
                        <a href="<?php echo e(url('language/create')); ?>"><?php echo e(__('Add New')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover datatable table-center mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('Language Image')); ?></th>
                                <th><?php echo e(__('Language Name')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <?php if(Gate::check('language_edit') || Gate::check('language_delete')): ?>
                                    <th><?php echo e(__('Actions')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <a href="<?php echo e($language->fullImage); ?>" data-fancybox="gallery2">
                                            <img src="<?php echo e($language->fullImage); ?>" width="50" height="50" class="rounded" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo e($language->name); ?>

                                    </td>
                                    <td>
                                        <label class="cursor-pointer">
                                            <input type="checkbox" id="status<?php echo e($language->id); ?>" class="custom-switch-input" name="status" onchange="change_status('language',<?php echo e($language->id); ?>)" <?php echo e($language->status == 1 ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <?php if(Gate::check('language_edit') || Gate::check('language_delete')): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language_edit')): ?>
                                            <a class="text-success" href="<?php echo e(url('language/'.$language->id.'/edit')); ?>">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language_delete')): ?>
                                            <a class="text-danger" href="javascript:void(0);" onclick="deleteData('language',<?php echo e($language->id); ?>)">
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

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'language'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bread\resources\views/superAdmin/language/language.blade.php ENDPATH**/ ?>