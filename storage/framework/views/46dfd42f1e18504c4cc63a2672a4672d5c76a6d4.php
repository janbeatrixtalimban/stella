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
                        
                    </div>
                </div><br><br>
              
        <div class="col-sm-9">
  <!-- Job Post Applicants --> 
                    
        <?php $__currentLoopData = $details->chunk(6)->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           
            <div class="row">
                <div class="column">
                    <table>
                        <tr>
                                      
                        <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($detail->applicantStatus != 2): ?>
                            <td>
                         
                                <?php if($detail->applicantStatus == 0): ?>              
                                <h5 style="color:#1b1b1b;" rel="tooltip" title="Pending."><?php echo e($detail->prjTitle); ?></h5>
                                <?php elseif($detail->applicantStatus == 1): ?>
                                <h5 style="color:green;" rel="tooltip" title="Hired."><?php echo e($detail->prjTitle); ?></h5>
                                <?php else: ?>
                                <?php endif; ?>
                                    <div class="col-sm-12">
                                        <div id="model" class="card text-center">
                                            <div class="card-body" style="color:#1b1b1b;">
                                                <h5 class="card-title"><?php echo e($detail->firstName); ?> <?php echo e($detail->lastName); ?></h5>
                                                    <img src="/uploads/avatars/<?php echo e($detail ->avatar); ?>" alt="" class="img-raised" width="200" height="200"><br>

                                <!--Accept button modal trigger with icon -->
                                        <?php if($detail->applicantStatus == 0): ?>
                                            <button data-toggle="modal" data-target="#accept<?php echo e($detail->applicantID); ?>" type="submit" name="button" class="btn btn-success btn-round"><i class="now-ui-icons ui-1_check"></i></button>
                                        <?php elseif($detail->applicantStatus == 1): ?>
                                            <button data-toggle="modal" data-target="#accept<?php echo e($detail->applicantID); ?>" type="submit" name="button" class="btn btn-success btn-round"><i class="now-ui-icons ui-1_check" disabled></i></button>
                                        <?php else: ?>
                                        <?php endif; ?>
                                <!--Accept button modal trigger with icon -->
                                        <?php if($detail->applicantStatus == 0): ?>
                                            <button data-toggle="modal" data-target="#reject<?php echo e($detail->applicantID); ?>" type="submit" name="button" class="btn btn-maroon btn-round"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                                        <?php elseif($detail->applicantStatus == 2): ?>
                                            <button data-toggle="modal" data-target="#reject<?php echo e($detail->applicantID); ?>" type="submit" name="button" class="btn btn-maroon btn-round"><i class="now-ui-icons ui-1_simple-remove" disabled></i></button>
                                        <?php else: ?>
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-footer text-muted mb-2">
                                        <?php echo e($detail->skill); ?>

                                    </div>
                                </div>
                            </div>
                        </td> 
                            <?php else: ?>
                            <?php endif; ?>
                                        
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tr>
                        
                    </table>

                </div>
            </div>
            
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div><!--col-sm-9 closing -->

        
        <!-- Right Column contents -->

            <div class="col-sm-1"><!--space-->
            </div>


<!-- Accept Confirmation Modal --> 
    <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!-- Apply to job confirmation Modal -->
            <div id="accept<?php echo e($detail->applicantID); ?>" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <?php if($detail->applicantStatus == 0): ?>
                            <h4>Are you sure your want to hire <?php echo e($detail->firstName); ?> <?php echo e($detail->lastName); ?> to <a style="color:#a01919;"><?php echo e($detail->prjTitle); ?></a>?</h4>
                            <?php elseif($detail->applicantStatus == 1): ?>
                            <h4>You have already hired <b><?php echo e($detail->firstName); ?> <?php echo e($detail->lastName); ?></b> to <a style="color:#a01919;"><?php echo e($detail->prjTitle); ?></a> project.
                            </h4>
                            <?php else: ?>
                            <?php endif; ?>
                        </div>
                          <div class="modal-footer">
                          <div class="container">
                              <div class="col-sm-2">
                              </div>
                              <form class="" action="/employer/accept" method="post">
                                <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="applicantID" id="applicantID" value="<?php echo e($detail->applicantID); ?>" readonly>
                                    <input type="hidden" name="emailAddress" id="emailAddress" value="<?php echo e($detail->emailAddress); ?>" readonly>
                                    <input type="hidden" name="status" id="status" value="<?php echo e($detail->applicantStatus); ?>" readonly>
                                    <?php if($detail->applicantStatus == 0): ?>
                                    <button type="submit" name="button" class="btn btn-success btn-round">Yes</button>
                                    <?php elseif($detail->applicantStatus == 1): ?>
                                    <button type="submit" name="button" class="btn btn-success btn-round" hidden>Yes</button>
                                    <?php else: ?>
                                    <?php endif; ?>
                                    <?php if($detail->applicantStatus == 0): ?>
                                    <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">No</button> 
                                    <?php elseif($detail->applicantStatus == 1): ?>
                                    <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal" style="float:right;">Dismiss</button>
                                    <?php else: ?>
                                    <?php endif; ?>                   
                                </form>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- End of Accept Confirmation Modal -->



    <!-- Reject Confirmation Modal -->                        
            <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <!-- Apply to job confirmation Modal -->
            <div id="reject<?php echo e($detail->applicantID); ?>" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            <?php if($detail->applicantStatus == 0): ?>
                            <h4>Are you sure your want to reject <?php echo e($detail->firstName); ?> <?php echo e($detail->lastName); ?>'s application to <a style="color:#a01919;"><?php echo e($detail->prjTitle); ?></a>?</h4>
                            <?php elseif($detail->applicantStatus == 2): ?>
                            <h4>You have rejected <b><?php echo e($detail->firstName); ?> <?php echo e($detail->lastName); ?></b> from joining the <a style="color:#a01919;"><?php echo e($detail->prjTitle); ?></a> project.
                            </h4>
                            <?php else: ?>
                            <?php endif; ?>
                        </div>
                          <div class="modal-footer">
                          <div class="container">
                              <div class="col-sm-2">
                              </div>
                              <form class="" action="/employer/reject" method="post">
                                <?php echo e(csrf_field()); ?>

                                    <input type="hidden" name="applicantID" id="applicantID" value="<?php echo e($detail->applicantID); ?>" readonly>
                                    <input type="hidden" name="emailAddress" id="emailAddress" value="<?php echo e($detail->emailAddress); ?>" readonly>
                                    <input type="hidden" name="status" id="status" value="<?php echo e($detail->applicantStatus); ?>" readonly>

                                    <?php if($detail->applicantStatus == 0): ?>
                                    <button type="submit" name="button" class="btn btn-success btn-round">Yes</button>
                                    <?php elseif($detail->applicantStatus == 2): ?>
                                    <button type="submit" name="button" class="btn btn-success btn-round" hidden>Yes</button>
                                    <?php else: ?>
                                    <?php endif; ?>
                                    <?php if($detail->applicantStatus == 0): ?>
                                    <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">No</button> 
                                    <?php elseif($detail->applicantStatus == 2): ?>
                                    <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal" style="float:right;">Dismiss</button>
                                    <?php else: ?>
                                    <?php endif; ?>                   
                                </form>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!-- End of Reject Confirmation Modal -->


            </div><!--feed content row closing tag -->
        </div><!-- container fluid closing tag-->


      


<?php $__env->stopSection(); ?>
</div>

<?php echo $__env->make('layouts.employerapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>