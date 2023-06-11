<?php $__env->startSection('title',__('Admin Setting')); ?>

<?php $__env->startSection('setting'); ?>

<section class="section">
    <?php echo $__env->make('layout.breadcrumb',[
        'title' => __('Setting'),
    ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(session('status')): ?>
    <?php echo $__env->make('superAdmin.auth.status',[
        'status' => session('status')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs">
                        <?php if($setting->license_verify == 1): ?>
                            <li class="nav-item"><a class="nav-link active" href="#solid-justified-tab1" data-toggle="tab"><?php echo e(__('General Settings')); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#solid-justified-tab3" data-toggle="tab"><?php echo e(__('verification')); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#solid-justified-tab5" data-toggle="tab"><?php echo e(__('Website Setting')); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#solid-justified-tab6" data-toggle="tab"><?php echo e(__('Notification Setting')); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#solid-justified-tab8" data-toggle="tab"><?php echo e(__('Static Pages')); ?></a></li>
                            <li class="nav-item"><a class="nav-link" href="#solid-justified-tab9" data-toggle="tab"><?php echo e(__('Video Call Setting')); ?></a></li>
                        <?php endif; ?>
                        <li class="nav-item"><a class="nav-link <?php echo e($setting->license_verify == 0 ? 'active' : ''); ?>" href="#solid-justified-tab7" data-toggle="tab"><?php echo e(__('License Setting')); ?></a></li>
                    </ul>
                    <div class="tab-content mt-3">
                        <?php if($setting->license_verify == 1): ?>
                            <div class="tab-pane show active" id="solid-justified-tab1">
                                <form action="<?php echo e(url('update_general_setting')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="app_id" class="ul-form__label"> <?php echo e(__('Company white logo')); ?></label>
                                            <div class="avatar-upload avatar-box avatar-box-left">
                                                <div class="avatar-edit">
                                                    <input type='file' id="image" name="company_white_logo" accept=".png, .jpg, .jpeg" />
                                                    <label for="image"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview" style="background-image: url(<?php echo e($setting->companyWhite); ?>);">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $__errorArgs = ['company_white_logo'];
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
                                        <div class="col-md-4">
                                            <label for="app_id" class="col-form-label"> <?php echo e(__('Company logo')); ?></label>
                                            <div class="avatar-upload avatar-box avatar-box-left">
                                                <div class="avatar-edit">
                                                    <input type='file' id="image2" name="company_logo" accept=".png, .jpg, .jpeg" />
                                                    <label for="image2"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview2" style="background-image: url(<?php echo e($setting->logo); ?>);">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $__errorArgs = ['company_logo'];
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

                                        <div class="col-md-4">
                                            <label for="app_id" class="col-form-label"> <?php echo e(__('Company favicon')); ?></label>
                                            <div class="avatar-upload avatar-box avatar-box-left">
                                                <div class="avatar-edit">
                                                    <input type='file' id="image3" name="company_favicon" accept=".png, .jpg, .jpeg" />
                                                    <label for="image3"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview3" style="background-image: url(<?php echo e($setting->favicon); ?>);">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $__errorArgs = ['company_favicon'];
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
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-md-4 form-group">
                                            <label for="business_name" class="col-form-label"> <?php echo e(__('Business Name')); ?></label>
                                            <input type="text" required name="business_name" value="<?php echo e($setting->business_name); ?>" class="form-control <?php $__errorArgs = ['business_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <?php $__errorArgs = ['business_name'];
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
                                        <div class="col-md-4 form-group">
                                            <label for="email" class="col-form-label"> <?php echo e(__('Email')); ?></label>
                                            <input type="email" required name="email" value="<?php echo e($setting->email); ?>" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
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
                                        <div class="col-md-4 form-group">
                                            <label for="phone" class="col-form-label"> <?php echo e(__('Phone number')); ?></label>
                                            <input type="number" min="1" required name="phone" value="<?php echo e($setting->phone); ?>" class="form-control <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <?php $__errorArgs = ['phone'];
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
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-6 form-group">
                                            <label for="app_id" class="col-form-label"> <?php echo e(__('Admin Color')); ?></label>
                                            <input type="color" required value="<?php echo e($setting->color); ?>" name="color" class="form-control <?php $__errorArgs = ['color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <?php $__errorArgs = ['color'];
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
                                        <div class="col-md-6 form-group">
                                            <label for="app_id" class="col-form-label"> <?php echo e(__('Website Color')); ?></label>
                                            <input type="color" required value="<?php echo e($setting->website_color); ?>" name="website_color" class="form-control <?php $__errorArgs = ['website_color'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                            <?php $__errorArgs = ['website_color'];
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
                                    </div>
                                    <div class="form-group">
                                        <label for="app_id" class="col-form-label"> <?php echo e(__('Order Cancel Thresold By Doctor(In Minutes)')); ?></label>
                                        <input type="number" min=1 required value="<?php echo e($setting->auto_cancel); ?>" name="auto_cancel" class="form-control <?php $__errorArgs = ['auto_cancel'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['auto_cancel'];
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

                                    <div class="row mt-5">
                                        <div class="col-md-6 form-group">
                                            <label for="app_id" class="col-form-label"> <?php echo e(__('Timezone')); ?></label>
                                            <select name="timezone" class="select2">
                                                <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $timezone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($timezone->TimeZone); ?>" <?php echo e($timezone->TimeZone == $setting->timezone ? 'selected' : ''); ?>><?php echo e($timezone->UTC_DST_offset); ?>&nbsp;&nbsp;<?php echo e($timezone->TimeZone); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6 form-group">
                                            <label for="app_id" class="col-form-label"> <?php echo e(__('Currency')); ?></label>
                                            <select name="currency_code" class="select2">
                                                <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($currency->id); ?>" <?php echo e($currency->id == $setting->currency_id ? 'selected' : ''); ?>><?php echo e($currency->country); ?>&nbsp;&nbsp;(<?php echo e($currency->currency); ?>)&nbsp;&nbsp;(<?php echo e($currency->code); ?>)
                                                </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-md-6 form-group">
                                            <label for="radius" class="col-form-label"> <?php echo e(__("Radius")); ?></label>
                                            <input type="number" min="1" name="radius" class="radius form-control" value="<?php echo e($setting->radius); ?>">
                                            <?php $__errorArgs = ['radius'];
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
                                        <div class="col-md-6 form-group">
                                            <label for="language" class="col-form-label"> <?php echo e(__("Language")); ?></label>
                                            <select name="language" class="form-control">
                                                <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($language->name); ?>" <?php echo e($setting->language == $language->name ? 'selected' : ''); ?>><?php echo e($language->name); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                            <?php $__errorArgs = ['language'];
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
                                    </div>

                                    

                                   

                                    <div class="form-group default_base_on_com <?php echo e($setting->default_base_on != 'commission' ? 'hide' : ''); ?>">
                                        <label for="default_commission" class="col-form-label"> <?php echo e(__("commission (in %)")); ?></label>
                                        <input type="number" min="1" name="default_commission" <?php echo e($setting->default_base_on == 'commission' ? 'required' : ''); ?>  value="<?php echo e($setting->default_commission); ?>" class="form-control <?php $__errorArgs = ['default_commission'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> default_base_on_com_text">
                                        <?php $__errorArgs = ['default_commission'];
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
                                    <div class="form-group">
                                        <label for="map_key" class="col-form-label"> <?php echo e(__('Google map key')); ?></label>
                                        <input type="text" required name="map_key" value="<?php echo e($setting->map_key); ?>" class="form-control <?php $__errorArgs = ['map_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['map_key'];
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

                                    <div class="form-group">
                                        <table class="table table-bordered cancel_reason">
                                            <thead>
                                                <tr>
                                                    <td>
                                                        <?php echo e(__('Add reason')); ?>

                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary" onclick="add_cancel_reason()">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if($setting->cancel_reason != null): ?>
                                                    <?php
                                                        $cancel_reasons = json_decode($setting->cancel_reason)
                                                    ?>
                                                    <?php $__currentLoopData = $cancel_reasons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancel_reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="cancel_reason[]" value="<?php echo e($cancel_reason); ?>" class="form-control" required>
                                                        </td>
                                                        <?php if($loop->iteration != 1): ?>
                                                            <td>
                                                                <button type="button" class="btn btn-danger removebtn"><i class="fas fa-times"></i></button>
                                                            </td>
                                                        <?php endif; ?>
                                                    </tr>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="cancel_reason[]" class="form-control" required>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row mt-5">
                                        <div class="col-md-12 text-center">
                                            <input type="submit" class="btn btn-primary" value="<?php echo e(__('Submit')); ?>">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="solid-justified-tab2">
                                <form action="<?php echo e(url('update_payment_setting')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label class="col-form-label"><?php echo e(__('COD')); ?></label>
                                            <label class="cursor-pointer">
                                                <input type="checkbox" name="cod" class="custom-switch-input" value="1" <?php echo e($setting->cod == 1 ? 'checked' : ''); ?>>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                       <div class="col-md-2">
                                            <label class="col-form-label"><?php echo e(__('PAYPAL')); ?></label>
                                            <label class="cursor-pointer">
                                                <input type="checkbox" name="paypal" class="custom-switch-input" value="1" <?php echo e($setting->paypal == 1 ? 'checked' : ''); ?>>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="col-form-label"><?php echo e(__('STRIPE')); ?></label>
                                            <label class="cursor-pointer">
                                                <input type="checkbox" name="stripe" class="custom-switch-input" value="1" <?php echo e($setting->stripe == 1 ? 'checked' : ''); ?>>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="col-form-label"><?php echo e(__('RAZORPAY')); ?></label>
                                            <label class="cursor-pointer">
                                                <input type="checkbox" name="razor" class="custom-switch-input" value="1" <?php echo e($setting->razor == 1 ? 'checked' : ''); ?>>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="col-form-label"><?php echo e(__('Flutterwave')); ?></label>
                                            <label class="cursor-pointer">
                                                <input type="checkbox" name="flutterwave" class="custom-switch-input" value="1" <?php echo e($setting->flutterwave == 1 ? 'checked' : ''); ?>>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-2">
                                            <label class="col-form-label"><?php echo e(__('PAYSTACK')); ?></label>
                                            <label class="cursor-pointer">
                                                <input type="checkbox" name="paystack" class="custom-switch-input" value="1" <?php echo e($setting->paystack == 1 ? 'checked' : ''); ?>>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Stripe public key')); ?></label>
                                        <input type="text" value="<?php echo e($setting->stripe_public_key); ?>" name="stripe_public_key" class="form-control <?php $__errorArgs = ['stripe_public_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['stripe_public_key'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Stripe secret key')); ?></label>
                                        <input type="text" value="<?php echo e($setting->stripe_secret_key); ?>" name="stripe_secret_key" class="form-control <?php $__errorArgs = ['stripe_secret_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['stripe_secret_key'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Paypal sandbox key')); ?></label>
                                        <input type="text" value="<?php echo e($setting->paypal_sandbox_key); ?>" name="paypal_sandbox_key" class="form-control <?php $__errorArgs = ['paypal_sandbox_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['paypal_sandbox_key'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('paypal producation key')); ?></label>
                                        <input type="text" value="<?php echo e($setting->paypal_producation_key); ?>" name="paypal_producation_key" class="form-control <?php $__errorArgs = ['paypal_producation_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['paypal_producation_key'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Paypal client ID')); ?></label>
                                        <input type="text" value="<?php echo e($setting->paypal_client_id); ?>" name="paypal_client_id" class="form-control <?php $__errorArgs = ['paypal_client_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['paypal_client_id'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('paypal Secret key')); ?></label>
                                        <input type="text" value="<?php echo e($setting->paypal_secret_key); ?>" name="paypal_secret_key" class="form-control <?php $__errorArgs = ['paypal_secret_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['paypal_secret_key'];
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

                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Razorpay key')); ?></label>
                                        <input type="text" value="<?php echo e($setting->razor_key); ?>" name="razor_key" class="form-control <?php $__errorArgs = ['razor_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['razor_key'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Flutterwave Key')); ?></label>
                                        <input type="text" value="<?php echo e($setting->flutterwave_key); ?>" name="flutterwave_key" class="form-control <?php $__errorArgs = ['flutterwave_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['flutterwave_key'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Flutterwave Encryption Key')); ?></label>
                                        <input type="text" value="<?php echo e($setting->flutterwave_encryption_key); ?>" name="flutterwave_encryption_key" class="form-control <?php $__errorArgs = ['flutterwave_encryption_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['flutterwave_encryption_key'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Is Live Key?')); ?></label>
                                        <select name="isLiveKey" class="form-control">
                                            <option value="1" <?php echo e($setting->isLiveKey == 1 ? 'selected' : ''); ?>><?php echo e(__('Yes')); ?></option>
                                            <option value="0" <?php echo e($setting->isLiveKey == 0 ? 'selected' : ''); ?>><?php echo e(__('No')); ?></option>
                                        </select>
                                        <?php $__errorArgs = ['flutterwave_encryption_key'];
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

                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Paystack Key')); ?></label>
                                        <input type="text" value="<?php echo e($setting->paystack_public_key); ?>" name="paystack_public_key" class="form-control <?php $__errorArgs = ['paystack_public_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['paystack_public_key'];
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
                                    <div class="row mt-4">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" value="<?php echo e(__('submit')); ?>" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="solid-justified-tab3">
                                <form action="<?php echo e(url('update_verification_setting')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="row">
                                        <div class="col-md-4 form-group">
                                            <label class="col-form-label"><?php echo e(__('User and doctor verification')); ?></label>
                                            <label class="cursor-pointer">
                                                <input type="checkbox" name="verification" class="custom-switch-input" value="1" <?php echo e($setting->verification == 1 ? 'checked' : ''); ?>>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="col-form-label"><?php echo e(__('Verification using email ?')); ?></label>
                                            <label class="cursor-pointer">
                                                <input type="checkbox" name="using_mail" class="custom-switch-input" value="1" <?php echo e($setting->using_mail == 1 ? 'checked' : ''); ?>>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                        <div class="col-md-4 form-group">
                                            <label class="col-form-label"><?php echo e(__('Verification using message ?')); ?></label>
                                            <label class="cursor-pointer">
                                                <input type="checkbox" name="using_msg" class="custom-switch-input" value="1" <?php echo e($setting->using_msg == 1 ? 'checked' : ''); ?>>
                                                <span class="custom-switch-indicator"></span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Twilio auth token')); ?></label>
                                        <input type="text" value="<?php echo e($setting->twilio_auth_token); ?>" name="twilio_auth_token" class="form-control <?php $__errorArgs = ['twilio_auth_token'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['twilio_auth_token'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('twilio account id')); ?></label>
                                        <input type="text" value="<?php echo e($setting->twilio_acc_id); ?>" name="twilio_acc_id" class="form-control <?php $__errorArgs = ['twilio_acc_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['twilio_acc_id'];
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

                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('twilio phone number')); ?></label>
                                        <input type="text" value="<?php echo e($setting->twilio_phone_no); ?>" name="twilio_phone_no" class="form-control <?php $__errorArgs = ['twilio_phone_no'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['twilio_phone_no'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('mail mailer')); ?></label>
                                        <input type="text" value="<?php echo e($setting->mail_mailer); ?>" name="mail_mailer" class="form-control <?php $__errorArgs = ['mail_mailer'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['mail_mailer'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('mail host')); ?></label>
                                        <input type="text" value="<?php echo e($setting->mail_host); ?>" name="mail_host" class="form-control <?php $__errorArgs = ['mail_host'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['mail_host'];
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

                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('mail port')); ?></label>
                                        <input type="text" value="<?php echo e($setting->mail_port); ?>" name="mail_port" class="form-control <?php $__errorArgs = ['mail_port'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['mail_port'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('mail username')); ?></label>
                                        <input type="text" value="<?php echo e($setting->mail_username); ?>" name="mail_username" class="form-control <?php $__errorArgs = ['mail_username'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['mail_username'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('mail password')); ?></label>
                                        <input type="text" value="<?php echo e($setting->mail_password); ?>" name="mail_password" class="form-control <?php $__errorArgs = ['mail_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['mail_password'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('mail encryption')); ?></label>
                                        <input type="text" value="<?php echo e($setting->mail_encryption); ?>" name="mail_encryption" class="form-control <?php $__errorArgs = ['mail_encryption'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['mail_encryption'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('mail from address')); ?></label>
                                        <input type="text" value="<?php echo e($setting->mail_from_address); ?>" name="mail_from_address" class="form-control <?php $__errorArgs = ['mail_from_address'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['mail_from_address'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('mail from name')); ?></label>
                                        <input type="text" value="<?php echo e($setting->mail_from_name); ?>" name="mail_from_name" class="form-control <?php $__errorArgs = ['mail_from_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['mail_from_name'];
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
                                    <div class="row mt-4">
                                        <div class="col-md-12 text-right">
                                            <input type="submit" value="<?php echo e(__('submit')); ?>" class="btn btn-primary">
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="solid-justified-tab5">
                                <form action="<?php echo e(url('update_content')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <label for="app_id" class="col-form-label"> <?php echo e(__('Website Banner Image')); ?></label>
                                            <div class="avatar-upload avatar-box avatar-box-left">
                                                <div class="avatar-edit">
                                                    <input type='file' id="image4" name="banner_image" accept=".png, .jpg, .jpeg" />
                                                    <label for="image4"></label>
                                                </div>
                                                <div class="avatar-preview">
                                                    <div id="imagePreview4" style="background-image: url(<?php echo e('images/upload/'.$setting->banner_image); ?>);">
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $__errorArgs = ['banner_image'];
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
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="col-form-label"><?php echo e(__('Banner URL')); ?></label>
                                                <input type="text" name="banner_url" required class="form-control <?php $__errorArgs = ['banner_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($setting->banner_url); ?>">
                                                <?php $__errorArgs = ['banner_url'];
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
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Play Store URL')); ?></label>
                                        <input type="url" name="playstore" required class="form-control <?php $__errorArgs = ['playstore'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($setting->playstore); ?>">
                                        <?php $__errorArgs = ['playstore'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('App Store URL')); ?></label>
                                        <input type="url" name="appstore" required class="form-control <?php $__errorArgs = ['appstore'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($setting->appstore); ?>">
                                        <?php $__errorArgs = ['appstore'];
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

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-5"><?php echo e(__('save')); ?></button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="solid-justified-tab6">
                                <form action="<?php echo e(url('update_notification')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label class="col-form-label"><?php echo e(__('Send Mail To Patient?')); ?></label>
                                        <label class="cursor-pointer">
                                            <input type="checkbox" name="patient_mail" class="custom-switch-input" value="1" <?php echo e($setting->patient_mail == 1 ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label"><?php echo e(__('Send Mail To Doctor?')); ?></label>
                                        <label class="cursor-pointer">
                                            <input type="checkbox" name="doctor_mail" class="custom-switch-input" value="1" <?php echo e($setting->doctor_mail == 1 ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label"><?php echo e(__('Send Push Notification To Patient?')); ?></label>
                                        <label class="cursor-pointer">
                                            <input type="checkbox" name="patient_notification" class="custom-switch-input" value="1" <?php echo e($setting->patient_notification == 1 ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="col-form-label"><?php echo e(__('Send Push Notification To Doctor?')); ?></label>
                                        <label class="cursor-pointer">
                                            <input type="checkbox" name="doctor_notification" class="custom-switch-input" value="1" <?php echo e($setting->doctor_notification == 1 ? 'checked' : ''); ?>>
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                    </div>
                                </div>
                                <label class="mt-5 text-primary" class="col-form-label"><?php echo e(__('For Patient :: ')); ?></label>

                                <div class="form-group">
                                    <label class="col-form-label"><?php echo e(__('App ID')); ?></label>
                                    <input type="text" value="<?php echo e($setting->patient_app_id); ?>" name="patient_app_id" class="form-control <?php $__errorArgs = ['patient_app_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['patient_app_id'];
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
                                <div class="form-group">
                                    <label class="col-form-label"><?php echo e(__('Auth key')); ?></label>
                                    <input type="text" value="<?php echo e($setting->patient_auth_key); ?>" name="patient_auth_key" class="form-control <?php $__errorArgs = ['patient_auth_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['patient_auth_key'];
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
                                <div class="form-group">
                                    <label class="col-form-label"><?php echo e(__('API key')); ?></label>
                                    <input type="text" value="<?php echo e($setting->patient_api_key); ?>" name="patient_api_key" class="form-control <?php $__errorArgs = ['patient_api_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                    <?php $__errorArgs = ['patient_api_key'];
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
                                <label class="mt-5 text-primary" class="col-form-label"><?php echo e(__('For Doctor :: ')); ?></label>
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('App ID')); ?></label>
                                        <input type="text" value="<?php echo e($setting->doctor_app_id); ?>" name="doctor_app_id" class="form-control <?php $__errorArgs = ['doctor_app_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['doctor_app_id'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Auth key')); ?></label>
                                        <input type="text" value="<?php echo e($setting->doctor_auth_key); ?>" name="doctor_auth_key" class="form-control <?php $__errorArgs = ['doctor_auth_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['doctor_auth_key'];
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

                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('API key')); ?></label>
                                        <input type="text" value="<?php echo e($setting->doctor_api_key); ?>" name="doctor_api_key" class="form-control <?php $__errorArgs = ['doctor_api_key'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['doctor_api_key'];
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
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-5"><?php echo e(__('save')); ?></button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="solid-justified-tab8">
                                <form action="<?php echo e(url('update_static_page')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Privacy Policy')); ?></label>
                                        <textarea name="privacy_policy" class="form-control summernote <?php $__errorArgs = ['privacy_policy'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($setting->privacy_policy); ?></textarea>
                                        <?php $__errorArgs = ['privacy_policy'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('About Us')); ?></label>
                                        <textarea name="about_us" class="form-control summernote <?php $__errorArgs = ['about_us'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"><?php echo e($setting->about_us); ?></textarea>
                                        <?php $__errorArgs = ['about_us'];
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
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-5"><?php echo e(__('save')); ?></button>
                                    </div>
                                </form>
                            </div>

                            <div class="tab-pane" id="solid-justified-tab9">
                                <form action="<?php echo e(url('update_video_call_setting')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Agora App Id')); ?></label>
                                        <input name="agora_app_id" class="form-control <?php $__errorArgs = ['agora_app_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($setting->agora_app_id); ?>">
                                        <?php $__errorArgs = ['agora_app_id'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Agora App Certificate')); ?></label>
                                        <input name="agora_app_certificate" class="form-control <?php $__errorArgs = ['agora_app_certificate'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e($setting->agora_app_certificate); ?>">
                                        <?php $__errorArgs = ['agora_app_certificate'];
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
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary mt-5"><?php echo e(__('save')); ?></button>
                                    </div>
                                </form>
                            </div>
                        <?php endif; ?>

                        <div class="tab-pane <?php echo e($setting->license_verify == 0 ? ' show active' : ''); ?>" id="solid-justified-tab7">
                            <form action="<?php echo e(url('update_licence_setting')); ?>" method="POST">
                                <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('License Code')); ?></label>
                                        <input type="text" required <?php echo e($setting->license_verify == 1 ? 'disabled' : ''); ?> value="<?php echo e($setting->license_code); ?>" name="license_code" class="form-control <?php $__errorArgs = ['license_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['license_code'];
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
                                    <div class="form-group">
                                        <label class="col-form-label"><?php echo e(__('Client Name')); ?></label>
                                        <input type="text" required <?php echo e($setting->license_verify == 1 ? 'disabled' : ''); ?> value="<?php echo e($setting->client_name); ?>" name="client_name" class="form-control <?php $__errorArgs = ['client_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                                        <?php $__errorArgs = ['client_name'];
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
                                    <div class="text-center">
                                        <button type="submit" <?php echo e($setting->license_verify == 1 ? 'disabled' : ''); ?> class="btn btn-primary mt-5"><?php echo e(__('save')); ?></button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
<script>
    $(document).ready(function()
    {
        function readURL4(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview4').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview4').hide();
                    $('#imagePreview4').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#image4").change(function () {
            readURL4(this);
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'setting'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/superAdmin/setting/setting.blade.php ENDPATH**/ ?>