<!DOCTYPE html>
<html lang="en">
<head>
    <script src="<?php echo e(url('assets_admin/js/jquery.min.js')); ?>"></script>
    <?php echo $__env->make('layout.partials.head_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body>
    <div id="app">
        <?php if(auth::check()): ?>
        
        <div class="main-wrapper">
            <?php if(auth()->user()->verify == 1): ?>
                    <?php echo $__env->make('layout.partials.navbar_admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php echo $__env->make('layout.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php endif; ?>
            <div class="main-content">
                <?php if(auth()->user()->hasRole('doctor')): ?>
                    <?php
                        $doctor = App\Models\Doctor::where('user_id',auth()->user()->id)->first();
                    ?>
                        <?php if($doctor->based_on == 'subscription'): ?>
                            <?php
                                $subscription_status = App\Models\Doctor::where('user_id',auth()->user()->id)->first()->subscription_status;
                            ?>
                            <?php if($subscription_status == 1): ?>
                                <?php echo $__env->yieldContent('content'); ?>
                                <?php echo $__env->yieldContent('subscription'); ?>
                            <?php else: ?>
                                <script>
                                    var url =  window.location.origin+window.location.pathname;
                                    var to = url.lastIndexOf('/');
                                    to = to == -1 ? url.length : to;
                                    url2 = url.substring(0, to);
                                    var a = $('input[name="base_url"]').val()+'/subscription';
                                    if (window.location.origin + window.location.pathname != $('input[name="base_url"]').val() + '/subscription'
                                        &&
                                    url2 != $('input[name="base_url"]').val() + '/subscription_purchase'
                                    )
                                    {
                                        setTimeout(() => {
                                        Swal.fire({
                                        icon: 'info',
                                        title: 'Oops...',
                                        text: 'Your Subscription plan is Expire!',
                                        onClose: () => {
                                            window.location.replace(a);
                                            }
                                        })
                                    }, 1000);
                                    }
                                </script>
                                    <?php echo $__env->yieldContent('subscription'); ?>
                            <?php endif; ?>
                        <?php else: ?>
                            <?php echo $__env->yieldContent('content'); ?>
                            <?php echo $__env->yieldContent('subscription'); ?>
                        <?php endif; ?>
                <?php elseif(auth()->user()->hasRole('super admin')): ?>
                    <?php if(App\Models\Setting::find(1)->license_verify == 1): ?>
                            <?php echo $__env->yieldContent('content'); ?>
                            <?php echo $__env->yieldContent('setting'); ?>
                    <?php else: ?>
                        <script>
                            var a = $('input[name=base_url]').val()+'/setting';
                            if (window.location.origin + window.location.pathname != $('input[name=base_url]').val() + '/setting')
                            {
                                setTimeout(() => {
                                    Swal.fire({
                                    icon: 'info',
                                    title: 'Oops...',
                                    text: 'Your License has been deactivated...!!',
                                    onClose: () => {
                                        window.location.replace(a);
                                        }
                                    })
                                }, 1000);
                            }
                        </script>
                        <?php echo $__env->yieldContent('setting'); ?>
                    <?php endif; ?>
                <?php else: ?>
                    <?php echo $__env->yieldContent('content'); ?>
                <?php endif; ?>
        <?php else: ?>
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <?php endif; ?>
            <?php echo $__env->make('layout.partials.footer_admin-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
</body>

</html>
<?php /**PATH C:\xampp\htdocs\doctro\resources\views/layout/mainlayout_admin.blade.php ENDPATH**/ ?>