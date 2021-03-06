<title><?php echo $__env->yieldContent('pageTitle'); ?> Welcome <?php echo e(Auth::user()->firstName); ?>! </title>

<?php $__env->startSection('content'); ?>

<body class="landing-page sidebar-collapse" data-spy="scroll">
  <!-- Navigation bar hehe -->
  <nav class="navbar navbar-expand-lg bg-black fixed-scroll" style="width:100%;">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" href="<?php echo e(url('/modelfeed ')); ?>" rel="tooltip" title="Browse now" data-placement="bottom">
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

            <!-- Search Bar -->
                  <div class="col-sm-6" style="padding-top:10px;">
                      <form action="<?php echo e(url('/search')); ?>" method="get">
                            <?php echo e(csrf_field()); ?>

                            <div class="input-group" width="100%">
                                    <input name="search" type="search" id="search" class="form-control form-control-search" placeholder="Search..." itemprop="query-input"  style="background:#fffff0;">
                            </div>
                  </div>
                  <div class="col-sm-1">
                                <button type="submit" name="button" class="btn btn-maroon btn-round"><i class="now-ui-icons ui-1_zoom-bold"></i></button>
                  </div>
                  
                      </form>
                  

                <div class="col-sm-1">
                </div>

              <!-- Options and logout-->
              <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    
                  <ul class="navbar-nav">
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
                                <span class="d-lg-none d-md-block">   Homepage</span>
                              </p>
                            </a>
                            <?php if(Auth::user()->status == 1): ?>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">Homepage</a>
                                <a class="dropdown-item" href="<?php echo e(url('/modelprofile')); ?>" style="color:black;">
                                <h6><?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?></h6></a>
                                <a class="dropdown-item" href="<?php echo e(url('/model/viewJobOffers')); ?>" style="color:black;">View Job Offers</a>
				<a class="dropdown-item" href="<?php echo e(url('/model/viewAcceptedApplication')); ?>" style="color:black;">View Accepted Applications</a>
                                <a class="dropdown-item" href="<?php echo e(url('/subscription')); ?>" style="color:black;">Subscription</a>
                                <a class="dropdown-item" href="<?php echo e(url('/model/forgotPassword')); ?>" style="color:black;">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(url('/logout')); ?>" style="color:black;">Logout</a>
                            </div>
                            <?php else: ?>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">Homepage</a>
                                <a class="dropdown-item" href="<?php echo e(url('/modelprofile')); ?>" style="color:black;">
                                <h6><?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?></h6></a>
                                
                                <a class="dropdown-item" href="<?php echo e(url('/subscription')); ?>" style="color:black;">Subscription</a>
                                <a class="dropdown-item" href="<?php echo e(url('/model/forgotPassword')); ?>" style="color:black;">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo e(url('/logout')); ?>" style="color:black;">Logout</a>
                            </div>
                            <?php endif; ?>
                      </li>
                  </ul>

              </div>

					</div><!-- nav container closing tag -->
	</nav>
  

  <!-- MAIN HOMEPAGE CONTENT -->
  <div class="wrapper">
      <!-- Logo Header -->
      <div class="page-header clear-filter">
        <div class="page-header-image"></div>
      <!-- End logo header -->


      <!-- Feed Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2"><!--space-->
                </div>
                <div class="col-sm-7">

                     <?php $__currentLoopData = $projects->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <?php if($project->hidden > 0): ?> 
                        <div id="jobpost" class="card text-center">
                          <div class="card-header">

                          <!-- Report Job post dropdown -->
                          <div class="dropdown" style="float:right; padding-right:10px;">
                                  <button type="button" class="btn btn-round no-border btn-default btn-simple btn-icon no-caret" data-toggle="dropdown" style="border-color: transparent;">
                                      <img src="<?php echo asset('img/dots.png')?>" height="30">
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-left">

                                    <!-- Report Job Post modal activator-->
                                      <button data-toggle="modal" data-target="#report<?php echo e($project->projectID); ?>" name="button" class="dropdown-item text-danger">Report Job Post</button>
                                    
                                  </div>
                                </div>
                          </div>
                          <!-- End of Job post dropdown -->

                          <div class="card-body" style="color:#1b1b1b;">
                            <h4 class="card-title"><img src="<?php echo e(asset('/uploads/avatars/'.$project->avatar)); ?>" width="40" height="40" alt="Thumbnail Image" class="rounded-circle">   <b><?php echo e($project->prjTitle); ?></b></h4> 
                            <p class="card-text"><?php echo e($project->jobDescription); ?></p>

                            <!-- Apply form tag -->

                            <form class="" action="<?php echo e(url('/model/apply')); ?>" method="post">
                              <?php echo e(csrf_field()); ?>

                              <?php if(Auth::user()->status == 1): ?>
                              <a data-toggle="modal" data-target="#<?php echo e($project->projectID); ?>" style="color:white;"class="btn btn-maroon btn-round">View more details</a>
                              <a data-toggle="modal" data-target="#confirm<?php echo e($project->projectID); ?>" style="color:white;"class="btn btn-info btn-round">Apply</a>
                              
                              <?php else: ?>
                              <?php endif; ?>
                            </form>
                          </div>

                          <div class="card-footer text-muted mb-2">
                            <?php echo e($project->created_at->diffForHumans()); ?>

                          </div>
                        </div>
                        <?php else: ?>      
                        <?php endif; ?>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    
                </div><!-- col-sm-6 closing tag -->

                <div class="col-sm-1"><!--space-->
                </div>


            <div class="col-sm-1"><!--space-->
            </div>

          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->

</div>

 <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
  <!-- View Job detials Modal -->
  <div id="<?php echo e($project->projectID); ?>" class="modal fade show" style="padding-top: 80px;" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">

          <!-- Modal content-->
                <div class="modal-content" style="color:black;">
                    <div class="modal-header">
                      <div class="column">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title"><img src="<?php echo e(asset('/uploads/avatars/'.$project->avatar)); ?>" width="40" height="40" alt="Thumbnail Image" class="rounded-circle">    <b><?php echo e($project->prjTitle); ?></b></h4>
                          <h0>Posted <?php echo e($project->created_at->diffForHumans()); ?> by <a style="color:#a01919;" href="/employerp/view/<?php echo e($project->userID); ?>"><?php echo e($project->name); ?></a><h0>
                      </div>
                    </div>
                    <div class="modal-body">
                      <h5>Contact Details</h5>
                      <ul>
                        <li>
                            <h0>Name: <b><?php echo e($project->firstName); ?> <?php echo e($project->lastName); ?></b></h0>
                        </li>
                        <li>
                          <h0>Email: <b><?php echo e($project->emailAddress); ?></b></h0>
                      </li>
                      </ul>

                      <h5>Project Details</h5>
                      <ul>
                          <li>
                              <h0>Location: <b><?php echo e($project->address); ?></b></h0>
                          </li>
                          <li>
                            <h0>Date: <b><?php echo e($project->jobDate); ?> to <?php echo e($project->jobEnd); ?></b></h0>
                        </li>
                          <li>
                              <h0>Number of Models: <b><?php echo e($project->modelNo); ?></b></h0>
                          </li>
                          <li>
                              <h0>Model Type: <b><?php echo e($project->role); ?></b></h0>
                          </li>
                          <li>
                              <h0>Talent Fee: <b>P<?php echo e($project->talentFee); ?>.00</b></h0>
                          </li>
                      </ul>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Close</button>
                    </div>
                </div>
              </div>
            </div>
          <!-- End of Modal -->
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!-- Apply to job confirmation Modal -->
                <div id="confirm<?php echo e($project->projectID); ?>" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <h4 class="modal-title">Are you sure you want to apply to <a style="color:#a01919;"><?php echo e($project->prjTitle); ?></a>?</h4>
                          </div>
                          <div class="modal-footer text-center">
                            <div class="container">
                              <div class="col-sm-3">
                              </div>
                              <form class="" action="<?php echo e(url('/model/apply')); ?>" method="post">
                              <?php echo e(csrf_field()); ?>

                              
                              <input type="hidden" name="projectID" id="projectID" value="<?php echo e($project->projectID); ?>" readonly>
                              <button type="submit" name="button" class="btn btn-success btn-round">Apply</button>
                              <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">No</button>
                              </form>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
	    </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<!-- End of Modal -->


<!-- Report Job Post Modal -->
        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <div id="report<?php echo e($project->projectID); ?>" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Why are you reporting this post?</h4>
                          </div>
                          <div class="modal-body">
                          <form class="" action="<?php echo e(url('/model/reportJobPost')); ?>" method="post">
                              <?php echo e(csrf_field()); ?>

                              <input style="hidden" type="hidden" name="projectID" id="projectID" value="<?php echo e($project->projectID); ?>" readonly>
                              <input style="hidden" type="hidden" name="userID" id="userID" value="<?php echo e($project->userID); ?>" readonly>
                              <div class="input-group input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                </div>
                                <select size="0.4" class="form-control" name="reason" id="reason" required>
                                    <option value="" selected disabled>Select reason..</option>
                                        <option value="Illegal Activity">Illegal Activity</option>
                                        <option value="Human Trafficking">Human Trafficking</option>
                                        <option value="Pornography">Pornography</option>
                                        <option value="Promotion of Drugs">Promotion of Drugs</option>
                                </select>
                            </div>
                          </div>
                          <div class="modal-footer text-center">
                            <div class="container">
                              <div class="col-sm-3">
                              </div>
                              <button type="submit" name="button" class="btn btn-success btn-round">Report</button>
                              <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Cancel</button>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
	   </div>
              <!-- End of Modal -->
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


            </div>
    </div>

   
      

<?php $__env->stopSection(); ?>
</div>

<?php echo $__env->make('layouts.modelapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>