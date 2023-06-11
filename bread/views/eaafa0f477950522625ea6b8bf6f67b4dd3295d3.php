<?php $__env->startSection('title',__('All banner')); ?>
<?php $__env->startSection('content'); ?>
<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Banner'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section_body">
        <?php if(session('status')): ?>
            <?php echo $__env->make('superAdmin.auth.status',[
                'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <div class="card">
            <div class="card-header w-100 d-flex justify-content-between">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if(count($banners) < 3): ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('banner_add')): ?>
                        <a href="<?php echo e(url('banner/create')); ?>"><?php echo e(__("Add New")); ?></a>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
            <div class="card-body">
                    <table class="w-100 display table datatable">
                        <thead>
                            <tr>
                                <th> # </th>
                                <th><?php echo e(__('Image')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <?php if(Gate::check('banner_edit') || Gate::check('banner_delete')): ?>
                                    <th> <?php echo e(__('Action')); ?> </th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <a href="<?php echo e($banner->fullImage); ?>" data-fancybox="gallery2">
                                            <img class="avatar-img rounded-circle" alt="User Image" src="<?php echo e($banner->fullImage); ?>" height="50" width="50">
                                        </a>
                                    </td>
                                    <td>
                                        <label class="cursor-pointer">
                                            <input type="checkbox" id="status<?php echo e($banner->id); ?>" class="custom-switch-input" name="status" onchange="change_status('treatments',<?php echo e($banner->id); ?>)" <?php echo e($banner->status == 1 ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <?php if(Gate::check('banner_edit') || Gate::check('banner_delete')): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('banner_edit')): ?>
                                            <a class="text-success" href="<?php echo e(url('banner/'.$banner->id.'/edit')); ?>">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('banner_delete')): ?>
                                                <a class="text-danger" href="javascript:void(0);" onclick="deleteData('banner',<?php echo e($banner->id); ?>)">
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
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'banner'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/banner/banner.blade.php ENDPATH**/ ?>