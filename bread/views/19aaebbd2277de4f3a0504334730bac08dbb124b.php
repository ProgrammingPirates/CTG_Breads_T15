<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <?php
                $app_logo = App\Models\Setting::first();
            ?>
            <a href="<?php echo e(url('/home')); ?>">
                <img src="<?php echo e($app_logo->logo); ?>" width="180" alt="Logo">
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="<?php echo e(url('/home')); ?>">
                <img src="<?php echo e(App\Models\Setting::find(1)->favicon); ?>" width="50" height="50" alt="Logo">
            </a>
        </div>
        <ul class="sidebar-menu">
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superadmin_dashboard')): ?>
              <li class="<?php echo e($activePage == 'home' ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('home')); ?>">
                      <i class="fas fa-home"></i>
                      <span><?php echo e(__('Dashboard')); ?></span>
                  </a>
              </li>
          <?php endif; ?>

          
            <?php if(auth()->user()->hasRole('doctor')): ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doctor_home')): ?>
                  <li class="<?php echo e($activePage == 'home' ? 'active' : ''); ?>">
                      <a href="<?php echo e(url('doctor_home')); ?>">
                          <i class="fas fe fe-home"></i>
                          <span><?php echo e(__('Dashboard')); ?></span>
                      </a>
                  </li>
              <?php endif; ?>
            <?php endif; ?>


        <?php if(auth()->user()->hasRole('laboratory')): ?>
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('laboratory_home')): ?>
                <li class="<?php echo e($activePage == 'pathologist' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('pathologist_home')); ?>">
                        <i class="fas fe fe-home"></i>
                        <span><?php echo e(__('Dashboard')); ?></span>
                    </a>
                </li>
            <?php endif; ?>
        <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('appointment_access')): ?>
                <li class="<?php echo e($activePage == 'appointment' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('appointment')); ?>">
                            <i class="far fa-calendar-check"></i>
                        <span><?php echo e(__('appointment')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('treatment_access')): ?>
                <li class="<?php echo e($activePage == 'treatments' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('treatments')); ?>">
                        <i class="fas fa-stethoscope"></i>
                        <span><?php echo e(__('Treatments')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('category_access')): ?>
                <li class="<?php echo e($activePage == 'category' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('category')); ?>">
                    <i class="far fa-list-alt"></i>
                    <span><?php echo e(__('category')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('expertise_access')): ?>
                <li class="<?php echo e($activePage == 'expertise' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('expertise')); ?>">
                        <i class="fas fa-angle-right"></i>
                    <span><?php echo e(__('expertise')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('medicine_category_access')): ?>
                <li class="<?php echo e($activePage == 'medicineCategory' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('medicineCategory')); ?>">
                        <i class="fas fa-tablets"></i>
                    <span><?php echo e(__('medicine Category')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('hospital_access')): ?>
                <li class="<?php echo e($activePage == 'hospital' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('hospital')); ?>">
                        <i class="far fa-hospital"></i>
                    <span><?php echo e(__('hospital')); ?></span>
                    </a>
                </li>
            <?php endif; ?> -->

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doctor_access')): ?>
                <li class="<?php echo e($activePage == 'doctor' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('doctor')); ?>">
                        <i class="fas fa-user-md"></i>
                        <span><?php echo e(__('Counsellor')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

            <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pharmacy_access')): ?>
                <li class="<?php echo e($activePage == 'pharmacy' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('pharmacy')); ?>">
                        <i class="fas fa-prescription-bottle"></i>
                        <span><?php echo e(__('pharmacy')); ?></span>
                    </a>
                </li>
            <?php endif; ?> -->

            <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lab_access')): ?>
                <li class="<?php echo e($activePage == 'lab' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('laboratory')); ?>">
                        <i class="fas fa-flask"></i>
                        <span><?php echo e(__('Laboratory')); ?></span>
                    </a>
                </li>
            <?php endif; ?> -->

            <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pathology_category_access')): ?>
                <li class="<?php echo e($activePage == 'pathology_category' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('pathology_category')); ?>">
                    <i class="fas fa-vials"></i>
                    <span><?php echo e(__('Pathology Categoryss')); ?></span>
                </a>
                </li>
            <?php endif; ?> -->

            <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('radiology_category_access')): ?>
                <li class="<?php echo e($activePage == 'radiology_category' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('radiology_category')); ?>">
                        <i class="fab fa-xing-square"></i>
                        <span><?php echo e(__('radiology Category')); ?></span>
                    </a>
                </li>
            <?php endif; ?> -->
<!-- 
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pathology_access')): ?>
                <li class="<?php echo e($activePage == 'pathology' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('pathology')); ?>">
                        <i class="fas fa-vials"></i>
                        <span><?php echo e(__('pathology')); ?></span>
                    </a>
                </li>
            <?php endif; ?> -->

            <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('radiology_access')): ?>
                <li class="<?php echo e($activePage == 'radiology' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('radiology')); ?>">
                        <i class="fas fa-x-ray"></i>
                        <span><?php echo e(__('radiology')); ?></span>
                    </a>
                </li>
            <?php endif; ?> -->

            <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('test_report')): ?>
                <li class="<?php echo e($activePage == 'test_report' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('test_reports')); ?>">
                        <i class="fas fa-file"></i>
                        <span><?php echo e(__('Test Reports')); ?></span>
                    </a>
                </li>
            <?php endif; ?> -->

            <!-- <?php if(auth()->user()->hasRole('laboratory')): ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lab_commission')): ?>
                    <li class="<?php echo e($activePage == 'commission' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('lab_commission')); ?>">
                            <i class="fas fa-percentage"></i>
                            <span><?php echo e(__('Lab Commission')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('lab_timeslot')): ?>
                    <li class="<?php echo e($activePage == 'schedule' ? 'active' : ''); ?>">
                        <a href="<?php echo e(url('lab_timeslot')); ?>">
                            <i class="fas fa-hourglass-half"></i>
                            <span><?php echo e(__('Lab Timeslot')); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endif; ?> -->

            <?php if(auth()->user()->can('patient_access') || auth()->user()->can('admin_user_access')): ?>
            
              <li class="<?php echo e($activePage == 'patients' ? 'active' : ''); ?> || <?php echo e($activePage == 'admin_users' ? 'active' : ''); ?>">
                <a href="javascript:void(0)" class="nav-link has-dropdown">
                    <i class="fas fa-user-injured"></i>
                    <span><?php echo e(__('Users')); ?></span>
                </a>
                <ul class="dropdown-menu">
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin_user_access')): ?>
                        <li class="<?php echo e($activePage == 'admin_users' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(url('admin_users')); ?>"><?php echo e(__('Admin users')); ?></a>
                        </li>
                    <?php endif; ?>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('patient_access')): ?>
                        <li class="<?php echo e($activePage == 'patients' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(url('patient')); ?>"><?php echo e(__('Patient')); ?></a>
                        </li>
                    <?php endif; ?>
                </ul>
              </li>
              <?php endif; ?>
            
<!-- 
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('blog_access')): ?>
                <li class="<?php echo e($activePage == 'blog' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('blog')); ?>">
                        <i class="fas fa-clipboard-list"></i>
                    <span><?php echo e(__('blog')); ?></span>
                    </a>
                </li>
            <?php endif; ?> -->

            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('banner_access')): ?>
                <li class="<?php echo e($activePage == 'banner' ? 'active' : ''); ?>">
                    <a href="<?php echo e(url('banner')); ?>">
                        <i class="fas fa-angle-double-right"></i>
                    <span><?php echo e(__('banner')); ?></span>
                    </a>
                </li>
            <?php endif; ?>

          <!-- <?php if(Gate::check('subscription_access') || Gate::check('subscription_history')): ?>
              <?php if(auth()->user()->hasRole('doctor')): ?>
                  <?php
                        $doctor = App\Models\Doctor::where('user_id',auth()->user()->id)->first();
                  ?>
                  <?php if($doctor->based_on == 'subscription'): ?>
                    <li class="<?php echo e($activePage == 'subscription' ? 'active' : ''); ?> || <?php echo e($activePage == 'subscription_history' ? 'active' : ''); ?>">
                        <a href="javascript:void(0)" class="nav-link has-dropdown"><i class="fas fa-file-image"></i>
                            <span><?php echo e(__('subscriptions')); ?></span> -->
                        <!-- </a>
                        <ul class="dropdown-menu">
                            <li class="<?php echo e($activePage == 'subscription' ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(url('subscription')); ?>"><?php echo e(__('subscription')); ?></a>
                            </li>
                            <li class="<?php echo e($activePage == 'subscription_history' ? 'active' : ''); ?>">
                                <a class="nav-link" href="<?php echo e(url('subscription_history')); ?>"><?php echo e(__('subscription history')); ?></a>
                            </li>
                        </ul>
                    </li>
                  <?php endif; ?>
                  <?php if($doctor->based_on == 'commission'): ?>
                      <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('commission_details')): ?>
                      <li class="<?php echo e($activePage == 'commission' ? 'active' : ''); ?>">
                              <a href="<?php echo e(url('commission')); ?>">
                                  <i class="far fa-money-bill-alt"></i>
                              <span><?php echo e(__('Commission details')); ?></span>
                              </a>
                          </li>
                      <?php endif; ?>
                  <?php endif; ?> -->
              <!-- <?php else: ?>
                <li class="<?php echo e($activePage == 'subscription' ? 'active' : ''); ?> || <?php echo e($activePage == 'subscription_history' ? 'active' : ''); ?>">
                    <a href="javascript:void(0)" class="nav-link has-dropdown"><i class="fas fa-file-image"></i>
                        <span><?php echo e(__('subscriptions')); ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="<?php echo e($activePage == 'subscription' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(url('subscription')); ?>"><?php echo e(__('subscription')); ?></a>
                        </li>
                        <li class="<?php echo e($activePage == 'subscription_history' ? 'active' : ''); ?>">
                            <a class="nav-link" href="<?php echo e(url('subscription_history')); ?>"><?php echo e(__('subscription history')); ?></a>
                        </li>
                    </ul>
                </li>
              <?php endif; ?>
          <?php endif; ?> -->

          <?php if(Gate::check('doctor_review')): ?>
              <?php if(auth()->user()->hasRole('doctor')): ?>
                  <li class="<?php echo e($activePage == 'review' ? 'active' : ''); ?>">
                      <a href="<?php echo e(url('doctor_review')); ?>">
                          <i class="fas fa-star"></i>
                      <span><?php echo e(__('Reviews')); ?></span>
                      </a>
                  </li>
              <?php endif; ?>
          <?php endif; ?>

          <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('offer_access')): ?>
              <li class="<?php echo e($activePage == 'offer' ? 'active' : ''); ?>">
                <a href="<?php echo e(url('offer')); ?>">
                      <i class="fas fa-percentage"></i>
                    <span><?php echo e(__('Offers')); ?></span>
                </a>
              </li>
          <?php endif; ?> -->

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('email_template_access')): ?>
              <li class="<?php echo e($activePage == 'template' ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('notification_template')); ?>">
                      <i class="far fa-envelope"></i>
                      <span><?php echo e(__('Notification template')); ?></span>
                  </a>
              </li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('role_access')): ?>
              <li class="<?php echo e($activePage == 'role' ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('role')); ?>">
                      <i class="fas fa-user-tag"></i>
                      <span><?php echo e(__('Role and permissions')); ?></span>
                  </a>
              </li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('language_access')): ?>
              <li class="<?php echo e($activePage == 'language' ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('language')); ?>">
                      <i class="fas fa-language"></i>
                      <span><?php echo e(__('Language')); ?></span>
                  </a>
              </li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('report_access')): ?>
              <li class="<?php echo e($activePage == 'user_report' ? 'active' : ''); ?> || <?php echo e($activePage == 'doctor_report' ? 'active' : ''); ?>">
                <a href="javascript:void(0)" class="nav-link has-dropdown">
                <i class="fas fa-file-alt"></i>
                    <span><?php echo e(__('Reports')); ?></span>
                </a>
                <ul class="dropdown-menu">
                    <li class="<?php echo e($activePage == 'user_report' ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('user_report')); ?>"><?php echo e(__('User Report')); ?></a>
                    </li>
                    <li class="<?php echo e($activePage == 'doctor_report' ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(url('doctor_report')); ?>"><?php echo e(__('Doctor Report')); ?></a>
                    </li>
                </ul>
              </li>
          <?php endif; ?>

          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superadmin_setting')): ?>
              <li class="<?php echo e($activePage == 'setting' ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('setting')); ?>">
                        <i class="fas fa-cogs"></i>
                      <span><?php echo e(__('settings')); ?></span>
                  </a>
              </li>
          <?php endif; ?>

          
          <?php if(auth()->user()->hasRole('doctor')): ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('doctor_schedule')): ?>
                  <li class="<?php echo e($activePage == 'schedule' ? 'active' : ''); ?>">
                      <a href="<?php echo e(url('schedule')); ?>">
                          <i class="fas fa-hourglass-start"></i>
                          <span><?php echo e(__('Schedule Timings')); ?></span>
                      </a>
                  </li>
              <?php endif; ?>
          <?php endif; ?>
          <?php if(auth()->user()->hasRole('doctor')): ?>
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('zoom_setting')): ?>
              <li class="<?php echo e($activePage == 'setting' ? 'active' : ''); ?>">
                  <a href="<?php echo e(url('list')); ?>">
                    <i class="fas fa-cog"></i>
                    <span><?php echo e(__('Zoom Setting')); ?></span>
                  </a>
              </li>
          <?php endif; ?>
        <?php endif; ?>

          
          <?php if(auth()->user()->hasRole('pharmacy')): ?>
              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pharmacy_dashboard')): ?>
                  <li class="<?php echo e($activePage == 'home' ? 'active' : ''); ?>">
                      <a href="<?php echo e(url('pharmacy_home')); ?>">
                          <i class="fas fe fe-home"></i>
                          <span><?php echo e(__('Dashboard')); ?></span>
                      </a>
                  </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('medicine_access')): ?>
                  <li class="<?php echo e($activePage == 'medicine' ? 'active' : ''); ?>">
                      <a href="<?php echo e(url('medicines')); ?>">
                          <i class="fas fa-capsules"></i>
                          <span><?php echo e(__('Medicine')); ?></span>
                      </a>
                  </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pharmacy_purchase_medicine')): ?>
                  <li class="<?php echo e($activePage == 'purchase' ? 'active' : ''); ?>">
                      <a href="<?php echo e(url('purchased_medicines')); ?>">
                          <i class="far fa-money-bill-alt"></i>
                          <span><?php echo e(__('Purchased Medicines')); ?></span>
                      </a>
                  </li>
              <?php endif; ?>

              <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pharmacy_schedule')): ?>
                  <li class="<?php echo e($activePage == 'pharmacy_schedule' ? 'active' : ''); ?>">
                      <a href="<?php echo e(url('pharmacy_schedule')); ?>">
                          <i class="fas fa-hourglass-start"></i>
                          <span><?php echo e(__('Schedule Timings')); ?></span>
                      </a>
                  </li>
              <?php endif; ?>

              <!-- <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('pharmacy_commission_access')): ?>
                  <li class="<?php echo e($activePage == 'commission' ? 'active' : ''); ?>">
                      <a href="<?php echo e(url('pharmacyCommission')); ?>">
                          <i class="far fa-money-bill-alt"></i>
                          <span><?php echo e(__('Commission Details')); ?></span>
                      </a>
                  </li>
              <?php endif; ?> -->
          <?php endif; ?>
      </ul>
    </aside>
</div>
<?php /**PATH C:\xampp\htdocs\doctro\resources\views/layout/partials/sidebar.blade.php ENDPATH**/ ?>