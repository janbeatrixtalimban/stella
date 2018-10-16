<title><?php echo $__env->yieldContent('pageTitle'); ?> View Applicants </title>

<?php $__env->startSection('content'); ?>

<body class="landing-page sidebar-collapse" data-spy="scroll">
            <!-- Navigation bar hehe -->
            <nav class="navbar navbar-expand-lg bg-black" style="width:100%;">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" href="<?php echo e(url('/modelfeed ')); ?>" rel="tooltip" title="Go to Homepage" data-placement="bottom">
                        <img src="<?php echo asset('img/logo_white.png')?>" width="100">
                    </a>
                    <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-bar top-bar"></span>
                      <span class="navbar-toggler-bar middle-bar"></span>
                      <span class="navbar-toggler-bar bottom-bar"></span>
                    </button>
                </div>

                <div class="col-sm-1">
                </div>

              <!-- Options and logout-->
              <div class="collapse navbar-collapse justify-content-end" id="navigation">

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?php echo e(url('/modelfeed')); ?>" data-placement="bottom" rel="tooltip" title="Go to Homepage">
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(url('/modelprofile ')); ?>" rel="tooltip" title="Go to profile" role="button">
                        <img src="/uploads/avatars/<?php echo e(Auth::user()->avatar); ?>" width="25" height="25" alt="Thumbnail Image" class="rounded-circle img-raised">
                        <p>
                          <span class="d-lg-none d-md-block"> <?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?></span>
                        </p>
                        </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link dropdown-toggle" href="#pablo" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <p>
                                <i class="now-ui-icons">
                                  <span class="button-bar"></span>
                                  <span class="button-bar"></span>
                                  <span class="button-bar"></span>
                                </i>
                                <span class="d-lg-none d-md-block">   View Job Offers</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">View Job Offers</a>
                                <a class="dropdown-item" href="<?php echo e(url('/modelprofile')); ?>" style="color:black;">
                                <h6><?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?></h6></a>
                                <a class="dropdown-item" href="<?php echo e(url('/viewjoboffers')); ?>" style="color:black;">View Job Offers</a>
                                <a class="dropdown-item" href="<?php echo e(url('/subscription')); ?>" style="color:black;">Subscription</a> 
                                <a class="dropdown-item" href="<?php echo e(url('/#')); ?>" style="color:black;">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(url('/logout')); ?>" style="color:black;">Logout</a>
                            </div>
                      </li>
                    </ul>
                </div>

					</div><!-- nav container closing tag -->
	</nav>
  

  <!-- MAIN HOMEPAGE CONTENT -->
  <div class="wrapper">
      <!-- Logo Header -->
      <div class="page-header clear-filter">
        <div class="page-header-image" style="background-image:url()"></div>
      <!-- End logo header -->


      <!-- Feed Content -->
      <h4>Job Offers</h4>
      <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"><!--space-->
                </div>
                <div class="col-sm-6">

                <!-- Card for job offer contents -->
                
                    <div id="joboffer" class="card text-center">
                          <div class="card-body" style="color:#1b1b1b;">
                          <h4 class="card-title"><?php echo e($details->prjTitle); ?></h4>
                                <h6 class="card-title"><?php echo e($details->jobDescription); ?></h6>
                          <p>Email: <?php echo e($details->emailAddress); ?>    Company: <?php echo e($details->name); ?></p>
                                <p>Role: <?php echo e($details->role); ?></p>
                                <p>Talent fee: <?php echo e($details->talentFee); ?></p>
                                <p>Where: <?php echo e($details->address); ?>, <?php echo e($details->location); ?></p>
                                <form class="" action="/model/accept" method="post">
                                  <?php echo e(csrf_field()); ?>

                                    <input type="text" name="hireID" id="hireID" value="<?php echo e($details->hireID); ?>" readonly>
                                    <input type="text" name="emailAddress" id="emailAddress" value="<?php echo e($details->emailAddress); ?>" readonly>
                                    <button type="submit" name="button" class="btn btn-success btn-round">Accept</button>
                                    <button type="" name="button" class="btn btn-maroon btn-round">Reject</button>
                                </form>
                            </div>
                          <div class="card-footer text-muted mb-2">
                              <?php echo e($details->created_at); ?>

                          </div>
                    </div>

                    
                </div><!-- col-sm-6 closing tag -->

                <div class="col-sm-1"><!--space-->
                </div>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- Right Column contents -->

            <div class="col-sm-3">
                <div class="column">


                  <!-- Ads Card and carousel -->
                       <!-- Ads Card and carousel -->
                       <div class="card" style="width:100%;">
                        <div class="card-body" style="color:#1b1b1b; width:100%;">
                        <h5 class="card-title"><i class="now-ui-icons business_badge"></i>  Ads</h5>
                        <div id="carouselExampleIndicators" class="text-center carousel slide" data-ride="carousel" style="width:100%;">
                            <ol class="carousel-indicators">
                              <li data-target="#carouselExampleIndicators" data-slide-to="0"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner" role="listbox">
                              <div class="carousel-item">
                                <img class="d-block" src="<?php echo asset('img/background1.jpg')?>" alt="First slide">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>Ad title 1</h5>
                                </div>
                              </div>
                              <div class="carousel-item active">
                                <img class="d-block" src="<?php echo asset('img/header.jpg')?>" alt="Second slide">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>Ad title 2</h5>
                                </div>
                              </div>
                              <div class="carousel-item">
                                <img class="d-block" src="<?php echo asset('img/header2.jpg')?>" alt="Third slide">
                                <div class="carousel-caption d-none d-md-block">
                                  <h5>Ad Title 3</h5>
                                </div>
                              </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                              <i class="now-ui-icons arrows-1_minimal-left"></i>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                              <i class="now-ui-icons arrows-1_minimal-right"></i>
                            </a>
                          </div>
                        </div>
                      </div>

                </div><!-- column closing tag -->
            </div><!-- sm-3 closing tag -->

            <div class="col-sm-1"><!--space-->
            </div>

          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->


            </div>
    </div>

<?php $__env->stopSection(); ?>
</div>

<?php echo $__env->make('layouts.employerapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>