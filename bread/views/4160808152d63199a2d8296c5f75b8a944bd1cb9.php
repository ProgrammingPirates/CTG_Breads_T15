

<?php $__env->startSection('title',auth()->user()->name.__(' profile')); ?>

<?php $__env->startSection('content'); ?>
    <div class="site-body">
        <div class="full-content">
            <div>
                <div class="content mx-auto">
                    <div class="ps-xl-0 ps-3 mt-3">
                        <h3><?php echo e(__('Student Dashboard')); ?></h3>
                        <?php if($errors->any()): ?>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <?php echo e($item); ?>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        <?php if(Session::has('error')): ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?php echo e(Session::get('error')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="content mx-auto">
                <div class="row">
                    <div class="col-md-3">
                        <div class="m-2 profile-side-bar pt-3 pb-2 h-100 bg-white">
                            <div class="edit-profile d-flex flex-column">
                                <img src="<?php echo e(url('images/upload/'.auth()->user()->image)); ?>" class="rounded-circle mx-auto my-3" alt="">
                                <h6 class="mb-3 text-center"><?php echo e(auth()->user()->name); ?></h6>
                            </div>
                            <ul class="edit-profile-menu pb-2 my-2 position-relative">
                                <li class="user-profile-link active" onclick="seeData('#user-dashboard')">
                                    <a href="javascript:void(0)" class="d-flex align-items-center">
                                        <i class='bx bxs-dashboard me-2'></i><?php echo e(__('Dashboard')); ?>

                                    </a>
                                </li>
                                <li class="user-profile-link" onclick="seeData('#user-test-report')">
                                    <a href="javascript:void(0)" class="d-flex align-items-center">
                                        <i class='bx bxs-report me-2'></i><?php echo e(__('Counslling Report')); ?>

                                    </a>
                                </li>
                                <li class="user-profile-link" onclick="seeData('#user-add')">
                                    <a href="javascript:void(0)" class="d-flex align-items-center">
                                        <i class='bx bxs-map me-2'></i><?php echo e(__('Student Address')); ?>

                                    </a>
                                </li>
                            
                                <li class="user-profile-link" onclick="seeData('#user-setting')">
                                    <a href="javascript:void(0)" class="d-flex align-items-center">
                                        <i class='bx bxs-cog me-2'></i><?php echo e(__('Profile Settings')); ?>

                                    </a>
                                </li>
                                <li class="user-profile-link" onclick="seeData('#user-changePass')">
                                    <a href="javascript:void(0)" class="d-flex align-items-center">
                                        <i class='bx bxs-lock me-2'></i><?php echo e(__('Change Password')); ?>

                                    </a>
                                </li>
                                <li class="slide">
                                    <a href="javascript:void(0)" class="d-flex align-items-center"></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="disp-block h-100" id="user-dashboard">
                            <div class="m-2 profile-side-bar p-3 pt-0 h-100 pb-2 bg-white">

                                <div class="single-nav">
                                    <ul class="d-flex justify-content-center border-bottom">
                                        <li class="d-flex text-center active">
                                            <a href="javascript:void(0)" onclick="seeData('#Appointments')" class="h-100 w-100"><?php echo e(__('Appointments')); ?></a></li>
                                        <li class="d-flex text-center">
                                            <a href="javascript:void(0)" class="h-100 w-100" onclick="seeData('#prescription')"><?php echo e(__('Prescriptions')); ?></a></li>
                                        <li class="d-flex text-center">
                                            <a href="javascript:void(0)" class="h-100 w-100" onclick="seeData('#Purchased_med')"><?php echo e(__('Purchased Medicines')); ?></a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <div class="disp-block" id="Appointments">
                                        <div class="card card-table mb-0">
                                            <div class="card-body user_profile_body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0 datatable">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th><?php echo e(__('Appoitment Id')); ?></th>
                                                                <th><?php echo e(__('Report Image')); ?></th>
                                                                <th><?php echo e(__('Appointment date')); ?></th>

                                                                <th><?php echo e(__('Appointment status')); ?></th>
                                                                <th><?php echo e(__('Action')); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $__currentLoopData = $appointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $appointment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($loop->iteration); ?></td>
                                                                    <td><?php echo e($appointment->appointment_id); ?></td>
                                                                    <td class="d-flex">
                                                                        <?php if($appointment->report_image != null): ?>
                                                                            <?php $__currentLoopData = $appointment->report_image; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                <a href="<?php echo e($item); ?>" data-fancybox="gallery2">
                                                                                    <img src="<?php echo e($item); ?>" alt="Feature Image" width="50px" height="50px">
                                                                                </a>
                                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                        <?php else: ?>
                                                                            <?php echo e(__('Image Not available')); ?>

                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td><?php echo e($appointment->date); ?>

                                                                        <span class="d-block text-info"><?php echo e($appointment->time); ?></span>
                                                                    </td>
                                                                    <td><?php echo e($currency); ?><?php echo e($appointment->amount); ?></td>
                                                                    <td>
                                                                        <?php if($appointment->appointment_status == 'pending' || $appointment->appointment_status == 'PENDING'): ?>
                                                                            <span class="badge badge-pill bg-warning"><?php echo e(__('Pending')); ?></span>
                                                                        <?php endif; ?>
                                                                        <?php if($appointment->appointment_status == 'approve' || $appointment->appointment_status == 'APPROVE'): ?>
                                                                            <span class="badge badge-pill bg-success"><?php echo e(__('Approve')); ?></span>
                                                                        <?php endif; ?>
                                                                        <?php if($appointment->appointment_status == 'cancel' || $appointment->appointment_status == 'CANCEL'): ?>
                                                                            <span class="badge badge-pill bg-danger"><?php echo e(__('Cancelled')); ?></span>
                                                                        <?php endif; ?>
                                                                        <?php if($appointment->appointment_status == 'complete' || $appointment->appointment_status == 'COMPLETE'): ?>
                                                                            <span class="badge badge-pill bg-info"><?php echo e(__('Completed')); ?></span>
                                                                        <?php endif; ?>
                                                                    </td>
                                                                    <td class="w-100">
                                                                        <div class="d-flex">
                                                                            <a onclick="show_appointment(<?php echo e($appointment->id); ?>)" class="text-info ml-2" href="javascript:void(0)" role="button" data-from="add_new" data-bs-toggle="modal" data-bs-target="#user_appointment">
                                                                                <?php echo e(__('View')); ?>

                                                                            </a>
                                                                            <?php if($appointment->appointment_status == 'complete' || $appointment->appointment_status == 'cancel'): ?>
                                                                                <?php if($appointment->isReview == false): ?>
                                                                                    <a onclick="appointId(<?php echo e($appointment->id); ?>)" class="text-success ml-2 d-flex" href="javascript:void(0)" role="button" data-from="add_new" data-bs-toggle="modal" data-bs-target="#add_review">
                                                                                        <?php echo e(__(' Review')); ?>

                                                                                    </a>
                                                                                <?php endif; ?>
                                                                            <?php endif; ?>
                                                                            <?php if($appointment->appointment_status != 'cancel' && $appointment->appointment_status != 'complete'): ?>
                                                                                <a href="#cancel_reason" onclick="appointId(<?php echo e($appointment->id); ?>)" class="text-danger ml-2 d-flex justify-content-between"  href="javascript:void(0)" role="button" data-bs-toggle="modal" data-bs-target="#cancel_reason"><?php echo e(__('Cancel appointment')); ?></a>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="disp-none" id="prescription">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover table-center mb-0 datatable text-center">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th><?php echo e(__('Appointment ID')); ?></th>
                                                                <th><?php echo e(__('Date')); ?></th>
                                                                <th><?php echo e(__('Created by ')); ?></th>
                                                                <th><?php echo e(__('actions')); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $__currentLoopData = $prescriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prescription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($loop->iteration); ?></td>
                                                                    <td><?php echo e($prescription->appointment['appointment_id']); ?>

                                                                    </td>
                                                                    <td><?php echo e(Carbon\Carbon::parse($prescription->created_at)->format('d F Y')); ?>

                                                                    </td>
                                                                    <td class="d-flex">
                                                                        <a href="<?php echo e(url('doctor_profile/' . $prescription->doctor['id'] . '/' . Str::slug($prescription->doctor['name']))); ?>" class="avatar avatar-sm mr-2">
                                                                            <img class="avatar-img rounded-circle" src="<?php echo e($prescription->doctor['fullImage']); ?>" alt="User Image" width="50px" height="50px">
                                                                        </a>
                                                                        <a href="<?php echo e(url('doctor_profile/' . $prescription->doctor['id'] . '/' . Str::slug($prescription->doctor['name']))); ?>"><?php echo e($prescription->doctor['name']); ?></a>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table-action">
                                                                            <a href="<?php echo e(url('downloadPDF/' . $prescription->id)); ?>" class="btn btn-sm btn-primary">
                                                                                <i class="fas fa-print"></i><?php echo e(__(' Download PDF')); ?>

                                                                            </a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="disp-none" id="Purchased_med">
                                        <div class="card card-table mb-0">
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-hover datatable table-center mb-0">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th><?php echo e(__('Id')); ?></th>
                                                            
                                                                <th><?php echo e(__('Attechment')); ?></th>
                                                            
                                                                <th><?php echo e(__('View Medicine')); ?></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $__currentLoopData = $purchaseMedicines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $purchaseMedicine): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <tr>
                                                                    <td><?php echo e($loop->iteration); ?></td>
                                                                    <td><a href="javascript:void(0);"><?php echo e($purchaseMedicine->medicine_id); ?></a>
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <?php if(isset($purchaseMedicine->pdf) || $purchaseMedicine->pdf != null): ?>
                                                                            <a href="<?php echo e(url('prescription/upload/' . $purchaseMedicine->pdf)); ?>" data-fancybox="gallery2">
                                                                                <?php echo e($purchaseMedicine->pdf); ?>

                                                                            </a>
                                                                        <?php else: ?>
                                                                            <?php echo e(__('Not available')); ?>

                                                                        <?php endif; ?>
                                                                    </td>
                                                            
                                                            <td> 
                                                                <a onclick="show_medicines(<?php echo e($purchaseMedicine->id); ?>)" class="text-info ml-2" href="javascript:void(0)" role="button" data-from="add_new" data-bs-toggle="modal" data-bs-target="#purchased_medicine">
                                                                    <?php echo e(__('Medicines')); ?>

                                                                </a>
                                                            </td>
                                                            </tr>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="disp-none h-100" id="user-test-report">
                            <div class="m-2 profile-side-bar p-3  pb-2 bg-white h-100">
                                <div class="row row-cols-1 g-0">
                                    <div class="card card-table mb-0">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-center mb-0 datatable">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th><?php echo e(__('Laboratory Name')); ?></th>
                                                            <th><?php echo e(__('Prescirption')); ?></th>
                                                            <th><?php echo e(__('Date time')); ?></th>
                                                            
                                                            <th><?php echo e(__('Report')); ?></th>
                                                            <th><?php echo e(__('View')); ?></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $__currentLoopData = $test_reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $test_report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <tr>
                                                                <td><?php echo e($loop->iteration); ?></td>
                                                                <td><?php echo e($test_report->lab['name']); ?></td>
                                                                <td class="w-100">
                                                                    <div class="d-flex">
                                                                        <?php if($test_report->prescription != null): ?>
                                                                            <a href="<?php echo e('report_prescription/upload/'.$test_report->prescription); ?>" data-fancybox="gallery2">
                                                                                <img src="<?php echo e('report_prescription/upload/'.$test_report->prescription); ?>" alt="Feature Image" width="50px" height="50px">
                                                                            </a>
                                                                        <?php else: ?>
                                                                            <?php echo e(__('Prescirption Not available')); ?>

                                                                        <?php endif; ?>
                                                                    </div>
                                                                </td>
                                                                <td class="w-100"><?php echo e($test_report->date); ?><span class="d-block text-info"><?php echo e($test_report->time); ?></span>
                                                                </td>
                                                                
                                                               
                                                                <td>
                                                                    <?php if($test_report->upload_report == null): ?>
                                                                        <?php echo e(__('Report Not Availabel.')); ?>

                                                                    <?php else: ?>
                                                                        <a href="<?php echo e('download_report/'.$test_report->id); ?>">
                                                                            <?php echo e(__('Download Report')); ?>

                                                                        </a>
                                                                    <?php endif; ?>
                                                                </td>
                                                                <td>
                                                                    <a onclick="single_report(<?php echo e($test_report->id); ?>)" class="text-info ml-2" href="javascript:void(0)" role="button" data-bs-toggle="modal" data-bs-target="#test_report">
                                                                        <?php echo e(__('View')); ?>

                                                                    </a>                                                                
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="disp-none h-100" id="user-add">
                            <div class="m-2 profile-side-bar p-3 pb-2  bg-white h-100">
                                <div class="d-flex  Appointment-detail">
                                    <a class="btn ms-auto address_btn" href="javascript:void(0)" role="button" data-from="add_new" data-bs-toggle="modal" data-bs-target="#exampleModal"><?php echo e(__('Add new')); ?></a>
                                </div>
                                <div class="card card-table mb-0">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover text-center mb-0 datatable">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th><?php echo e(__('Address')); ?></th>
                                                        <th><?php echo e(__('Action')); ?></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $useraddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $uaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($loop->iteration); ?></td>
                                                            <td><?php echo e($uaddress->address); ?></td>
                                                            <td class="">
                                                                <a href="javascript:void(0)" class="text-success address_btn" data-from="edit" data-id="<?php echo e($uaddress->id); ?>" data-from="add_new" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                                    <i class="far fa-edit"></i>
                                                                </a>
                                                                <a href="javascript:void(0)" class="text-danger ml-2" onclick="deleteData(<?php echo e($uaddress->id); ?>)">
                                                                    <i class="far fa-trash-alt"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="disp-none h-100" id="user-fav">
                            <div class="m-2 profile-side-bar p-3  pb-2 bg-white h-100">
                                <div class="row row-cols-1 g-0">
                                    <?php $__currentLoopData = $doctors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col">
                                            <div class="doct-card p-3 card  m-3  ms-xl-0 pb-2 mb-0 position-relative">
                                                <div class="d-flex flex-sm-row flex-column">
                                                    <div class="doct-card-img me-3">
                                                        <img src="<?php echo e($doctor['fullImage']); ?>" class="rounded-circle" alt="...">
                                                    </div>
                                                    <div class=" doctor-info d-flex flex-column">
                                                        <div class="personalInfo">
                                                            <div>
                                                                <h6><?php echo e($doctor['name']); ?></h6>
                                                            </div>
                                                            

                                                            <div class="post d-flex mt-2 align-items-center">
                                                                <img src="<?php echo e($doctor['category']['fullImage']); ?>" alt="">
                                                                <p class="ps-2 mb-0"><?php echo e($doctor['category']['name']); ?></p>
                                                                <p class="ms-1 ps-1 mb-0 border-start text-muted">
                                                                    <?php echo e($doctor['expertise']['name']); ?>

                                                                </p>
                                                            </div>
                                                            <div class="d-flex flex-sm-row flex-column mt-2">
                                                                <div class="rating d-flex align-items-center">
                                                                    <?php for($i = 1; $i < 6; $i++): ?>
                                                                        <?php if($i <= $doctor['rate']): ?>
                                                                            <i class='bx bxs-star active'></i>
                                                                        <?php else: ?>
                                                                            <i class='bx bxs-star'></i>
                                                                        <?php endif; ?>
                                                                    <?php endfor; ?>
                                                                    <span class="d-inline-block average-rating">(<?php echo e($doctor['rate']); ?>)</span>
                                                                </div>
                                                                <div class="d-flex ms-sm-3 mt-sm-0 mt-3 align-items-center fbk ">
                                                                    <i class='bx bx-message-dots'></i>
                                                                    <p class="ms-2"> <span><?php echo e($doctor['review']); ?></span> <?php echo e(__(' Feedback')); ?></p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                       
                                                        <div class="location mt-2 mb-2">
                                                            <?php $__currentLoopData = $doctor['hospital']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hospital): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="mt-2">
                                                                    <h6><?php echo e($hospital['name']); ?></h6>
                                                                    <p style="font-size: 12px;"><i class='bx bx-map' style="font-size: 13px;"></i><?php echo e($hospital['address']); ?></p>
                                                                </div>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </div>

                                                        <div class="d-flex align-items-sm-center my-3 flex-sm-row flex-column justify-contentss-between">
                                                            <div class="btn-appointment">
                                                                <a href="<?php echo e(url('doctor_profile/'.$doctor['id'].'/'.Str::slug($doctor['name']))); ?>" class="view-profile btn btn-outline-secondary login-btn marg_right"><?php echo e(__('View Profile')); ?></a>
                                                            </div>
                                                            <div class="btn-appointment mt-sm-0 mt-3">
                                                                <a class="btn btn-link text-center mt-0 marg_left" href="<?php echo e(url('booking/'.$doctor['id'].'/'.Str::slug($doctor['name']))); ?>" role="button"><?php echo e(__('Book Appointment')); ?></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div data-id="<?php echo e($doctor['id']); ?>" class="position-absolute d-flex align-items-center justify-content-center shadow add-favourite <?php echo e($doctor['is_fav'] == 'true' ? 'active' : ''); ?>">
                                                    <i class='bx bx-bookmark-heart'></i>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                            </div>
                        </div>

                        <div class="disp-none h-100" id="user-setting">
                            <div class="m-2 profile-side-bar p-3 h-100 pb-2 bg-white">
                                <form action="<?php echo e(url('update_user_profile')); ?>" method="post" class="h-100" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="change-avtar">
                                        <div class="avatar-upload position-relative">
                                            <div class="avatar-edit position-absolute">
                                                <input type='file' name="image" id="imageUpload" class="d-none" accept=".png, .jpg, .jpeg" />
                                                <label for="imageUpload" class="" data-bs-toggle="tooltip" data-bs-placement="right" title="Select new profile pic"></label>
                                            </div>
                                            <div class="avatar-preview">
                                                <div id="imagePreview" style="background-image: url(<?php echo e('images/upload/'.auth()->user()->image); ?>);">
                                                </div>
                                            </div>
                                            <div class="mt-2">
                                                <p class="text-center patient-image"><?php echo e(__('Patient Image')); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pb-4">
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div>
                                                    <label for="name" class="form-label mb-1"><?php echo e(__('Name')); ?></label>
                                                    <input type="text" class="form-control" name="name" id="name" value="<?php echo e(auth()->user()->name); ?>" required>

                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    <label for="mail" class="form-label mb-1"><?php echo e(__('Email')); ?></label>
                                                    <input type="email" class="form-control" placeholder="Enter email" value="<?php echo e(auth()->user()->email); ?>" disabled>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pb-4">
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div>
                                                    <label for="phone" class="form-label mb-1"><?php echo e(__('Phone number')); ?></label>
                                                    <input type="tel" readonly value="<?php echo e(auth()->user()->phone_code); ?>&nbsp;<?php echo e(auth()->user()->phone); ?>" class="form-control" id="phone">
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <label for="name" class="form-label mb-1"><?php echo e(__('Language')); ?></label>
                                                <select class="form-select  form-control" name="language">
                                                    <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($language->name); ?>" <?php echo e($language->name == auth()->user()->language ? 'selected' : ''); ?>><?php echo e($language->name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="pb-4">
                                        <div class="row g-2">
                                            <div class="col-md">
                                                <div>
                                                    <label for="b-date" class="form-label mb-1"><?php echo e(__('Date Of Birth')); ?></label>
                                                    <input type="date" name="dob" max="<?php echo e(Carbon\Carbon::now(env('timezone'))->format('Y-m-d')); ?>" class="form-control" id="b-date" value="<?php echo e(auth()->user()->dob); ?>">
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <label for="gender" name="gender" class="form-label mb-1"><?php echo e(__('Gender')); ?></label>
                                                <select class="form-select  form-control" name="gender">
                                                    <option <?php echo e(auth()->user()->gender == 'male' ? 'selected' : ''); ?> value="male"><?php echo e(__('Male')); ?></option>
                                                    <option <?php echo e(auth()->user()->gender == 'female' ? 'selected' : ''); ?> value="female"><?php echo e(__('Female')); ?></option>
                                                    <option <?php echo e(auth()->user()->gender == 'other' ? 'selected' : ''); ?> value="other"><?php echo e(__('Other')); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex  Appointment-detail">
                                        <button type="submit" class="btn ms-auto"><?php echo e(__('Submit')); ?></button>
                                    </div>
                                </form>

                            </div>
                        </div>

                        <div class="disp-none h-100" id="user-changePass">
                            <div class="m-2 profile-side-bar p-3 pt-5 h-100 pb-2 bg-white">
                                <form action="<?php echo e(url('change_password')); ?>" method="post" class="h-100">
                                    <?php echo csrf_field(); ?>
                                        <div class="mb-4">
                                            <label for="old_pass" class="form-label mb-1"><?php echo e(__('Old Password')); ?></label>
                                            <input type="password" class="form-control" name="old_password" id="old_pass">
                                        </div>
                                        <div class="mb-4">
                                            <label for="new_pass" class="form-label mb-1"><?php echo e(__('New Password')); ?></label>
                                            <input type="password" class="form-control" name="new_password">
                                        </div>

                                        <div class="mb-4">
                                            <label for="conf_new_pass" class="form-label mb-1"><?php echo e(__('Confirm new Password')); ?></label>
                                            <input type="password" class="form-control" name="confirm_new_password" id="conf_new_pass">
                                        </div>
                                        <div class="d-flex pt-5 Appointment-detail">
                                            <button type="submit" class="btn ms-auto"><?php echo e(__('Change password')); ?></button>
                                        </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('User Address')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(url('addAddress')); ?>" method="post">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="from">
                        <input type="hidden" name="id">
                        <input type="hidden" name="lat" id="lat" value="22.3039">
                        <input type="hidden" name="lang" id="lng" value="70.8022">
                        <input type="hidden" name="user_id" value="<?php echo e(auth()->user()->id); ?>">
                        <div id="map" class="mapClass"></div>
                        <div class="form-group">
                            <textarea name="address" cols="30" class="form-control" rows="10"><?php echo e(__('Kerela , Gujrat')); ?></textarea>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button type="submit" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>

    <div class="modal fade" id="user_appointment" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Appointment')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td><?php echo e(__('appointment Id')); ?></td>
                            <td class="appointment_id"></td>
                        </tr>
                       
                        <tr>
                            <td><?php echo e(__('Doctor name')); ?></td>
                            <td class="doctor_name"></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('patient name')); ?></td>
                            <td class="patient_name"></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('patient address')); ?></td>
                            <td class="patient_address"></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('patient age')); ?></td>
                            <td class="patient_age"></td>
                        </tr>
                       
                        <tr>
                            <td><?php echo e(__('date')); ?></td>
                            <td class="date"></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('time')); ?></td>
                            <td class="time"></td>
                        </tr>
                       
                        <tr>
                            <td><?php echo e(__('illness information')); ?></td>
                            <td class="illness_info"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="test_report" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Test Report')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <td><?php echo e(__('Report Id')); ?></td>
                            <td class="report_id"></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('patient name')); ?></td>
                            <td class="patient_name"></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('patient phone number')); ?></td>
                            <td class="patient_phone"></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('patient age')); ?></td>
                            <td class="patient_age"></td>
                        </tr>
                        <tr>
                            <td><?php echo e(__('patient gender')); ?></td>
                            <td class="patient_gender"></td>
                        </tr>
                        
                       
                        <table class="table types">
                        </table>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="purchased_medicine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><?php echo e(__('Purchased Medicine')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td><?php echo e(__('shipping At')); ?></td>
                                <td class="shippingAt"></td>
                            </tr>
                            <tr class="shippingAddressTr">
                                <td><?php echo e(__('shipping Adddress')); ?></td>
                                <td class="shippingAddress"></td>
                            </tr>
                            <tr class="shippingAddressTr">
                                <td><?php echo e(__('Delivery Charge')); ?></td>
                                <td class="deliveryCharge"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                            <th><?php echo e(__('medicine name')); ?></th>
                            <th><?php echo e(__('medicine qty')); ?></th>
                            <th><?php echo e(__('medicine price')); ?></th>
                        </thead>
                        <tbody  class="tbody">
    
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="add_review" tabindex="-1" aria-labelledby="add_reviewLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Review')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?php echo e(url('/addReview')); ?>" method="post" id="reviewForm">
                        <?php echo csrf_field(); ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <input type="hidden" name="appointment_id" value="">
                                <label class="col-form-label"><?php echo e(__('Rating')); ?></label>
                                <div id="full-stars-example-two">
                                    <div class="rating-group">
                                        <input disabled checked class="rating__input rating__input--none" name="rate" id="rating3-none" value="0" type="radio">
                                        <label aria-label="1 star" class="rating__label" for="rating3-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rate" id="rating3-1" value="1" type="radio">
                                        <label aria-label="2 stars" class="rating__label" for="rating3-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rate" id="rating3-2" value="2" type="radio">
                                        <label aria-label="3 stars" class="rating__label" for="rating3-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rate" id="rating3-3" value="3" type="radio">
                                        <label aria-label="4 stars" class="rating__label" for="rating3-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rate" id="rating3-4" value="4" type="radio">
                                        <label aria-label="5 stars" class="rating__label" for="rating3-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                        <input class="rating__input" name="rate" id="rating3-5" value="5" type="radio">
                                    </div>
                                    <span class="invalid-div text-danger"><span class="rate"></span></span>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <label class="col-form-label"><?php echo e(__('Review')); ?></label>
                                <div class="form-group">
                                    <textarea name="review" class="form-control" cols="30" rows="10"></textarea>
                                    <span class="invalid-div text-danger"><span class="review"></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button type="button" onclick="addReview()" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="cancel_reason" tabindex="-1" aria-labelledby="cancel_reasonLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo e(__('Review')); ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="post" id="cancelForm">
                    <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" value="">
                        <input type="hidden" name="cancel_by" value="user">
                        <table class="table">
                            <?php $__currentLoopData = json_decode($cancel_reason); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cancel_reason): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="position-relative d-flex align-items-center my-1 mt-2">
                                            <input type="radio" class="d-none custom_radio" id="cod<?php echo e($loop->iteration); ?>" name="payment" onchange="seeData('#codPayment')" checked>
                                            <label for="cod<?php echo e($loop->iteration); ?>" class="position-absolute custom-radio"></label>
                                            <label for="cod<?php echo e($loop->iteration); ?>" class="ms-4 normal-label"><?php echo e($cancel_reason); ?></label>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </table>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button type="button" onclick="cancelAppointment()" class="btn btn-primary"><?php echo e(__('Save')); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(url('assets/js/address.js')); ?>"></script>
    <?php if(App\Models\Setting::first()->map_key): ?>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo e(App\Models\Setting::first()->map_key); ?>&libraries=places&v=weekly" async></script>
    <?php endif; ?>
    <script src="<?php echo e(url('assets/js/all.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.mainlayout',['active_page' => 'user_profile'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\doctro\resources\views/website/user_profile.blade.php ENDPATH**/ ?>