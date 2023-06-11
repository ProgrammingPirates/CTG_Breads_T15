<?php $__env->startSection('title',__('Subscription History')); ?>

<?php $__env->startSection('content'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Subscription History'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="datatable table table-hover table-center mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo e(__('subscription name')); ?></th>
                            <th><?php echo e(__('doctor name')); ?></th>
                            <th><?php echo e(__('payment')); ?></th>
                            <th><?php echo e(__('payment type')); ?></th>
                            <th><?php echo e(__('payment status')); ?></th>
                            <th><?php echo e(__('subscription date')); ?></th>
                            <th><?php echo e(__('Status')); ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><?php echo e($loop->iteration); ?></td>
                                <td><?php echo e($subscription['subscription']->name); ?></td>
                                <td><?php echo e($subscription['doctor']->name); ?></td>
                                <?php if($subscription['subscription']->name != 'free'): ?>
                                    <td><?php echo e($currency); ?><?php echo e($subscription->amount); ?></td>
                                    <td><?php echo e($subscription->payment_type); ?></td>
                                <?php else: ?>
                                    <td><?php echo e(__('Free subscription')); ?></td>
                                    <td><?php echo e(__('Free subscription')); ?></td>
                                <?php endif; ?>
                                <td>
                                    <?php if(auth()->user()->hasRole('doctor')): ?>
                                        <?php if($subscription->payment_status == 0): ?>
                                            <span class="btn btn-sm bg-danger-light"><?php echo e(__('unpaid')); ?></span>
                                        <?php else: ?>
                                            <span class="btn btn-sm bg-success-light"><?php echo e(__('paid')); ?></span>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                    <?php if(auth()->user()->hasRole('super admin')): ?>
                                        <select <?php echo e($subscription->payment_status == 1 ? 'disabled' : ''); ?> id="paymentStatus<?php echo e($subscription->id); ?>" onchange="change_paymentStatus(<?php echo e($subscription->id); ?>)" name="payment_status" class="form-control">
                                            <option value="1" <?php echo e($subscription->payment_status == 1 ? 'selected' : ''); ?>><?php echo e(__('paid')); ?></option>
                                            <option value="0" <?php echo e($subscription->payment_status == 0 ? 'selected' : ''); ?>><?php echo e(__('unpaid')); ?></option>
                                        </select>
                                    <?php endif; ?>
                                </td>
                                <td><?php echo e($subscription->start_date . ' to ' . $subscription->end_date); ?></td>
                                <td>
                                    <?php if($subscription->status == 0): ?>
                                        <span class="badge badge-pill bg-danger-light"><?php echo e(__('expired')); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-pill bg-success-light"><?php echo e(__('currently available')); ?></span>
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

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'subscription_history'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/subscription/subscription_history.blade.php ENDPATH**/ ?>