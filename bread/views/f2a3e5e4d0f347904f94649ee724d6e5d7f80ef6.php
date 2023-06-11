<?php $__env->startSection('title',__('All offer')); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Offer'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(session('status')): ?>
    <?php echo $__env->make('superAdmin.auth.status',[
        'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <div class="section_body">
        <div class="card">
            <div class="card-header w-100 text-right d-flex justify-content-between">
                <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('offer_add')): ?>
                    <a href="<?php echo e(url('offer/create')); ?>"><?php echo e(__('Add New')); ?></a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover datatable table-center mb-0">
                        <thead>
                            <tr>
                                <th>
                                    <input name="select_all" value="1" id="master" type="checkbox" />
                                    <label for="master"></label>
                                </th>
                                <th>#</th>
                                <th><?php echo e(__('Offer Image')); ?></th>
                                <th><?php echo e(__('Offer Name')); ?></th>
                                <th><?php echo e(__('Offer code')); ?></th>
                                <th><?php echo e(__('start_end_date')); ?></th>
                                <th><?php echo e(__('Status')); ?></th>
                                <?php if(Gate::check('offer_edit') || Gate::check('offer_delete')): ?>
                                    <th><?php echo e(__('Actions')); ?></th>
                                <?php endif; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $offers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $offer): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" name="id[]" value="<?php echo e($offer->id); ?>" id="<?php echo e($offer->id); ?>" data-id="<?php echo e($offer->id); ?>" class="sub_chk">
                                        <label for="<?php echo e($offer->id); ?>"></label>
                                    </td>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td>
                                        <a href="<?php echo e($offer->fullImage); ?>" data-fancybox="gallery2">
                                            <img src="<?php echo e($offer->fullImage); ?>" width="50" height="50" class="rounded" alt="">
                                        </a>
                                    </td>
                                    <td>
                                        <?php echo e($offer->name); ?>

                                    </td>
                                    <td><?php echo e($offer->offer_code); ?></td>
                                    <td><?php echo e($offer->start_end_date); ?></td>
                                    <td>
                                        <label class="cursor-pointer">
                                            <input type="checkbox" id="status<?php echo e($offer->id); ?>" class="custom-switch-input" name="status" onchange="change_status('offer',<?php echo e($offer->id); ?>)" class="check" <?php echo e($offer->status == 1 ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </td>
                                    <td>
                                        <?php if(Gate::check('offer_edit') || Gate::check('offer_delete')): ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('offer_edit')): ?>
                                            <a class="text-success" href="<?php echo e(url('offer/'.$offer->id.'/edit')); ?>">
                                                <i class="far fa-edit"></i>
                                            </a>
                                            <?php endif; ?>
                                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('offer_delete')): ?>
                                            <a class="text-danger" href="javascript:void(0);" onclick="deleteData('offer',<?php echo e($offer->id); ?>)">
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
                <input type="button" value="delete selected" onclick="deleteAll('offer_all_delete')" class="btn btn-primary">
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'offer'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/offer/offer.blade.php ENDPATH**/ ?>