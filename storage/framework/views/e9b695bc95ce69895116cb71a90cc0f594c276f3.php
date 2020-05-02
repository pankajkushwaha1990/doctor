 
<?php $__env->startSection('title','Dashboard'); ?> 
<?php $__env->startSection('content'); ?>
        <?php $__env->startSection('styles'); ?>
          <link rel="stylesheet" href="<?php echo e(asset('template/admin')); ?>/assets/plugins/datatables/datatables.min.css">
        <?php $__env->stopSection(); ?>
        <!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid">
        
          <!-- Page Header -->
<!--           <div class="page-header">
            <div class="row">
              <div class="col-sm-12">
                <h3 class="page-title">List of Doctors</h3>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                  <li class="breadcrumb-item"><a href="javascript:(0);">Users</a></li>
                  <li class="breadcrumb-item active">Doctor</li>
                </ul>
              </div>
            </div>
          </div> -->
          <!-- /Page Header -->
          
          <div class="row">
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="datatable table table-hover table-center mb-0">
                      <thead>
                        <tr>
                          <th>Doctor ID</th>
                          <th>Doctor Name</th>
                          <th>Speciality</th>
                          <th>Address</th>
                          <th>Mobile</th>
                          <th>Registred On</th>
                          <th class="text-right">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        <?php if(!empty($list)): ?>
                          <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $doctor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                          <td>#DR<?php echo e($doctor->id); ?></td>

                          <td>
                            <h2 class="table-avatar">
                              <a target="_blank" href="<?php echo e(url('doctor_profile_view')); ?>/<?php echo e(base64_encode(base64_encode($doctor->id))); ?>" class="avatar avatar-sm mr-2"><img class="avatar-img rounded-circle" src="<?php echo e(asset('doctor_files')); ?>/<?php echo e($doctor->profile_picture); ?>" alt="User Image"></a>
                              <a href="profile.html"><?php echo e($doctor->name); ?></a>
                            </h2>
                          </td>
                          <td><?php echo e($doctor->clinic_specialist); ?></td>
                          <td><?php echo e($doctor->city); ?>, <?php echo e($doctor->state); ?></td>
                          <td><?php echo e($doctor->mobile); ?></td>

                          
                         
                          
                           <td><?php echo e($doctor->created_at); ?></td>
                           <?php if($doctor->status =='1'): ?>         
                              <td><a href="<?php echo e(url('admin_doctor_change_status/0/'.base64_encode($doctor->id))); ?>"><button class="btn btn-sm btn-success">Active</button></a></td>         
                            <?php else: ?>
                            <td><a href="<?php echo e(url('admin_doctor_change_status/1/'.base64_encode($doctor->id))); ?>"><button class="btn btn-sm btn-danger">Deactive</button></a></td>        
                           <?php endif; ?>
                        </tr>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      <?php endif; ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>      
          </div>
          
        </div>      
      </div>
      <!-- /Page Wrapper -->
      <?php $__env->startSection('scripts'); ?>
      <script src="<?php echo e(asset('template/admin')); ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
      <script src="<?php echo e(asset('template/admin')); ?>/assets/plugins/datatables/datatables.min.js"></script>
      <script  src="<?php echo e(asset('template/admin')); ?>/assets/js/script.js"></script>
      <?php $__env->stopSection(); ?>      
   
<?php $__env->stopSection(); ?>
<?php echo $__env->make('master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>