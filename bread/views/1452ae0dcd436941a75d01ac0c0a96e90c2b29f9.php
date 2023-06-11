<?php $__env->startSection('title', __('Admin dashboard')); ?>

<?php $__env->startSection('content'); ?>
    <section class="section">
        <?php echo $__env->make('layout.breadcrumb',[
            'title' => __('Dashboard'),
        ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-primary">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h4><?php echo e(__('Total Patients')); ?></h4>
                      </div>
                      <div class="card-body">
                        <h3><?php echo e($totalUsers); ?></h3>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-danger">
                      <i class="far fa-newspaper"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h6 class="text-muted"><?php echo e(__('Appointment')); ?></h6>
                      </div>
                      <div class="card-body">
                        <h3><?php echo e($totalAppointments); ?></h3>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                  <div class="card card-statistic-1">
                    <div class="card-icon bg-warning">
                      <i class="far fa-file"></i>
                    </div>
                    <div class="card-wrap">
                      <div class="card-header">
                        <h6 class="text-muted"><?php echo e(__('Counsllors')); ?></h6>
                      </div>
                      <div class="card-body">
                        <h3><?php echo e($totalDoctors); ?></h3>
                      </div>
                    </div>
                  </div>
                </div>               
              </div>
        </div>
        <div class="row">
          <div class="col-md-12 col-lg-6">
              <div class="card card-chart">
                  <div class="card-header">
                      <h4 class="card-title"><?php echo e(__('Appointments')); ?></h4>
                  </div>
                  <div class="card-body">
                      <canvas id="orderChart"></canvas>
                      <input type="hidden" name="years" value="<?php echo e($orderCharts['label']); ?>">
                      <input type="hidden" name="data" value="<?php echo e($orderCharts['data']); ?>">
                  </div>
              </div>

          </div>
          <div class="col-md-12 col-lg-6">
              <div class="card card-chart">
                  <div class="card-header">
                      <h4 class="card-title"><?php echo e(__('Doctor - patients')); ?></h4>
                  </div>
                  <div class="card-body">
                      <canvas id="usersChart"></canvas>
                      <input type="hidden" name="users" value="<?php echo e($users['user']); ?>">
                      <input type="hidden" name="doctors" value="<?php echo e($users['doctor']); ?>">
                      <input type="hidden" name="month" value="<?php echo e($users['month']); ?>">
                  </div>
              </div>
          </div>
      </div>
      <div class="row">
          <div class="col-md-6 d-flex">
              <div class="card card-table flex-fill">
                  <div class="card-header">
                      <h4 class="card-title"><?php echo e(__('Doctors List')); ?></h4>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table class="table datatable table-hover table-center mb-0">
                              <thead>
                                  <tr>
                                      <th><?php echo e(__('Doctor Name')); ?></th>
                                      <th><?php echo e(__('Doctor Base on')); ?></th>
                                      <th><?php echo e(__('Treatments')); ?></th>
                                      <th><?php echo e(__('Reviews')); ?></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $__currentLoopData = $allDoctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <tr>
                                          <td>
                                            <a href="<?php echo e(url('doctor/'.$doctor->id.'/'.Str::slug($doctor->name).'/dashboard')); ?>" class="avatar avatar-sm mr-2">
                                                <img class="avatar-img rounded-circle" src="<?php echo e($doctor->full_image); ?>" alt="User Image"></a>
                                            <a href="<?php echo e(url('doctor/'.$doctor->id.'/'.Str::slug($doctor->name).'/dashboard')); ?>"><?php echo e($doctor->name); ?></a>
                                          </td>
                                          <td><?php echo e($doctor->based_on); ?></td>
                                          <td>
                                              <?php if(isset($doctor->treatment['name'])): ?>
                                                  <?php echo e($doctor->treatment['name']); ?>

                                              <?php endif; ?>
                                          </td>
                                          <td>
                                              <?php for($i = 1; $i < 6; $i++): ?>
                                              <?php if($i <= $doctor->rate): ?>
                                                  <i class="fe fe-star text-warning">
                                              <?php else: ?>
                                                  <i class="fe fe-star-o text-secondary">
                                              <?php endif; ?>
                                          <?php endfor; ?>
                                          </td>
                                      </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-6 d-flex">
              <div class="card  card-table flex-fill">
                  <div class="card-header">
                      <h4 class="card-title"><?php echo e(__('Latest Patients List')); ?></h4>
                  </div>
                  <div class="card-body">
                      <div class="table-responsive">
                          <table id="dataTable" class="datatable table table-hover table-center mb-0">
                              <thead>
                                  <tr>
                                      <th><?php echo e(__('Patient Name')); ?></th>
                                      <th><?php echo e(__('Phone')); ?></th>
                                      <th><?php echo e(__('Email')); ?></th>
                                      <th><?php echo e(__('Gender')); ?></th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php $__currentLoopData = $allUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allUser): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                      <tr>
                                          <td>
                                              <a href="<?php echo e(url('patient/'.$allUser->id)); ?>" class="avatar avatar-sm mr-2">
                                                  <img class="avatar-img rounded-circle" src="<?php echo e($allUser->fullImage); ?>" alt="User Image"></a>
                                              <a href="<?php echo e(url('patient/'.$allUser->id)); ?>"><?php echo e($allUser->name); ?> </a>
                                          </td>
                                          <td>
                                              <a href="tel:<?php echo e($allUser->phone); ?>"><?php echo e($allUser->phone); ?></a>
                                          </td>
                                          <td>
                                                <a href="mailto:<?php echo e($allUser->email); ?>">
                                                    <span class="text_transform_none"><?php echo e($allUser->email); ?></span>
                                                </a>
                                          </td>
                                          <td><?php echo e($allUser->gender); ?></td>
                                      </tr>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <!-- /Patient Activity -->
          </div>
      </div>
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(url('assets_admin/js/chart.min.js')); ?>"></script>
    <script src="<?php echo e(url('assets_admin/js/chart.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout_admin',['activePage' => 'home'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/home.blade.php ENDPATH**/ ?>