<title><?php echo $__env->yieldContent('pageTitle'); ?> <?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?> </title>


<?php $__env->startSection('content'); ?>
<body class="profile-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-black fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="<?php echo e(url('/modelfeed')); ?>" rel="tooltip" title="Return to Feed" data-placement="bottom">
            <img src="<?php echo asset('img/logo_white.png')?>" width="100">
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation">
        <ul class="navbar-nav">
          <li class="nav-item">
                <div class="dropdown button-dropdown">
                      <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                        <span class="button-bar"></span>
                        <span class="button-bar"></span>
                        <span class="button-bar"></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-header">Profile</a>
                        <a class="dropdown-item" href="<?php echo e(url('/modelfeed')); ?>">Home</a>
                        <a class="dropdown-item" href="<?php echo e(url('#')); ?>">View Job Offers</a>
                        <a class="dropdown-item" href="<?php echo e(url('/subscription')); ?>">Subscriptions</a>
                        <a class="dropdown-item" href="<?php echo e(url('#')); ?>">Settings</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo e(url('/logout')); ?>">Logout</a>
                      </div>
                </div>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->
  
  <div class="wrapper">
    <div class="page-header clear-filter" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url('../assets/img/bg5.jpg');">
      </div>
      <div class="container">
        <div class="photo-container">
          <img src="<?php echo asset('img/default-profile-pic.png')?>" alt="">
        </div>
        <h3 class="title"><?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?></h3>
        <p class="category">(Skill Set)</p>
        <div class="content">
          <div class="social-description">
              22
            
            <p>Years old</p>
          </div>
          <div class="social-description">
            <h4>5</h4>
            <p>Stars</p>
          </div>
          <div class="social-description">
            <h4>0</h4>
            <p>Jobs completed</p>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="button-container">
          <a href="<?php echo e(url('/modeleditprofile')); ?>" class="btn btn-maroon btn-round btn-lg">Edit Profile</a>
          <a href="<?php echo e(url('/addPortfolio')); ?>" class="btn btn-maroon btn-round btn-lg">Create Portfolio</a>
        </div>
        <h3 class="title">About me</h3>
        <h5 class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h5>
        <div class="row">
          <div class="container">
            <h4 class="title text-center">View My Portfolio</h4>
            
              <iframe src="<?php echo e(url('/imagegalleryview/'.Auth::user()->userID)); ?>" style="height:900px;width:900px;border:none;" scrolling="no"></iframe>
            <div class="nav-align-center">
              <ul class="nav nav-pills nav-pills-maroon nav-pills-just-icons" role="tablist">
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tab" href="#profile" role="tablist">
                    <i class="now-ui-icons design_image"></i>
                  </a>
                </li>
                <li class="nav-item"> 
                  <a class="nav-link active" data-toggle="tab" href="#home" role="tablist">
                    <i class="now-ui-icons media-1_camera-compact"></i>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- Tab panes -->
          <div class="tab-content gallery">
            <div class="tab-pane active" id="home" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <img src="" />
                  </div>
                  <div class="col-md-6">
                    <img src="<?php echo asset('img/background1.jpg')?>" alt="" class="img-raised">
                    <img src="<?php echo asset('img/kendall.jpg')?>" alt="" class="img-raised">
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="profile" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <img src="<?php echo asset('img/header.jpg')?>" class="img-raised">
                    <img src="<?php echo asset('img/header2.jpg')?>" alt="" class="img-raised">
                  </div>
                  <div class="col-md-6">
                    <img src="../assets/img/bg7.jpg" alt="" class="img-raised">
                    <img src="../assets/img/bg8.jpg" alt="" class="img-raised">
                  </div>
                </div>
              </div>
            </div>
            <div class="tab-pane" id="messages" role="tabpanel">
              <div class="col-md-10 ml-auto mr-auto">
                <div class="row collections">
                  <div class="col-md-6">
                    <img src="../assets/img/bg3.jpg" alt="" class="img-raised">
                    <img src="../assets/img/bg8.jpg" alt="" class="img-raised">
                  </div>
                  <div class="col-md-6">
                    <img src="../assets/img/bg7.jpg" alt="" class="img-raised">
                    <img src="../assets/img/bg6.jpg" class="img-raised">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.modelapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>