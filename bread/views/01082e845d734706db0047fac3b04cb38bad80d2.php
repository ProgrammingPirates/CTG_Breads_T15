<?php $__env->startSection('title',__('Show Doctor')); ?>
<?php $__env->startSection('content'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Doctor Finance Details'),
        'url' => url('doctor'),
        'urlTitle' =>  __('Doctor'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section_body">
        <div class="card profile-widget mt-5">
            <div class="profile-widget-header">
                <a href="<?php echo e($doctor->fullImage); ?>" data-fancybox="gallery2">
                    <img alt="image" src="<?php echo e($doctor->fullImage); ?>" class="rounded-circle profile-widget-picture">
                </a>
                <div class="btn-group mb-2 dropleft float-right p-3">
                    <button class="btn btn-primary btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo e(__('More Details')); ?>

                    </button>
                    <div class="dropdown-menu" x-placement="bottom-start">
                      <a class="dropdown-item" href="<?php echo e(url('doctor/'.$doctor->id.'/'.Str::slug($doctor->name).'/dashboard')); ?>"><?php echo e(__('Appointment')); ?></a>
                      <a class="dropdown-item" href="<?php echo e(url('doctor/'.$doctor->id.'/'.Str::slug($doctor->name).'/schedule')); ?>"><?php echo e(__('Schedule Timing')); ?></a>
                      <a class="dropdown-item" href="<?php echo e(url('doctor/'.$doctor->id.'/'.Str::slug($doctor->name).'/patients')); ?>"><?php echo e(__('Patient')); ?></a>
                    </div>
                </div>
            </div>
            <div class="profile-widget-description">
                <div class="profile-widget-name"><?php echo e($doctor->name); ?>

                    <div class="text-muted d-inline font-weight-normal">
                        <?php if(isset($doctor->expertise)): ?>
                        <div class="slash"></div> 
                        <?php echo e($doctor->expertise['name']); ?>

                        <?php endif; ?>
                    </div>
                </div>
                <?php echo e($doctor->desc); ?>

            </div>
        </div>
        
        <?php if($doctor->based_on == 'subscription'): ?>
            <div class="card">
                <div class="card-header">
                    <h5><?php echo e(__('Based On ')); ?><?php echo e($doctor->based_on); ?></h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="datatable table table-hover table-center mb-0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('subscription name')); ?></th>
                                    <th><?php echo e(__('doctor name')); ?></th>
                                    
                                    <th><?php echo e(__('Status')); ?></th>
                                </tr>
                            </thead>
                            
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if($doctor->based_on == 'commission'): ?>
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <strong><?php echo e(__('Last 7 days earning')); ?></strong>
                    <?php echo $__env->make('superAdmin.auth.exportButtons', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="monthFinance" class="table datatable table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('Date')); ?></th>
                                    <th><?php echo e(__('Order Amount')); ?></th>
                                    <th><?php echo e(__('Admin Commission')); ?></th>
                                    <th><?php echo e(__('vendor earning')); ?></th>
                                </tr>
                            </thead>
                            <tbody class="month_finance">
                                <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($order['date']); ?></td>
                                    <td><?php echo e($currency); ?><?php echo e($order['amount']); ?></td>
                                    <td><?php echo e($currency); ?><?php echo e($order['admin_commission']); ?></td>
                                    <td><?php echo e($currency); ?><?php echo e($order['doctor_commission']); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h4><?php echo e(__('Settlements')); ?></h4>
                    <span class="badge badge-success"><?php echo e(__('admin gives to doctor')); ?></span>&nbsp;
                    <span class="badge badge-danger"><?php echo e(__('doctor gives to admin')); ?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th><?php echo e(__('duration')); ?></th>
                                    <th><?php echo e(__('Order count')); ?></th>
                                    <th><?php echo e(__('Admin Earning')); ?></th>
                                    <th><?php echo e(__('Doctor earning')); ?></th>
                                    <th><?php echo e(__('Settles amount')); ?></th>
                                    <th><?php echo e(__('view')); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $settels; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $settel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td id="duration<?php echo e($loop->iteration); ?>"><?php echo e($settel['duration']); ?></td>
                                        <td><?php echo e($settel['d_total_task']); ?></td>
                                        <td><?php echo e($currency); ?><?php echo e($settel['admin_earning']); ?></td>
                                        <td><?php echo e($currency); ?><?php echo e($settel['doctor_earning']); ?></td>
                                        <td>
                                            <?php if($settel['d_balance'] > 0): ?>
                                                
                                                <span class="badge badge-success"><?php echo e($currency); ?><?php echo e(abs($settel['d_balance'])); ?></span>
                                            <?php else: ?>
                                                
                                                <span class="badge badge-danger"><?php echo e($currency); ?><?php echo e(abs($settel['d_balance'])); ?></span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary" onclick="show_settle_details(<?php echo e($loop->iteration); ?>)" data-toggle="modal" data-target="#exampleModal">
                                                <?php echo e(__('Show settlement details')); ?>

                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</section>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Show settlement details')); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body details_body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo e(__('Close')); ?></button>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'doctor'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/doctor/finance.blade.php ENDPATH**/ ?>