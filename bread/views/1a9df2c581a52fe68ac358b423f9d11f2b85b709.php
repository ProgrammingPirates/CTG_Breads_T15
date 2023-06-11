<?php $__env->startSection('title',__('All subscription')); ?>
<style>
    *{
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      text-decoration: none;
      list-style: none;
    }
</style>

<?php if(auth()->user()->hasRole('doctor')): ?>
    <?php $__env->startSection('subscription'); ?>
<?php else: ?>
    <?php $__env->startSection('content'); ?>
<?php endif; ?>
    <section class="section">
        <?php echo $__env->make('layout.breadcrumb',[
            'title' => __('Subscription'),
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php if(session('status')): ?>
        <?php echo $__env->make('superAdmin.auth.status',[
            'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <div class="card">
            <div class="card-header w-100">
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscription_add')): ?>
                    <a href="<?php echo e(url('subscription/create')); ?>" class="w-100 text-right"><?php echo e(__('Add New')); ?></a>
                <?php endif; ?>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="pricing-table">
                        <?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-md-3 mt-5">
                                <div class="pricing-card">
                                    <h3 class="pricing-card-header"><?php echo e($subscription->name); ?></h3>
                                    <div class="price"><?php echo e($subscription->total_appointment); ?><span> <?php echo e(__('Booking')); ?></span></div>
                                    <ul>
                                        <?php if($subscription->name != 'free'): ?>
                                            <?php $__currentLoopData = json_decode($subscription->plan); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $plan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <strong><?php echo e($currency); ?><?php echo e($plan->price); ?>/</strong>
                                                    <?php echo e($plan->month); ?><?php echo e(__(' month')); ?>

                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <li>
                                                <strong><?php echo e(__('free 1 month validity')); ?></strong><br>
                                                <?php echo e(__("this can't be edit or delete")); ?>

                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscription_edit')): ?>
                                    <a href="<?php echo e(url('subscription/'.$subscription->id.'/edit')); ?>" class="btn btn-outline-primary m-3  <?php echo e($subscription->name == 'free' ? 'disabled' : ''); ?>"><?php echo e(__('Edit')); ?></a>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('subscription_delete')): ?>
                                        <a href="javascript:void(0);" onclick="deleteData('subscription',<?php echo e($subscription->id); ?>)" class="btn btn-outline-danger m-3 <?php echo e($subscription->name == 'free' ? 'disabled' : ''); ?>"><?php echo e(__('Delete')); ?></a>
                                    <?php endif; ?>
                                    <?php if(auth()->user()->hasRole('doctor')): ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doctor_subscription_purchase')): ?>
                                        <?php if(isset($purchase)): ?>
                                            <?php if($subscription->id == $purchase->subscription_id): ?>
                                                <button class="btn btn-primary m-3"><?php echo e(__('Activated')); ?></button>
                                            <?php else: ?>
                                                <a href="<?php echo e(url('subscription_purchase/'.$subscription->id)); ?>" class="btn btn-outline-primary m-3 <?php echo e($subscription->name == 'free' ? 'disabled' : ''); ?>"><?php echo e(__('Buy')); ?></a>
                                            <?php endif; ?>
                                        <?php else: ?>
                                            <a href="<?php echo e(url('subscription_purchase/'.$subscription->id)); ?>" class="btn btn-outline-primary m-3 <?php echo e($subscription->name == 'free' ? 'disabled' : ''); ?>"><?php echo e(__('Buy')); ?></a>
                                        <?php endif; ?>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'subscription'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/subscription/subscription.blade.php ENDPATH**/ ?>