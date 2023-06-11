

<?php $__env->startSection('title',__('Home')); ?>

<?php $__env->startSection('content'); ?>
    <div class="site-body">
        <div class="site-hero overflow-hidden position-relative d-md-block d-none">
            
            <img src="<?php echo e(url('images/upload/'.$setting->banner_image)); ?>" alt="">
            
        </div>
        <div class="container-xl">
            
            <div class="content mx-auto my-3 our_doctor">
                <div class="d-flex w-100 describe justify-content-between flex-sm-row flex-column py-3 align-items-sm-center">
                    <div class="consult ml-2">
                        <h2><?php echo e(__('Every action counts')); ?></h2>
                    </div>
                    <div class="btn-appointment  mt-sm-0 mt-3">
                        <a class="btn btn-link text-center mt-0 rounded-1" href="<?php echo e(url('show-doctors')); ?>" role="button"><?php echo e(__('Consult Now')); ?></a>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-xl-4 row-cols-lg-3 row-cols-sm-2 g-0 ">
                    <?php $__empty_1 = true; $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="col">
                            <div class="ml-2 mt-2">
                                <div class="card h-100 p-3 our_doctor_card rounded-3">
                                    <div class="d-flex">
                                        <div class="our_doctor_card_img me-3 position-relative">
                                            <img src="<?php echo e($doctor->full_image); ?>" alt="">
                                            <p class="position-absolute"><?php echo e($doctor->rate); ?>/5</p>
                                        </div>
                                        <div class="our_doctor_card_txt">
                                            <h6 class="mb-1">
                                                <a href="<?php echo e(url('doctor_profile/'.$doctor['id'].'/'.Str::slug($doctor['name']))); ?>"><?php echo e($doctor->name); ?></a>
                                            </h6>
                                            <p><?php echo e($doctor['category']['name']); ?></p>
                                            <p><?php echo e($doctor->experience); ?> <?php echo e(__('years Experience')); ?></p>
                                            <p><?php echo e($doctor->total_appointment); ?> <?php echo e(__('consults Appointment')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="w-100 text-center">
                            <i class='bx bxs-user-plus noData'></i>
                            <br>
                            <h6 class="mt-3"><?php echo e(__('BREADS facilitates volunteering from multiple countries across its various projects. Volunteers can offer their time, talent, resources, and skills in different domains, including the centres for the Young at Risk and in BREADS itself.')); ?></h6>

                        
                        </div>
                        
                    <?php endif; ?>
                </div>
            </div>

            <div class="content mx-auto Doc-Cards">
                
                </div>
            </div>
            <!-- Consult Top Doctor -->

            <div class="content mx-auto my-5">
                <div class="text-center mb-5">
                    <h3><?php echo e(__('Read top articles from Breads')); ?></h3>
                </div>

                <div class="single-item mb-5">
                    <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div>
                            <div class="card comment-card  p-2 d-flex mx-auto flex-column m-2 rounded-3 shadow-sm">
                                <div class=" comentor-name mb-3 mt-2 ms-2 d-flex align-items-center">
                                    <img src="<?php echo e($review->user['fullImage']); ?>" class="avtar rounded-circle" alt="">
                                    <p class="ms-2"><?php echo e($review->user['name']); ?></p>
                                </div>
                                <h6 class="m-2 "><?php echo e($review->review); ?></h6>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout',['active_page' => 'home'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\bread\resources\views/website/home.blade.php ENDPATH**/ ?>