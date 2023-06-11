<div class="page-header sticky-header d-flex align-items-center">
    <div class="container-xl d-flex">

        <nav class="navbar content w-100 m-auto navbar-light navbar-expand-xl">
            <a class="navbar-brand order-xl-1 order-2" href="<?php echo e(url('/')); ?>">
                <img src="<?php echo e(url('images/upload/'.$setting->company_logo)); ?>" width="160px" height = "25px" alt="">
            </a>

            <button class="navbar-toggler  order-xl-2 order-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#navbarOffcanvasLg" aria-controls="navbarOffcanvasLg">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="offcanvas offcanvas-start order-xl-2 order-1 " tabindex="-1" id="navbarOffcanvasLg" aria-labelledby="navbarOffcanvasLgLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><?php echo e($setting->business_name); ?></h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav menubar  align-items-xl-center flex-grow-1">
                        <li class="nav-item nav-select <?php echo e($active_page == 'doctors' ? 'active' : ''); ?>">
                            <a class="nav-link menu-link d-flex flex-column" href="<?php echo e(url('show-doctors')); ?>"><?php echo e(__('Counsellor Chat')); ?>

                                <span><?php echo e(__('Meeting with Counsellor')); ?></span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>           
            <div class="d-flex align-items-center login avtar-wrapper order-xl-3 order-4 dropdown ms-auto">
                
                <?php if(auth()->check()): ?>
                    <a class="nav-link menu-link drop-link dropdown-toggle more-drop" href="javascript:void(0)" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"> 
                        <img src="<?php echo e(url('images/upload/'.auth()->user()->image)); ?>" class="rounded-circle avtar" alt="">
                    </a>
                    <ul class="dropdown-menu u-d profile-detail" aria-labelledby="offcanvasNavbarDropdown">
                        <li class="dropdown-item d-flex align-items-center">
                            <img src="<?php echo e(url('images/upload/'.auth()->user()->image)); ?>" class="rounded-circle avtar me-2" alt="">
                            <div>
                                <p><?php echo e(auth()->user()->name); ?></p>
                                <p class="text-muted"><?php echo e(__('Student')); ?></p>
                            </div>
                        </li>
                        <li><a class="dropdown-item " href="<?php echo e(url('user_profile')); ?>"><?php echo e(__('Dashboard')); ?></a>
                        </li>
                        <li><a class="dropdown-item"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" href="javascript:void(0)"><?php echo e(__('logout')); ?></a></li>
                    </ul>
                    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                        <?php echo csrf_field(); ?>
                    </form>
                <?php else: ?>
                    <ul class="navbar-nav menubar  align-items-xl-center flex-grow-1 ">
                        <li class="nav-item dropdown ms-xl-auto">
                            <a class="nav-link drop-link menu-link dropdown-toggle more-drop" href="javascript:void(0)" id="offcanvasNavbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?php echo e(__('For Providers')); ?></a>
                            <ul class="dropdown-menu u-d" aria-labelledby="offcanvasNavbarDropdown">
                                <li><a class="dropdown-item" target="_blank" href="<?php echo e(url('doctor/doctor_login')); ?>"><?php echo e(__('Login For Counsellor')); ?></a></li>
                                <li><a class="dropdown-item" href="<?php echo e(url('patient-login')); ?>"><?php echo e(__('Login For Student')); ?></a></li>
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>
              
               
            </div>
        </nav>
    </div>
</div><?php /**PATH C:\xampp\htdocs\bread\resources\views/layout/partials/navbar.blade.php ENDPATH**/ ?>