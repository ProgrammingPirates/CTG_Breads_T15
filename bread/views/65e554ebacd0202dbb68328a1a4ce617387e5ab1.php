<div class="footer <?php echo e(Request::is('/') ? '' : 'mt-5'); ?>">
    <div class="content mx-auto">
        <div class="pb-5">
            <div class="row g-0">
                <div class=" col-lg-3 col-md-4 ps-3 pb-4 col-sm-6  ">
                <img src="<?php echo e($setting->companyWhite); ?>" height="60px" class="" alt="">

                </div>
                <div class=" col-lg-3 col-md-4 ps-3 pb-4 col-sm-6  ">
                    <div>
                        <h6><?php echo e(__('For Student')); ?></h6>
                    </div>
                    <div class="mt-4">
                        <ul class="nav mt-3 footer-nav flex-column">
                            <li class="nav-item">
                                <a href="<?php echo e(url('show-doctors')); ?>"><?php echo e(__('Counsellor')); ?></a>
                            </li>
                            <?php if(auth()->check()): ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('user_profile')); ?>"><?php echo e(auth()->user()->name); ?></a>
                                </li>
                            <?php else: ?>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('patient-login')); ?>"><?php echo e(__('Login')); ?></a>
                                </li>
                                <li class="nav-item">
                                    <a href="<?php echo e(url('patient-register')); ?>"><?php echo e(__('Register')); ?></a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4 ps-3 pb-4 col-sm-6  ">
                    <div>
                        <h6><?php echo e($setting->Breads); ?></h6>
                        <ul class="nav mt-3 footer-nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link ps-0" target="_blank" href="<?php echo e(url('user_about_us')); ?>"><?php echo e(__('About Us')); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-0" target="_blank" href="<?php echo e(url('user_privacy_policy')); ?>"><?php echo e(__('Privacy Policy')); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class=" col-lg-3 col-md-4 ps-3 pb-4 col-sm-6  ">
                    <div>
                        <h6><?php echo e(__('Contact Us')); ?></h6>
                        <ul class="nav mt-3 footer-nav flex-column">
                            <li class="nav-item">
                                <a href="tel:<?php echo e($setting->phone); ?>" class="nav-link ps-0"><?php echo e($setting->phone); ?></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link ps-0" href="mailto:<?php echo e($setting->email); ?>"><?php echo e($setting->email); ?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="mx-auto d-flex flex-column align-items-center">
                
                <p><?php echo e(__('Copyright')); ?> &copy; <?php echo e(Carbon\Carbon::now(env('timezone'))->year); ?> <p>Breads</p><?php echo e(__('All rights reserved')); ?> </p>
            </div>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\doctro\resources\views/layout/partials/footer.blade.php ENDPATH**/ ?>