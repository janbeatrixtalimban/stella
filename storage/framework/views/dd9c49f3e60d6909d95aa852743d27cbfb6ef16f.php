<title><?php echo $__env->yieldContent('pageTitle'); ?> Stella Admin </title>

<!-- Side nav bar -->
<body class="">
  <div class="wrapper ">
      <!-- Admin side bar -->
    <div class="sidebar" data-color="black">
      <div class="logo">
        <img src="<?php echo asset('img/logo_white.png')?>" width="150">
        <h5 style="color:white;"> Welcome, <?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?>! </h5>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
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
              <p>Admin Panel</p>
            </a>
          </li>
          <li>
            <a href="./user.html">
              <i class="now-ui-icons files_single-copy-04"></i>
              <p>Coupons</p>
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
          <li class="active">
            <a href="/admin/ViewEmployer">
           <i class="now-ui-icons users_single-02"></i>
            <p>Employers</p>
            </a>
          </li>
          <li>
            <a href="./typography.html">
              <i class="now-ui-icons gestures_tap-01"></i>
              <p>Reports</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

<!-- Section Start -->    
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
            <a class="navbar-brand" href="#pablo">View Employers</a>
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
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Settings</a>
                  <a class="dropdown-item" href="/admin/logout">Logout</a>
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
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="title">Employers List</h5>
                    </div>

                    <div class="card-body">
                        <?php if(count($details) > 0): ?>
                            <div class="panel panel-default">

                                <div class="panel-body table-responsive">
                                    <table class="table table-hover table-striped task-table">

                                        <!-- Table Headings -->
                                        <thead>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Email</th>
                                            <th>Company</th>
                                            <th>Position</th>
                                            <th>Status</th>
                                            <th>Date Registered</th>
                                            
                                            <th></th>
                                            <th></th>
                                        </thead>

                                        <!-- Table Body -->
                                        <tbody>
                                            <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                
                                                    <td class="table-text">
                                                        <div><?php echo e($details->firstName); ?></div>
                                                    </td>
                                                    
                                                    <td class="table-text">
                                                        <div><?php echo e($details->lastName); ?></div>
                                                    </td>
                                                    <td class="table-text">
                                                        <div><?php echo e($details->emailAddress); ?></div>
                                                    </td>
                                                    <td class="table-text">
                                                            <div><?php echo e($details->name); ?></div>
                                                        </td>
                                                        <td class="table-text">
                                                                <div><?php echo e($details->position); ?></div>
                                                            </td>
                                                    <td class="table-text">
                                                        <div><?php echo e($details->status); ?></div>
                                                    </td>
                                                    <td class="table-text">
                                                        <div><?php echo e($details->created_at); ?></div>
                                                    </td>
                                                    <td><a href="#">View</a></td>
                                                
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            
                            </div>
                    
                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.adminapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>