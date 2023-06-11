<?php $__env->startSection('title',__('All Medicine Category')); ?>
<?php $__env->startSection('content'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Medicine Category'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section_body">
        <?php if(session('status')): ?>
        <?php echo $__env->make('superAdmin.auth.status',[
            'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <div class="card">
            <div class="card-header w-100 text-right d-flex justify-content-between">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('medicine_category_add')): ?>
                    <a href="<?php echo e(url('medicineCategory/create')); ?>"><?php echo e(__('Add New')); ?></a>
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
                                <th><?php echo e(__('Category name')); ?></th>
                                <th><?php echo e(__('status')); ?></th>
                                <?php if(Gate::check('medicine_category_edit') || Gate::check('medicine_category_delete')): ?>
                                    <th> <?php echo e(__('Action')); ?> </th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $medicineCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $medicineCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" value="<?php echo e($medicineCategory->id); ?>" id="<?php echo e($medicineCategory->id); ?>" data-id="<?php echo e($medicineCategory->id); ?>" class="sub_chk">
                                        <label for="<?php echo e($medicineCategory->id); ?>"></label>
                                    </td>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($medicineCategory->name); ?></td>
                                    <td>
                                        <label class="cursor-pointer">
                                            <input type="checkbox" id="status<?php echo e($medicineCategory->id); ?>" class="custom-switch-input" name="status" onchange="change_status('medicineCategory',<?php echo e($medicineCategory->id); ?>)" <?php echo e($medicineCategory->status == 1 ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <?php if(Gate::check('medicine_category_edit') || Gate::check('medicine_category_delete')): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('medicine_category_edit')): ?>
                                            <a class="text-success" href="<?php echo e(url('medicineCategory/'.$medicineCategory->id.'/edit/')); ?>">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('medicine_category_delete')): ?>
                                                <a class="text-danger" href="javascript:void(0);" onclick="deleteData('medicineCategory',<?php echo e($medicineCategory->id); ?>)">
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
                <input type="button" value="delete selected" onclick="deleteAll('medicineCategory_all_delete')" class="btn btn-primary">
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'medicineCategory'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/medicine_category/medicine_category.blade.php ENDPATH**/ ?>