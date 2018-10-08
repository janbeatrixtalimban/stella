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
          <li class="nav-item dropdown">
              <a class="navbar-brand" href="<?php echo e(url('/modelfeed ')); ?>" data-placement="bottom">
                    Home
              </a>
          </li>
          <li class="nav-item">
                <div class="dropdown button-dropdown">
                      <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                        <span class="button-bar"></span>
                        <span class="button-bar"></span>
                        <span class="button-bar"></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-header">Profile</a>
                        <a class="dropdown-item" href="#">View Job Offers</a>
                        <a class="dropdown-item" href="<?php echo e(url('/subscription')); ?>">Subscription</a>
                        <a class="dropdown-item" href="#">Settings</a>
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
    <div class="page-header page-header-model clear-filter" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url('');">
      </div>
      <div class="container">
        <div class="photo-container">
          <img src="/uploads/avatars/<?php echo e(Auth::user()->avatar); ?>" alt="">
        </div>
        <div class="row justify-content-center">
            
          <a data-toggle="modal" data-target="#profilepic" type="submit" rel="tooltip" title="Upload a Profile Picture" style="color:white; padding-top:10px;">Edit Picture</a>
        </div>
        <h3 class="headtitle"><?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?></h3>
        <p class="category">(Skill Set)</p>
        <div class="content">
          <div class="social-description">
            <h5><?php echo e(Auth::user()->birthDate); ?></h5>
            <p>Years old</p>
          </div>
          <div class="social-description">
            <h5><?php echo e(Auth::user()->location); ?></h5>
            <p>Location</p>
          </div>
          <div class="social-description">
            <h5> <?php echo e($details->gender); ?> </h5>
            <p>Gender</p>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="button-container">
          <a href="<?php echo e(url('/modeleditprofile')); ?>" class="btn btn-maroon btn-round btn-lg">Edit Profile</a>
          <a href="<?php echo e(url('/addPortfolio')); ?>" class="btn btn-maroon btn-round btn-lg">Add to Portfolio</a>
        </div>
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-2">
                <h4 class="title">My Attributes</h4>
                <h5 class="description text-left" style="color:#1b1b1b;">
                  <b>Eye Color:</b> <?php echo e($details->eyeColor); ?><br>
                  <b>Hair Color:</b> <?php echo e($details->hairColor); ?><br>
                  <b>Hair Length:</b> <?php echo e($details->hairLength); ?><br>
                  <b>Weight:</b> <?php echo e($details->weight); ?><br>
                  <b>Height:</b> <?php echo e($details->height); ?><br>
                  <b>Chest:</b> <?php echo e($details->chest); ?><br>
                  <b>Waist:</b> <?php echo e($details->waist); ?><br>
                  <b>Hips:</b> <?php echo e($details->hips); ?><br>
                  <b>Complexion:</b> <?php echo e($details->complexion); ?><br>
                  <b>Shoe size:</b> <?php echo e($details->shoeSize); ?><br>
                  <b>Tattoo or Scars:</b> <?php echo e($details->tatoo); ?><br>
                </h5>
            </div> 
            <div class="col-sm-10">
                <h4 class="title text-center">View My Portfolio</h4>
                <!-- Portfolio Viewer -->
                <iframe src="<?php echo e(url('/imagegalleryview/'.Auth::user()->userID)); ?>" style="height:900px;width:900px;border:none;" scrolling="no"></iframe>
            </div>
        </div>
        <div class="row">
          <div class="container">
          </div>
          


    <!-- Upload Profile Picture Modal -->
      <div id="profilepic" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog tncmodal" role="document">

          <!-- Modal content-->
          <div class="modal-content" style="color:black;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Upload Profile Picture</h4>
              </div>
              <div class="modal-body">
                  <form action="<?php echo e(url('/avatarupload')); ?>" method="post" enctype="multipart/form-data">
                  <?php echo e(csrf_field()); ?>

                      <?php if(count($errors) > 0): ?>
                          <div class="alert alert-danger">
                              <strong>Oh no!</strong> It appears that your image file is too large, please choose a smaller image size.<br><br>
                                  <ul>
                                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                          <li><?php echo e($error); ?></li>
                                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                  </ul>
                            </div>
                      <?php endif; ?>
                          <div class="input-group no-border input-sm">
                            <div class="input-group-prepend">
                              <span class="input-group-text">
                              </span>
                            </div>
                            <input type="file" class="form-control" name="avatar" id="avatar">
                          </div>
                      <a>*Max image size of 3.15 MB</a>
                          <button type="submit" class="btn btn-success btn-round">Upload</button>
                          <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Cancel</button>
                  </form>
              </div>
              <div class="modal-footer">
              </div>
            </div>
        </div>
        <!-- End of Modal -->
         


        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.modelapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>