<title><?php echo $__env->yieldContent('pageTitle'); ?> View Haggle Offers </title>

<?php $__env->startSection('content'); ?>

<body class="landing-page sidebar-collapse" data-spy="scroll">
        <!-- Navigation bar -->
            <nav class="navbar navbar-expand-lg bg-black" style="width:100%;">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" href="<?php echo e(url('/employerHome')); ?>" rel="tooltip" title="Go to Homepage" data-placement="bottom">
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
                        <a class="nav-link" href="<?php echo e(url('/employerHome')); ?>" data-placement="bottom" rel="tooltip" title="Go to Homepage">
                            <p>Home</p>
                        </a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo e(url('/employerprofile ')); ?>" rel="tooltip" title="Go to profile" role="button">
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
                                <span class="d-lg-none d-md-block">   View Haggle Offers</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">View Haggle Offers</a>
                                <a class="dropdown-item" href="<?php echo e(url('/employerprofile')); ?>" style="color:black;"> 
                                <h6><?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?></h6></a>
                                <a class="dropdown-item" href="<?php echo e(url('/employer/viewapplicants')); ?>" style="color:black;">View Applicants</a>
                                <a class="dropdown-item" href="<?php echo e(url('/employer/haggleFee')); ?>" style="color:black;">View Haggle Offers</a>
                                <a class="dropdown-item" href="<?php echo e(url('/subscriptionEmployer')); ?>" style="color:black;">Subscription</a>
                                <a class="dropdown-item" href="<?php echo e(url('/employer/forgotPassword')); ?>" style="color:black;">Settings</a>
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
  <?php $__currentLoopData = $details->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <?php if($detail->haggleAmount != 0): ?>
      <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"><!--space-->
                </div>
                <div class="col-sm-8">

                <!-- Card for job offer contents -->
                <br>
                    <div id="joboffer" class="card text-center">
                          <div class="card-body" style="color:#1b1b1b;">
                          <h5 class="card-title"><b><?php echo e($detail->firstName); ?> <?php echo e($detail->lastName); ?> </b>wants to make an offer:</h5>
                                <h4 class="card-title">Project title: <?php echo e($detail->prjTitle); ?></h4>
                                <p>Amount: <b>P<?php echo e($detail->haggleAmount); ?>.00</b></p>
                                <form class="" action="/employer/accepthaggle" method="post">
                                  <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="hireID" id="hireID" value="<?php echo e($detail->hireID); ?>" readonly>
                                    <input type="hidden" name="emailAddress" id="emailAddress" value="<?php echo e($detail->emailAddress); ?>" readonly>
                                    <input type="hidden" name="status" id="status" value="<?php echo e($detail->haggleStatus); ?>" readonly>
                                    <?php if($detail->haggleStatus == 0): ?>
                                    <button type="submit" name="button" class="btn btn-success btn-round">Accept</button>
                                    <?php elseif($detail->haggleStatus == 1): ?>
                                    <button type="submit" name="button" class="btn btn-black btn-round" disabled>Accept</button>
                                    <?php else: ?>
                                    <?php endif; ?>
                                    <button type="" name="button" class="btn btn-maroon btn-round">Reject</button>
</form>
                                
                            </div>
                          
                    </div>

                    
                </div><!-- col-sm-8 closing tag -->

                <div class="col-sm-1"><!--space-->
                </div>
              <?php else: ?>
              <?php endif; ?>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <!-- Right Column contents -->

            <div class="col-sm-2"><!--space-->
            </div>

          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->


<!-- Confirm Accept Offer Modal -->
<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      
      <div id="confirm<?php echo e($detail->userID); ?>" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <h4 class="modal-title">Are you sure you want to accept the job offer <a style="color:#a01919;"><b><?php echo e($detail->prjTitle); ?></b></a> from <b><?php echo e($detail->firstName); ?> <?php echo e($detail->lastName); ?></a>?</h4><br>
                          </div>
                          <div class="modal-footer">
                            <div class="container">
                              <div class="col-sm-3">
                              </div>
                              <form class="" action="/employer/accepthaggle" method="post">
                                  <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="hireID" id="hireID" value="<?php echo e($detail->hireID); ?>" readonly>
                                    <input type="hidden" name="emailAddress" id="emailAddress" value="<?php echo e($detail->emailAddress); ?>" readonly>
                                    <input type="hidden" name="status" id="status" value="<?php echo e($detail->haggleStatus); ?>" readonly>
                                    <button type="submit" name="button" class="btn btn-success btn-round">Yes</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">No</button>
                                </form>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- End of Modal -->



            </div>
    </div>

<?php $__env->stopSection(); ?>
</div>

<?php echo $__env->make('layouts.employerapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>