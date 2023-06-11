<?php $__env->startSection('title',__('All Blog')); ?>
<?php $__env->startSection('content'); ?>
<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Pending Blog'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="section_body">
        <?php if(session('status')): ?>
        <?php echo $__env->make('superAdmin.auth.status',[
            'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php endif; ?>
        <div class="card">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog_add')): ?>
                <div class="p-2">
                    <a href="<?php echo e(url('blog/create')); ?>" class="float-right"><?php echo e(__('Add New')); ?></a>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row mb-5">
                            <div class="col">
                                <ul class="nav nav-tabs nav-tabs-solid">
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?php echo e(url('blog')); ?>"><?php echo e(__('Acitive Blog')); ?></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="<?php echo e(url('blog/pending-blog')); ?>"><?php echo e(__('Pending Blog')); ?></a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row blog-grid-row">
                            <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-4 col-xl-3 col-sm-12">
                                    <div class="card card-primary">
                                        <div class="card-body">
                                            <a href="<?php echo e($blog->fullImage); ?>" data-fancybox="gallery2" class="rounded-lg"><img class="img-fluid" src="<?php echo e($blog->fullImage); ?>" alt="Post Image"></a>
                                            <div class="blog-content">
                                                <h6 class="blog-title mt-5"><?php echo e($blog->title); ?></h6>
                                                <hr>
                                                <?php if(strlen($blog->desc) > 100): ?>
                                                    <?php echo substr(clean($blog->desc),0,100); ?>....
                                                <?php else: ?>
                                                    <?php echo clean($blog->desc); ?>

                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="row pt-3">
                                                <div class="col">
                                                    <a href="<?php echo e(url('blog/'.$blog->id.'/edit')); ?>" class="text-success">
                                                        <i class="far fa-edit"></i><?php echo e(__(' Edit')); ?>

                                                    </a>
                                                </div>
                                                <div class="col text-right">
                                                    <a href="javascript:void(0);" class="text-danger" onclick="deleteData('blog',<?php echo e($blog->id); ?>)">
                                                        <i class="far fa-trash-alt"></i><?php echo e(__(' Delete')); ?>

                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'blog'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/blog/pending_blog.blade.php ENDPATH**/ ?>