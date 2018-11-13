<title><?php echo $__env->yieldContent('pageTitle'); ?> Subscription </title>

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
                        <img src="<?php echo e(asset('/uploads/avatars/'.Auth::user()->avatar)); ?>" width="25" height="25" alt="Thumbnail Image" class="rounded-circle img-raised">
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
                                <span class="d-lg-none d-md-block">   Subscription</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">Subsription</a>
                                <a class="dropdown-item" href="<?php echo e(url('/modelprofile')); ?>" style="color:black;">
                                <h6><?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?></h6></a>
                                <a class="dropdown-item" href="<?php echo e(url('/model/viewJobOffers')); ?>" style="color:black;">View Job Offers</a>
                                <a class="dropdown-item" href="<?php echo e(url('/subscription')); ?>" style="color:black;">Subscriptions</a> 
                                <a class="dropdown-item" href="<?php echo e(url('/model/forgotPassword')); ?>" style="color:black;">Settings</a>
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
        <div class="page-header-image" ></div>
      <!-- End logo header -->


      <!-- Body content -->
      <div class="section section-introduction">
        <div class="container-fluid" >
            <div class="row">
                <div class="col-md-8 ml-auto mr-auto text-center">
            <?php if( Auth::user()->status == 0): ?>
                <h2 class="title" style="color:#1b1b1b;">Why go premium with Stella?</h2>
                <h5 class="description" style="color:black;">With Stella premium, you can avail more features such as viewing more job details and applying to the job post and getting invites from employers to join their projects. With just <b>P169 monthly</b>, subscribers can enjoy the privileges of a breezy job hunting process. </h5>
            <?php else: ?>
                <h2 class="title" style="color:#1b1b1b;">Thank you for subscribing to Stella Premium!</h2>
                <h5 class="description" style="color:black;">Dear <?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?>, enjoy your premium subscription! Your subscription will automatically end in <?php echo e($diff); ?> days, be sure to renew your subscription if you want to maintain your premium membership. </h5>
            <?php endif; ?>
                <br><br><br>
                    <div class="col-md-7 ml-auto mr-auto">
                    <?php if( Auth::user()->status == 0): ?>
                        <div id="jobpost" class="card text-center">
                            <div class="card-body text-center" style="color:#1b1b1b;">
                                <h3 class="card-title text-center">Stella Model Premium</h3>
                                <p class="card-text">
                                    Subscribe to Stella Premium today to enjoy more!<br><br>
                                </p>
                                <h5><b>Get for P169 monthly</b></h5>
                                <form class="in-line" method="POST" action="<?php echo e(url('/freetrial')); ?>">
                                <?php echo e(csrf_field()); ?>

                                        <input type="hidden" class="form-control" name="userID" id="userID" value="<?php echo e(Auth::user()->userID); ?>" required >
                                        <input type="hidden" class="form-control" name="amount" id="amount" value="0.00" required >
                                        <input type="hidden" class="form-control" id="email" name="email" value="<?php echo e(Auth::user()->emailAddress); ?>"  required> 
                                        <input type="hidden" class="form-control" id="first_name" name="first_name" value="<?php echo e(Auth::user()->firstName); ?>"  required >
                                        <input type="hidden" class="form-control" id="last_name" name="last_name" value="<?php echo e(Auth::user()->lastName); ?>"  required >
                                        <input type="hidden" class="form-control" id="payer_id" name="payer_id" value="<?php echo e(Auth::user()->userID); ?>" required>
                                        <input type="hidden" class="form-control" id="transactiondetails" name="transactiondetails" value="1"  required>
                                    <button type="submit" class="btn btn-info btn-round btn-lg" style="display: <?php echo e($hidetrial); ?>;">7-Day Trial</button><br>
                                    <a href="/gopremium" target="_blank" class="btn btn-maroon btn-round btn-lg">Subscribe</a><br>
                                </form>
                            </div>
                                <a href="/modelfeed">No, thanks</a>
                            <div class="card-footer text-muted mb-2">
                            </div>
                        </div>
                    <?php else: ?>
                        <a href="/modelfeed" class="btn btn-maroon btn-round btn-lg">Start Browsing!</a>
                    <?php endif; ?>
                    </div>
                </div>
          </div><!--feed content row closing tag -->
      </div><!-- container closing tag-->
    </div><!-- section closing tag-->
            </div>
    </div>
<?php $__env->stopSection(); ?>
</div>
<?php echo $__env->make('layouts.modelapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>