<!doctype html>
<html lang="en">

<head>
    <?php
        $setting = App\Models\Setting::first();
    ?>
    <meta charset="utf-8">

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(App\Models\Setting::find(1)->favicon); ?>">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <input type="hidden" name="base_url" value="<?php echo e(url('/')); ?>">

    <title><?php echo e($setting->business_name); ?> | <?php echo $__env->yieldContent('title'); ?></title>

    <?php echo $__env->make('layout.partials.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>
<body>
    <div id="loader">
        <div class="loader">
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="site-wrapper">
        <div class="page-wrapper <?php echo e($active_page == 'home' ? 'bg-white' : ''); ?>">
            <?php echo $__env->make('layout.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->make('layout.partials.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
    </div>
    <?php echo $__env->make('layout.partials.footer-scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <script>
        var rtl = $('.rtl_direction').val();
        if (rtl == 'true')
            rtl = true;
        else
            rtl = false;
        
        $('.slick-carousel').slick({
                infinite: false,
                slidesToShow: 4, // Shows a three slides at a time
                slidesToScroll: 1, // When you click an arrow, it scrolls 1 slide at a time
                arrows: true, // Adds arrows to sides of slider
                dots: false, // Adds the dots on the bottom
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                    {
                        breakpoint: 478,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
            $('.single-item').slick({
                infinite: true,
                autoplay: true,
                autoplaySpeed: 750,
                dots: true,
                rtl: rtl,
                slidesToShow: 3, // Shows a three slides at a time
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 1,
                        },
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2,
                        },
                    },
                    {
                        breakpoint: 612,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
    </script>
</body>
</html><?php /**PATH C:\xampp\htdocs\bread\resources\views/layout/mainlayout.blade.php ENDPATH**/ ?>