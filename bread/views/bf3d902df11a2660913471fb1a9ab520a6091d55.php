<?php $__env->startSection('title',__('All pharmacy')); ?>
<?php $__env->startSection('content'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Pharmacy'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(session('status')): ?>
        <?php echo $__env->make('superAdmin.auth.status',[
            'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <div class="card">
            <div class="card-header w-100 text-right d-flex justify-content-between">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pharmacy_add')): ?>
                    <a href="<?php echo e(url('pharmacy/create')); ?>"><?php echo e(__('Add New')); ?></a>
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
                                <th><?php echo e(__('Pharmacy name')); ?></th>
                                <th><?php echo e(__('email')); ?></th>
                                <th><?php echo e(__('phone')); ?></th>
                                <th><?php echo e(__('status')); ?></th>
                                <?php if(Gate::check('pharmacy_edit') || Gate::check('pharmacy_delete')): ?>
                                    <th> <?php echo e(__('Action')); ?> </th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $pharamacies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pharmacy): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" value="<?php echo e($pharmacy->id); ?>" id="<?php echo e($pharmacy->id); ?>" data-id="<?php echo e($pharmacy->id); ?>" class="sub_chk">
                                        <label for="<?php echo e($pharmacy->id); ?>"></label>
                                    </td>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <a href="<?php echo e($pharmacy->fullImage); ?>" data-fancybox="gallery2">
                                            <img class="avatar-img rounded-circle" alt="Pharamcy Image" src="<?php echo e($pharmacy->fullImage); ?>" height="50" width="50">
                                        </a>
                                    </td>
                                    <td><?php echo e($pharmacy->name); ?></td>
                                    <td>
                                        <span class="text_transform_none"><?php echo e($pharmacy->email); ?></span>
                                    </td>
                                    <td><?php echo e($pharmacy->phone); ?></td>

                                    <td>
                                        <label class="cursor-pointer">
                                            <input type="checkbox" id="status<?php echo e($pharmacy->id); ?>" class="custom-switch-input" name="status" onchange="change_status('pharmacy',<?php echo e($pharmacy->id); ?>)" <?php echo e($pharmacy->status == 1 ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <?php if(Gate::check('pharmacy_edit') || Gate::check('pharmacy_delete')): ?>
                                            <a class="text-primary" href="<?php echo e(url('pharmacy/'.$pharmacy->id)); ?>">
                                                <i class="far fa-eye"></i>
                                            </a>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pharmacy_edit')): ?>
                                            <a class="text-success" href="<?php echo e(url('pharmacy/'.$pharmacy->id.'/edit/')); ?>">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pharmacy_delete')): ?>
                                                <a class="text-danger" href="javascript:void(0);"  onclick="deleteData('pharmacy',<?php echo e($pharmacy->id); ?>)">
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
            <div class="card-fotter">
                <input type="button" value="delete selected" onclick="deleteAll('pharmacy_all_delete')" class="btn btn-primary">
            </div>
        </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'pharmacy'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/pharmacy/pharmacy.blade.php ENDPATH**/ ?>