<?php $__env->startSection('title',__('All Category')); ?>
<?php $__env->startSection('content'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Category'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(session('status')): ?>
    <?php echo $__env->make('superAdmin.auth.status',[
        'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <div class="section_body">
        <div class="card">
            <div class="card-header w-100 d-flex justify-content-between">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_add')): ?>
                    <a href="<?php echo e(url('category/create')); ?>"><?php echo e(__('Add New')); ?></a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="w-100 display table datatable text-center">
                        <thead>
                            <tr>
                                <th>
                                    <input name="select_all" value="1" id="master" type="checkbox" />
                                    <label for="master"></label>
                                </th>
                                <th> # </th>
                                <th><?php echo e(__('Image')); ?></th>
                                <th><?php echo e(__('category name')); ?></th>
                                <th><?php echo e(__('treatment Name')); ?></th>
                               
                                <?php if(Gate::check('category_edit') || Gate::check('category_delete')): ?>
                                    <th> <?php echo e(__('Action')); ?> </th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td>
                                    <input type="checkbox" name="id[]" value="<?php echo e($category->id); ?>" id="<?php echo e($category->id); ?>" data-id="<?php echo e($category->id); ?>" class="sub_chk">
                                    <label for="<?php echo e($category->id); ?>"></label>
                                </td>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td>
                                    <a href="<?php echo e($category->fullImage); ?>" data-fancybox="gallery2">
                                        <img class="avatar-img rounded-circle" src="<?php echo e($category->fullImage); ?>" height="50" width="50">
                                    </a>
                                </td>
                                <td>
                                    <?php echo e($category->name); ?>

                                    </td>
                                <td>
                                    <a href="<?php echo e(url('category/'.$category->id.'/edit')); ?>">
                                    <?php echo e($category->treatment['name']); ?></a>
                                </td>
                                <td>
                                    <label class="cursor-pointer">
                                        <input type="checkbox" id="status<?php echo e($category->id); ?>" class="custom-switch-input" name="status" onchange="change_status('category',<?php echo e($category->id); ?>)" <?php echo e($category->status == 1 ? 'checked' : ''); ?>>
                                        <span class="custom-switch-indicator"></span>
                                    </label>
                                </td>
                                <td>
                                    <?php if(Gate::check('category_edit') || Gate::check('category_delete')): ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_edit')): ?>
                                        <a class="text-success" href="<?php echo e(url('category/'.$category->id.'/edit/')); ?>">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_delete')): ?>
                                            <a class="text-danger" href="javascript:void(0);" onclick="deleteData('category',<?php echo e($category->id); ?>)">
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
                <input type="button" value="<?php echo e(__('delete selected')); ?>" onclick="deleteAll('category_all_delete')" class="btn btn-primary">
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'category'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/category/category.blade.php ENDPATH**/ ?>