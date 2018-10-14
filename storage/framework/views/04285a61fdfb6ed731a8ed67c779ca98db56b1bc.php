<title><?php echo $__env->yieldContent('pageTitle'); ?> <?php echo e($user->firstName); ?> <?php echo e($user->lastName); ?> </title>


<?php $__env->startSection('content'); ?>
<body class="profile-page sidebar-collapse">
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg bg-black fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <a class="navbar-brand" href="<?php echo e(url('/employerHome')); ?>" rel="tooltip" title="Return to Feed" data-placement="bottom">
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
                        <a class="navbar-brand" href="<?php echo e(url('/employerHome ')); ?>" data-placement="bottom">
                            Home
                        </a>
                        </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo e(url('/employerprofile ')); ?>" rel="tooltip" title="Go to profile" role="button">
                        <img src="/uploads/avatars/<?php echo e(Auth::user()->avatar); ?>" width="25" height="25" alt="Thumbnail Image" class="rounded-circle img-raised">
                        </a>
                      </li>
                      <li class="nav-item dropdown">
                      <div class="dropdown button-dropdown">
                            <a href="#pablo" class="dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">
                              <span class="button-bar"></span>
                              <span class="button-bar"></span>
                              <span class="button-bar"></span>
                            </a>
                          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-header">Homepage</a>
                            <a class="dropdown-item" href="<?php echo e(url('/employerprofile')); ?>">
                            <h6><?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?></h6></a>
                            <a class="dropdown-item" href="<?php echo e(url('/employerapplicants')); ?>">View Applicants</a>
                            <a class="dropdown-item" href="<?php echo e(url('/subscriptionEmployer')); ?>">Subscription</a>
                            <a class="dropdown-item" href="<?php echo e(url('/settings')); ?>">Settings</a>
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
          <img src="/uploads/avatars/<?php echo e($user->avatar); ?>" alt="">
        </div>
        <h3 class="headtitle"><?php echo e($user->firstName); ?> <?php echo e($user->lastName); ?></h3>
        <p class="category"></p>
        <div class="content">
          <div class="social-description">
            <h5><?php echo e($user->birthDate); ?></h5>
            <p>Years old</p>
          </div>
          <div class="social-description">
            <h5><?php echo e($user->location); ?></h5>
            <p>Location</p>
          </div>
          <div class="social-description">
            <h5><?php echo e($details->gender); ?></h5>
            <p>Gender</p>
          </div>
        </div>
      </div>
    </div>
    <div class="section">
      <div class="container">
        <div class="button-container">

          <a data-toggle="modal" data-target="#<?php echo e($user->userID); ?>" style="color:white;" class="btn btn-maroon btn-round btn-lg">Leave Feedback</a>
        </div>

<!-- View Job detials Modal -->
<div id="<?php echo e($user->userID); ?>" class="modal fade show" style="padding-top: 100px;" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">

          <!-- Modal content-->
                <div class="modal-content" style="color:black;">
                    <div class="modal-header">
                      <div class="column">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                          
                      </div>
                    </div>
                    <div class="modal-body">
                      <p></p>

                      <h5>Project Details</h5>
                      <?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
   
<form action="<?php echo e(route('feedbacks.store')); ?>" method="post" enctype="multipart/form-data">

    <?php echo csrf_field(); ?> 
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>User ID</strong>
                <input type="text" name="userID" class="form-control" value="<?php echo e(Auth::user()->userID); ?>" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Reciever ID</strong>
                <input type="text" name="reciever" class="form-control" value="<?php echo e($user->userID); ?>" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Project ID</strong>
                <input type="text" name="projectID" class="form-control" value="0" readonly>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Rating</strong><br>
                <input type="radio" name="gender" value="1"> 1<br>
  <input type="radio" name="rate" value="2"> 2<br>
  <input type="radio" name="rate" value="3"> 3<br>
  <input type="radio" name="rate" value="4"> 4<br>
  <input type="radio" name="rate" value="5" checked> 5<br>


                </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Comments:</strong>
                <textarea class="form-control" style="height:150px" name="comment" placeholder="Detail"></textarea>
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
            </div>
          <!-- End of Modal -->

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
                  <b>Tattoo or Scars:</b> <?php echo e($details->tatoo); ?>

                </h5>
                
                <h4 class="title">Feedbacks</h4>
                <h6 class="description text-left" style="color:#1b1b1b;">
                <h1>⋆⋆⋆⋆⋆</h1>
                <?php $__currentLoopData = $feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                "<?php echo e($feedback->comment); ?>"<br><br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </h5>
                
            </div> 
            <div class="col-sm-10">
                <h4 class="title text-center">View My Portfolio</h4>
                <!-- Portfolio Viewer -->
                <iframe src="<?php echo e(url('/imagegalleryview/'.$user->userID)); ?>" style="height:100%;width:100%;border:none;" scrolling="no"></iframe>
            </div>
        </div>
        <div class="row">
          <div class="container">
          </div>


        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.employerapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>