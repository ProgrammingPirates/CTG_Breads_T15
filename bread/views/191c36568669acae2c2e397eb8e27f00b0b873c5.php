<div class="navbar-bg" data-background="<?php echo e(url('assets/img/navbar_header.jpg')); ?>">
<span class="mask bg-gradient-dark opacity-7"></span>
</div>
<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="javascript:void(0)" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
  </form>
  <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
    <?php echo csrf_field(); ?>
  </form>
  <ul class="navbar-nav navbar-right">
  
    
    <li class="dropdown"><a href="javascript:void(0)" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
      <div class="d-sm-none d-lg-inline-block"><?php echo e(auth()->user()->name); ?></div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <?php if(auth()->user()->hasRole('super admin')): ?>
        <a href="<?php echo e(url('profile')); ?>" class="dropdown-item has-icon">
          <i class="far fa-user"></i> <?php echo e(__('Profile')); ?>

        </a>
          <a href="<?php echo e(url('setting')); ?>" class="dropdown-item has-icon">
            <i class="fas fa-cog"></i> <?php echo e(__('Settings')); ?>

          </a>
        <?php endif; ?>
        <?php if(auth()->user()->hasRole('pharmacy')): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pharmacy_profile')): ?>
              <a class="dropdown-item has-icon" href="<?php echo e(url('pharmacy_profile')); ?>"><i class="far fa-user"></i> <?php echo e(__('Profile')); ?></a>
            <?php endif; ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pharmacy_profile')): ?>
                <a class="dropdown-item has-icon" href="<?php echo e(url('changePassword')); ?>"><i class="fas fa-unlock-alt"></i> <?php echo e(__('change password')); ?></a>
            <?php endif; ?>
        <?php endif; ?>
        <?php if(auth()->user()->hasRole('doctor')): ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doctor_profile')): ?>
              <a class="dropdown-item" href="<?php echo e(url('doctor_profile')); ?>"><i class="far fa-user"></i> <?php echo e(__('Profile')); ?></a>
          <?php endif; ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doctor_profile')): ?>
              <a class="dropdown-item" href="<?php echo e(url('changePassword')); ?>"><i class="fas fa-unlock-alt"></i> <?php echo e(__('change password')); ?></a>
          <?php endif; ?>
      <?php endif; ?>
      <?php if(auth()->user()->hasRole('laboratory')): ?>
          <a class="dropdown-item" href="<?php echo e(url('lab_profile')); ?>"><i class="far fa-user"></i> <?php echo e(__('Profile')); ?></a>
          <a class="dropdown-item" href="<?php echo e(url('changePassword')); ?>"><i class="fas fa-unlock-alt"></i> <?php echo e(__('change password')); ?></a>
      <?php endif; ?>
        <div class="dropdown-divider"></div>
        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> <?php echo e(__('Logout')); ?>

        </a>
      </div>
    </li>
  </ul>
</nav>
<?php /**PATH C:\xampp\htdocs\doctro\resources\views/layout/partials/navbar_admin.blade.php ENDPATH**/ ?>