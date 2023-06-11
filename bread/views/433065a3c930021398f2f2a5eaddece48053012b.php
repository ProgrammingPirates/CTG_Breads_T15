

<?php $__env->startSection('title',__('Patient Register')); ?>

<link rel="stylesheet" href="<?php echo e(url('assets/css/intlTelInput.css')); ?>" />

<?php $__env->startSection('content'); ?>
    <div class="full-content">
        <div class="content mx-auto">
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
                            <h5 class="my-2"><?php echo e(__('New Register')); ?></h5>
                            <form action="<?php echo e(url('sign_up')); ?>" method="post" class="pt-3 w-100">
                                <?php echo csrf_field(); ?>
                                <div class="w-100">
                                    <div class="mb-4">
                                        <label for="" class="form-label mb-1"><?php echo e(__('Name')); ?></label>
                                        <input type="text" class="form-control w-100 <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('name')); ?>" name="name" required>
                                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="form-label mb-1"><?php echo e(__('Email')); ?></label>
                                        <input type="email" value="<?php echo e(old('email')); ?>" class="form-control w-100 <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" required>
                                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <input type="hidden" name="phone_code" value="+91">
                                    <div class="mb-4 d-flex flex-column">
                                        <label for="phone" class="form-label mb-1"><?php echo e(__('Phone Number')); ?></label>
                                        <input type="tel" value="<?php echo e(old('phone')); ?>" class="form-control" id="phone" name="phone" required>
                                        <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="custom_error">
                                                <?php echo e($message); ?>

                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="form-label mb-1"><?php echo e(__('Create Password')); ?></label>
                                        <input type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required>
                                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="form-label mb-1"><?php echo e(__('Date of Birth')); ?></label>
                                        <input type="date" max="<?php echo e(Carbon\Carbon::now(env('timezone'))->format('Y-m-d')); ?>" value="<?php echo e(old('dob')); ?>" class="form-control <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="dob" required>
                                        <?php $__errorArgs = ['dob'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                            <div class="invalid-feedback">
                                                <?php echo e($message); ?>

                                            </div>
                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                    </div>
                                    <div class="mb-4">
                                        <label for="" class="form-label mb-1"><?php echo e(__('Gender')); ?></label>
                                        <select name="gender" class="form-select form-control">
                                            <option value="male" <?php echo e(old('gender') == 'male' ? 'selected' : ''); ?>><?php echo e(__('Male')); ?></option>
                                            <option value="female" <?php echo e(old('gender') == 'female' ? 'selected' : ''); ?>><?php echo e(__('Female')); ?></option>
                                            <option value="other" <?php echo e(old('other') == 'other' ? 'selected' : ''); ?>><?php echo e(__('Other')); ?></option>
                                        </select>
                                    </div>

                                    <div class="d-flex flex-column pt-0 Appointment-detail w-100">
                                        <button type="submit" class="btn w-100" href="javascript:void(0)" role="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><?php echo e(__('Submit')); ?></button>
                                    </div>

                                    <div class="pt-4">
                                        <p class="already-text text-center"><?php echo e(__('Already Have An Account?')); ?><a href="<?php echo e(url('patient-login')); ?>" class="sidelink"> <?php echo e(__('Login')); ?></a></p>
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

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(url('assets/js/intlTelInput.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets/js/jquery.timepicker.min.js')); ?>"></script>
    <script>
        const phoneInputField = document.querySelector("#phone");
        const phoneInput = window.intlTelInput(phoneInputField, {
            preferredCountries: ["us", "co", "in", "de"],
            initialCountry: "in",
            separateDialCode: true,

            utilsScript:"<?php echo e(url('assets/js/utils.js')); ?>",
        });
        phoneInputField.addEventListener("countrychange",function() {
            var phone_code = $('.iti__selected-dial-code').text();
            $('input[name=phone_code]').val(phone_code);
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.mainlayout',['active_page' => 'patient register'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/website/register.blade.php ENDPATH**/ ?>