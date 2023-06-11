

<?php $__env->startSection('title',__('Pathology Category')); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Pathology Category'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section_body">
        <?php if(session('status')): ?>
        <?php echo $__env->make('superAdmin.auth.status',[
            'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <div class="card">
            <div class="card-header w-100 text-right d-flex justify-content-between">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lab_add')): ?>
                    <a href="<?php echo e(url('pathology_category/create')); ?>"><?php echo e(__('Add New')); ?></a>                
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
                                <th><?php echo e(__('Status')); ?></th>
                                <?php if(Gate::check('pathology_category_edit') || Gate::check('pathology_category_delete')): ?>
                                    <th><?php echo e(__('Actions')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $pathologyCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pathologyCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" value="<?php echo e($pathologyCategory->id); ?>" id="<?php echo e($pathologyCategory->id); ?>" data-id="<?php echo e($pathologyCategory->id); ?>" class="sub_chk">
                                        <label for="<?php echo e($pathologyCategory->id); ?>"></label>
                                    </td>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($pathologyCategory->name); ?></td>
                                    <td>
                                        <label class="cursor-pointer">
                                            <input type="checkbox"id="status_1<?php echo e($pathologyCategory->id); ?>" class="custom-switch-input" onchange="change_status('pathology_category',<?php echo e($pathologyCategory->id); ?>)" <?php echo e($pathologyCategory->status == 1 ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <?php if(Gate::check('pathology_category_edit') || Gate::check('pathology_category_delete')): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pathology_category_edit')): ?>
                                            <a class="text-success" href="<?php echo e(url('pathology_category/'.$pathologyCategory->id.'/edit')); ?>">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pathology_category_delete')): ?>
                                            <a class="text-danger" href="javascript:void(0);" onclick="deleteData('pathology_category',<?php echo e($pathologyCategory->id); ?>)">
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
                <input type="button" value="delete selected" onclick="deleteAll('pathology_cat_all_delete')" class="btn btn-primary">
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'pathology_category'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/pathology_category/pathology_category.blade.php ENDPATH**/ ?>