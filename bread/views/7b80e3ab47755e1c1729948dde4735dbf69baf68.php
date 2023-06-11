

<?php $__env->startSection('title',__('Patient Login')); ?>

<?php $__env->startSection('content'); ?>
    <div class="full-content">
        <div class="content mx-auto h-100">
            <div class="row g-0">
                <div class="col-xl-5 col-md-6">
                    <div class="d-flex h-100 login-img px-5 align-items-center justify-content-center">
                        <img src="<?php echo e(url('assets/img/loginSvg.svg')); ?>" alt="">
                    </div>
                </div>
                <div class="col-xl-7 col-md-6">
                    <div class="m-3 p-sm-3 p-1 h-100">
                        <div
                            class="bg-white rounded-3 Common-form  d-flex align-items-center justify-content-center flex-column p-3 px-4">
                            <h2 class=""><?php echo e(__('Welcome')); ?></h2>
                            <h5 class="my-2"><?php echo e(__('Login')); ?></h5>
                            <form action="<?php echo e(('patient-login')); ?>" class="pt-3 w-100">
                                <?php echo csrf_field(); ?>
                                <div class="w-100">
                                    <div class="mb-4">
                                        <label for="" class="form-label mb-1"><?php echo e(__('Email')); ?></label>
                                        <input type="email" class="form-control w-100" name="email" value="<?php echo e(old('email')); ?>" required>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="form-label mb-1"><?php echo e(__('Password')); ?></label>
                                        <input type="password" class="form-control" name="password" value="<?php echo e(old('password')); ?>" required>
                                    </div>
                                    <?php if(session('error')): ?>
                                        <div class="text-center">
                                            <span class="custom_error"><?php echo e(session('error')); ?></span>
                                        </div>
                                    <?php endif; ?>
                                    <div class="d-flex flex-column pt-0 Appointment-detail w-100">
                                        <a href="<?php echo e(url('forgot_password')); ?>" class="ms-auto sidelink"><?php echo e(__('Forget Password?')); ?></a>
                                        <button type="submit" class="btn w-100" href="javascript:void(0)" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal">Submit</button>
                                    </div>

                                    <div class="pt-4">
                                        <p class="already-text text-center"><?php echo e(__('Don’t Have An Account?')); ?>

                                            <a href="<?php echo e(url('patient-register')); ?>" class="sidelink"> <?php echo e(__('Register')); ?></a>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout',['active_page' => 'login'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/website/login.blade.php ENDPATH**/ ?>