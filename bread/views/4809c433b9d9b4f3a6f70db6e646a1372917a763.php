<div class="">
    <div class="content mx-auto">
        <div class="ps-xl-0 ps-3 mt-3">
            <h3><?php echo e(count($doctors)); ?> &nbsp;<?php echo e(__('Counsellor available')); ?></h3>
            <p class="mt-2"><?php echo e(__('')); ?></p>
        </div>
    </div>
</div>

<div class="content mx-auto">
    <div class="row row-cols-1 row-cols-lg-2 g-0">
        <?php if(count($doctors) > 0): ?>
            <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col">
                    <div class="doct-card p-3 card border-0 m-3  ms-xl-0 pb-2 mb-0 position-relative ">
                        <div class="d-flex flex-sm-row flex-column">
                            <div class="doct-card-img me-3">
                                <img src="<?php echo e($doctor['fullImage']); ?>" class="rounded-circle" alt="...">
                            </div>
                            <div class=" doctor-info d-flex flex-column">
                                <div class="personalInfo">
                                    <div>
                                        <h6><?php echo e($doctor['name']); ?></h6>
                                    </div>
                                    

                                    <div class="post d-flex mt-2 align-items-center">
                                        <img src="<?php echo e($doctor['category']['fullImage']); ?>" alt="">
                                        <p class="ps-2 mb-0"><?php echo e($doctor['category']['name']); ?></p>
                                        <p class="ms-1 ps-1 mb-0 border-start text-muted">
                                            <?php echo e($doctor['expertise']['name']); ?>

                                        </p>
                                    </div>
                                    <div class="d-flex flex-sm-row flex-column mt-2">
                                        <div class="rating d-flex align-items-center">
                                            <?php for($i = 1; $i < 6; $i++): ?>
                                                <?php if($i <= $doctor['rate']): ?>
                                                    <i class='bx bxs-star active'></i>
                                                <?php else: ?>
                                                    <i class='bx bxs-star'></i>
                                                <?php endif; ?>
                                            <?php endfor; ?>
                                            <span class="d-inline-block average-rating">(<?php echo e($doctor['rate']); ?>)</span>
                                        </div>
                                        <div class="d-flex ms-sm-3 mt-sm-0 mt-3 align-items-center fbk ">
                                            <i class='bx bx-message-dots'></i>
                                            <p class="ms-2"> <span><?php echo e($doctor['review']); ?></span> <?php echo e(__(' Feedback')); ?></p>
                                        </div>
                                    </div>

                                </div>
                                
                                

                                <div class="d-flex align-items-sm-center my-3 flex-sm-row flex-column justify-contentss-between">
                                    <div class="btn-appointment">
                                        <a href="<?php echo e(url('doctor_profile/'.$doctor['id'].'/'.Str::slug($doctor['name']))); ?>" class="view-profile btn btn-outline-secondary login-btn marg_right"><?php echo e(__('View Profile')); ?></a>
                                    </div>
                                    <div class="btn-appointment mt-sm-0 mt-3">
                                        <a class="btn btn-link text-center mt-0 marg_left" href="<?php echo e(url('booking/'.$doctor['id'].'/'.Str::slug($doctor['name']))); ?>" role="button"><?php echo e(__('Book Appointment')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div data-id="<?php echo e($doctor['id']); ?>" class="position-absolute d-flex align-items-center justify-content-center shadow add-favourite <?php echo e($doctor['is_fav'] == 'true' ? 'active' : ''); ?>">
                            <i class='bx bx-bookmark-heart'></i>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <div class="w-100 text-center">
                <i class='bx bxs-user-plus noData'></i>
                <br>
                <h6 class="mt-3"><?php echo e(__('Counsellor Not Available.')); ?></h6>
            </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\doctro\resources\views/website/display_doctor.blade.php ENDPATH**/ ?>