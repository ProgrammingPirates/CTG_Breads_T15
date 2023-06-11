<?php $__env->startSection('title',__('Notification Template')); ?>
<?php $__env->startSection('content'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Notification Template'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(session('status')): ?>
    <?php echo $__env->make('superAdmin.auth.status',[
        'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>

    <div class="section_body">
        <div class="card">
            <div class="card-body d-flex">
                <ul class="nav nav-pills w-25 flex-column">
                    <?php $__currentLoopData = $templates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $template): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="nav-item p-1">
                            <a class="nav-link rounded <?php echo e($loop->iteration == 1 ? 'active' : ''); ?>" onclick="edit_template(<?php echo e($template->id); ?>)" href="#solid-justified-tab1" data-toggle="tab"><?php echo e($template->title); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>

                <div class="tab-content m-lg-5 w-100">
                    <div class="tab-pane show active" id="solid-justified-tab1">
                        <form action="<?php echo e(url('update_template/'.$notification->id)); ?>" class="update_template" method="post">
                            <?php echo csrf_field(); ?>
                            <h5><?php echo e($notification->title); ?></h5>
                            <div class="row mt-5">
                                <div class="col-lg-6">
                                    <label class="col-form-label"><?php echo e(__('Subject')); ?></label>
                                    <div class="form-group">
                                        <input type="text" id="subject" required value="<?php echo e($notification->subject); ?>" name="subject" class="form-control">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <label class="col-form-label"><?php echo e(__('Title')); ?></label>
                                    <div class="form-group">
                                        <input type="text" id="title" readonly value="<?php echo e($notification->title); ?>" name="title" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="col-form-label"><?php echo e(__('Notification content')); ?></label>
                                    <div class="form-group">
                                        <textarea name="msg_content" id="msg_content" class="form-control" required cols="10" rows="5"><?php echo e($notification->msg_content); ?></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <label class="col-form-label"><?php echo e(__('Mail content')); ?></label>
                                    <div class="form-group">
                                        <textarea name="mail_content" id="mail_content" class="summernote" required><?php echo e($notification->mail_content); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <input type="submit" value="<?php echo e(__('submit')); ?>" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'template'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/notification_template/notification_template.blade.php ENDPATH**/ ?>