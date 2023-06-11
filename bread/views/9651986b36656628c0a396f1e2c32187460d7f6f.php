

<?php $__env->startSection('title',__('Counsellor Review')); ?>

<?php $__env->startSection('content'); ?>
<section class="section">
        <?php echo $__env->make('layout.breadcrumb',[
            'title' => __('Review'),
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php if(session('status')): ?>
            <?php echo $__env->make('superAdmin.auth.status',[
                'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="datatable table table-hover table-center mb-0 text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th><?php echo e(__('Appointment Id')); ?></th>
                                <th><?php echo e(__('User name')); ?></th>
                                <th><?php echo e(__('Review')); ?></th>
                                <th><?php echo e(__('Rate')); ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($review->appointment['appointment_id']); ?></td>
                                <td><?php echo e($review->user['name']); ?></td>
                                <td><?php echo e($review->review); ?></td>
                                <td>
                                    <?php for($i = 1; $i < 6; $i++): ?>
                                        <?php if($review->rate >= $i): ?>
                                            <i class="fas fa-star text-warning"></i>
                                        <?php else: ?>
                                            <i class="far fa-star"></i>
                                        <?php endif; ?>
                                    <?php endfor; ?>
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

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'review'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/doctor/doctor/review.blade.php ENDPATH**/ ?>