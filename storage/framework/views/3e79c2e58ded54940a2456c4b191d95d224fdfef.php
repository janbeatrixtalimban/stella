<title><?php echo $__env->yieldContent('pageTitle'); ?> Stella Admin </title>

<!-- Side nav bar moved from layouts coz separate pa side nav designs huhu-->
<body class="">
  <div class="wrapper ">
      <!-- Admin DASHBOARD side bar -->
    <div class="sidebar" data-color="black">
      <div class="logo">
        <img src="<?php echo asset('img/logo_white.png')?>" width="150">
        <h5 style="color:white;"> Welcome, <?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?>! </h5>
      </div>
      <div class="sidebar-wrapper">
          <ul class="nav">
              <li class="active ">
                <a href="<?php echo e(url('/admin/dashboard')); ?>">
                  <i class="now-ui-icons business_chart-pie-36"></i>
                  <p>Dashboard</p>
                </a>
              </li>
              <li>
                <a href="/admin/ViewAuditLog">
                  <i class="now-ui-icons files_paper"></i>
                  <p>Audit Log</p>
                </a>
              </li>
              <li>
                <a href="/admin/viewAdmin">
                  <i class="now-ui-icons business_badge"></i>
                  <p>Admins</p>
                </a>
              </li>
              <li>
                  <a href="/admin/addAdmin">
                    <i class="now-ui-icons users_single-02"></i>
                    <p>Add Admin</p>
                  </a>
                </li>
              <li>
                <a href="/admin/ViewModel">
                  <i class="now-ui-icons users_single-02"></i>
                  <p>Models</p>
                </a>
              </li>
              <li>
              <li>
                <a href="/admin/ViewEmployer">
               <i class="now-ui-icons users_single-02"></i>
                <p>Employers</p>
                </a>
              </li>
              <li>
                <a href="/admin/reportedJobs">
                  <i class="now-ui-icons gestures_tap-01"></i>
                  <p>Reports - Job Posts</p>
                </a>
              </li>
              <li>
                <a href="/admin/reportedImg">
                  <i class="now-ui-icons gestures_tap-01"></i>
                  <p>Reports - Photos</p>
                </a>
              </li>
            </ul>
      </div>
    </div>


<!-- Start of Contents -->
<?php $__env->startSection('content'); ?>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Audit Log</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="now-ui-icons users_single-02"></i>
                      <p>
                        <span class="d-lg-none d-md-block">Dashboard</span>
                    </p>
                </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <p style="text-align:center;">&nbsp;<b><?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?></b></p></a>
                                
                        <a class="dropdown-item" href="<?php echo e(url('/admin/logout')); ?>" style="color:black;">Logout</a>
                    </div>
            </li>
        </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->

      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
        <!-- Model Card -->
          <div class="col-lg-4">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">MODEL STATS</h5>
                <h4 class="card-title">Model Count</h4>
              </div>
              <div class="card-body">
               <p> NUMBER OF PREMIUM MODELS: <b><?php echo e($models); ?></b> </p>
               <p> TOTAL NUMBER OF MODELS: <b><?php echo e($numModels); ?></b> </p>
              </div>
            </div>
          </div>
        <!-- Employer Card -->
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">EMPLOYER STATS</h5>
                <h4 class="card-title">Employer Count</h4>
              </div>
              <div class="card-body">
                  <p> NUMBER OF PREMIUM EMPLOYERS: <b><?php echo e($employer); ?></b> </p>
                  <p> TOTAL NUMBER OF EMPLOYERS: <b><?php echo e($numEmps); ?></b> </p>
              </div>
            </div>
          </div>
        <!-- Project card -->
          <div class="col-lg-4 col-md-6">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-category">PROJECT STATS</h5>
                <h4 class="card-title">Project Count</h4>  
              </div>
              <div class="card-body">
                  <p> NUMBER OF ACTIVE PROJECTS: <b><?php echo e($projActive); ?></b> </p>
                  <p> TOTAL NUMBER OF PROJECTS: <b><?php echo e($proj); ?></b> </p>    
              </div>
            </div>
          </div>
        </div>

    <!-- Admin cards - audit log -->
        <div class="row">
          <div class="col-md-7">
          <div class="card">
              <div class="card-header">
                <h5 class="card-category">ADMIN</h5>
                <h4 class="card-title"> Admin Log</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="adminAudit" class="table">
                    <thead class=" text-primary">
                     
                      <th>
                        Name
                      </th>
                      <th>
                         Log Type
                        </th>
                      <th>
                        Date Created
                      </th>
                      
                    </thead>
                    <tbody>
                        
                      <tr>
                          <?php $__currentLoopData = $audit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $audit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <td>
                            <?php echo e($audit->firstName); ?>  <?php echo e($audit->lastName); ?>

                        </td>
                        <td>
                            <?php echo e($audit->logType); ?>

                        </td>
                        <td>
                            <?php echo e($audit->created_at); ?>

                        </td>
                        
                      </tr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table><br>
                </div>
              </div>
            </div>
          </div>

        <!-- Admin list -->
          <div class="col-md-5">
            <div class="card">
              <div class="card-header">
                <h5 class="card-category">ADMIN</h5>
                <h4 class="card-title"> Admin List</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table id="adminList" class="table">
                   
                    <thead class="text-primary">
                      
                      <th>
                        Name
                      </th>
                      <th>
                        Date Created
                      </th>
                      
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr>
                        <td>
                          <?php echo e($details-> firstName); ?> <?php echo e($details-> lastName); ?>

                        </td>
                        <td>
                            <?php echo e($details-> created_at); ?>

                        </td>
                        
                      </tr>
                      
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                  </table><br>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>