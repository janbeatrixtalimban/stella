<title><?php echo $__env->yieldContent('pageTitle'); ?> View Applicants </title>

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
                                <span class="d-lg-none d-md-block">   View Applicants</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">View Applicants</a>
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
      <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"><!--side navbar-->
                    <div class="side-navbar" style="color:black; border-right:black;">
                        <h4>View Applicants</h4>
                        <br>
                        <ul class="nav flex-column">
                          <h6>Job Post</h6><br>
                          <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="nav-item">
                                <a class="nav-link" value="<?php echo e($project->projectID); ?>" href="<?php echo e($project->projectID); ?>"><?php echo e($project->prjTitle); ?></a>
                            </li>
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><br><br>
                        </ul>
                    </div>
                </div><br><br>
              
        <div class="col-sm-9">
  <!-- Job Post Applicants --> 
                    
            <?php $__currentLoopData = $details->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           
            <div class="row">
                <div class="column">
                    <table>
                        <tr>
                                      
                          <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($details->applicantStatus != 2): ?>
                            <td>
                         
                                              
                                <h4 style="color:#1b1b1b;"><?php echo e($details->prjTitle); ?></h4>
                                    <div class="col-sm-12">
                                          <div id="model" class="card text-center">
                                                <div class="card-body" style="color:#1b1b1b;">
                                                    <h5 class="card-title"><?php echo e($details->firstName); ?> <?php echo e($details->lastName); ?></h5>
                                                    <img src="/uploads/avatars/<?php echo e($details ->avatar); ?>" alt="" class="img-raised" width="200" height="200"><br>
                                                <!--Buttons with icons -->

                                                    <form class="" action="/employer/accept" method="post">
                                                      <?php echo e(csrf_field()); ?>

                                                        <input type="hidden" name="applicantID" id="applicantID" value="<?php echo e($details->applicantID); ?>" readonly>
                                                        <input type="hidden" name="emailAddress" id="emailAddress" value="<?php echo e($details->emailAddress); ?>" readonly>
                                                        <input type="hidden" name="status" id="status" value="<?php echo e($details->applicantStatus); ?>" readonly>
                                                        <?php if($details->applicantStatus == 0): ?>
                                                        <button type="submit" name="button" class="btn btn-success btn-round">Accept</button>
                                                        <?php elseif($details->applicantStatus == 1): ?>
                                                        <button type="submit" name="button" class="btn btn-success btn-round" disabled>Accept</button>
                                                        <?php else: ?>
                                                        <?php endif; ?>
                                                       
                                                    </form>
                                                    <form class="" action="/employer/reject" method="post">
                                                        <?php echo e(csrf_field()); ?>

                                                          <input type="hidden" name="applicantID" id="applicantID" value="<?php echo e($details->applicantID); ?>" readonly>
                                                          <input type="hidden" name="emailAddress" id="emailAddress" value="<?php echo e($details->emailAddress); ?>" readonly>
                                                          <input type="hidden" name="status" id="status" value="<?php echo e($details->applicantStatus); ?>" readonly>
                                                          <?php if($details->applicantStatus == 0): ?>
                                                          <button type="submit" name="button" class="btn btn-maroon btn-round">Reject</button>
                                                          <?php elseif($details->applicantStatus == 1): ?>
                                                          <button type="submit" name="button" class="btn btn-maroon btn-round" disabled>Reject</button>
                                                          <?php else: ?>
                                                          <?php endif; ?>
                                                          
                                                      </form>
                                                </div>
                                                <div class="card-footer text-muted mb-2">
                                                    <?php echo e($details->skill); ?>

                                                </div>
                                            </div>
                                      </div>
                            </td> 
                            <?php else: ?>
                            <?php endif; ?>
                                        
                          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </tr>
                        
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>

                  </div>
                </div>
              </div>
            </div><!--col-sm-9 closing -->

        
        <!-- Right Column contents -->

            <div class="col-sm-1"><!--space-->
            </div>


            </div><!--feed content row closing tag -->
        </div><!-- container fluid closing tag-->


      


<?php $__env->stopSection(); ?>
</div>

<?php echo $__env->make('layouts.employerapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>