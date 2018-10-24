<title><?php echo $__env->yieldContent('pageTitle'); ?> Welcome <?php echo e(Auth::user()->firstName); ?>! </title>

<?php $__env->startSection('content'); ?>

<body class="landing-page sidebar-collapse" data-spy="scroll">

  <!-- Navigation bar -->
    <nav class="navbar navbar-expand-lg bg-black" style="width:100%;">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" href="<?php echo e(url('/employerHome')); ?>" rel="tooltip" title="Browse now" data-placement="bottom">
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
                  <div class="col-sm-4">
                      <form action="/find" method="get">
                            <?php echo e(csrf_field()); ?>

                                <div class="input-group" style="padding-top:10px;" >
                                    <input name="find" id="find" class="form-control form-control-search" placeholder="Search..." itemprop="query-input" style="background:#fffff0;">
                                  </div>
                  </div>
                  <div class="col-sm-2">
                                <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.4" class="form-control" name="searchtype" id="searchtype" style="background:#fffff0;">
                                                <option value="" selected disabled>Select role of model..</option>
                                                    <option value="Fashion">Fashion(Editorial) model</option>
                                                    <option value="Runway">Runway model</option>
                                                    <option value="Commercial">Commercial model</option>
                                                    <option value="Plus size">Plus size model</option>
                                                    <option value="Petite">Petite model</option>
                                                    <option value="Swimsuit">Swimsuit Model</option>
                                                    <option value="Lingerie">Lingerie Model</option>
                                                    <option value="Glamour">Glamour Model</option>
                                                    <option value="Fitness">Fitness Model</option>
                                                    <option value="Fitting">Fitting Model</option>
                                                    <option value="Parts">Parts Model</option>
                                                    <option value="Promotional">Promitional Model</option>
                                                    <option value="Mature">Mature Model</option>
                                            </select>
                                        </div>
                </div>
                            <button type="submit" name="button" class="btn btn-maroon btn-round"><i class="now-ui-icons ui-1_zoom-bold"></i></button>
                      </form>

                <div class="col-sm-1">
                </div>

              <!-- Options and logout-->
              <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    
                  <ul class="navbar-nav">
                    <li class="nav-item">
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
                                <span class="d-lg-none d-md-block">   Homepage</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">Homepage</a>
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
	</nav><!-- Nav ending tag -->
  


  <!-- MAIN HOMEPAGE CONTENT -->
  <div class="wrapper">
      <!-- Logo Header -->
      <div class="page-header clear-filter">
        <div class="page-header-image" style="background-image:url()"></div>
      <!-- End logo header -->


      <!-- Feed Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"><!--space-->
                </div>
   
<!-- Two Column Display loop of Models Shown-->
<div class="column">
  <table style="width:100%;">
      <?php $__currentLoopData = $user->chunk(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
              <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <td>
                    <?php if($user->typeID == 2): ?>
                      <div style="display: none;">
                        <?php else: ?>
                    <div class="col-md-12 col-sm-12 col-md-12" style="width:100%;">
                      <div id="model" class="card text-center">
                          <div class="card-body" style="color:#1b1b1b;" style="width:100%;">
                            <h5 class="card-title"><b><?php echo e($user->firstName); ?> <?php echo e($user->lastName); ?></b></h5>
                              <img src="/uploads/avatars/<?php echo e($user ->avatar); ?>" alt="Thumbnail Image" class="img-raised" width="200" height="200"><br>
                            <!--Buttons with icons -->
                               <form class="hire" action="/employer/hire" method="post">
                                  <?php echo e(csrf_field()); ?>

                                  <!-- Attributes Modal Button -->
                                  <a data-toggle="modal" data-target="#attributes<?php echo e($user->userID); ?>" style="color:white;" class="btn btn-success btn-round" rel="tooltip" title="View Attributes"><i class="now-ui-icons design_bullet-list-67"></i></a>
                                  <!-- View Profile Button -->
                                  <a href="<?php echo e(url('/profile/view/'.$user->userID)); ?>" target="_blank" class="btn btn-maroon btn-round" rel="tooltip" title="View profile"><i class="now-ui-icons design_image"></i></a> 
                                  <!-- Hire Modal Button -->
                                  <a data-toggle="modal" data-target="#hire<?php echo e($user->userID); ?>" style="color:white;" class="btn btn-info btn-round" rel="tooltip" title="Hire Model"><i class="now-ui-icons ui-1_check"></i></a>
                                </form>
                          </div>
                          <div class="card-footer text-muted mb-2">
                            <?php echo e($user ->skill); ?>

                          </div>
                        </div>
                      </div>
                      <?php endif; ?>
                    </div>
                  </td>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
</div>

  


          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->


     <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <!-- View model attributes Modal -->
          <div id="attributes<?php echo e($details->userID); ?>" class="modal fade show" style="padding-top: 50px;" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">

          <!-- Modal content-->
                <div class="modal-content" style="color:black;">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <br><img src="/uploads/avatars/<?php echo e($details ->avatar); ?>" alt="Thumbnail Image" width="60" height="60" class="rounded-circle img-raised">
                    <h4><?php echo e($details->firstName); ?> <?php echo e($details->lastName); ?></h4><br>
                    <h6><h6><br>
                    </div>
                    <div class="modal-body">
                      <br><h6><?php echo e($details->skill); ?></h6><br>
                      <p>Attributes</p>
                      <ul>
                          <li>
                              <h0>Gender: <b><?php echo e($details->gender); ?><b></h0>
                          </li>
                          <li>
                              <h0>Eye Color: <b><?php echo e($details->eyeColor); ?><b></h0>
                          </li>
                          <li>
                              <h0>Hair Color: <b><?php echo e($details->hairColor); ?><b> </h0>
                          </li>
                          <li>
                              <h0>Hair Length: <b><?php echo e($details->hairLength); ?><b> </h0>
                          </li>
                          <li>
                              <h0>Weight: <b><?php echo e($details->weight); ?> lbs<b></h0>
                          </li>
                          <li>
                              <h0>Height: <b><?php echo e($details->height); ?> cm<b></h0>
                          </li>
                          <li>
                              <h0>Skin Color: <b><?php echo e($details->complexion); ?><b></h0>
                          </li>
                      </ul>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Dismiss</button>
                      <a class="btn btn-info btn-round" href="<?php echo e(url('/profile/view/'.$details->userID)); ?>" target="_blank">View Profile</a>
                    </div>
                </div>
              </div>
            </div>
          <!-- End of Modal -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                       
          <!-- Hiring confirmation Modal with job posts -->
                <div id="hire<?php echo e($model->userID); ?>" class="modal fade" tabindex="-1" style="padding-top: 150px;" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                          <h4 class="modal-title">Are you sure you want to hire <b><?php echo e($model->firstName); ?> <?php echo e($model->lastName); ?></b>?</h4><br>
                          <!-- Opening Form Tag -->
                              <form class="" action="/employer/hire" method="post">
                                    <?php echo e(csrf_field()); ?>

                                    
                                  <input type="hidden" name="modelID" id="modelID" value="<?php echo e($model->userID); ?>" readonly>
                                  <input type="hidden" name="emailAddress" id="emailAddress" value="<?php echo e($model->emailAddress); ?>" readonly>
                                  <label>Choose Project:</label>
                                    <div class="input-group input-lg">
                                      <div class="input-group-prepend">
                                          <span class="input-group-text">
                                          </span>
                                      </div>
                                      <select size="0.4" class="form-control" name="projectID" id="projectID" required>
                                          <option value="" selected disabled>Select Project..</option>
                                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($project->hidden == 1): ?>
                                              <option value="<?php echo e($project->projectID); ?>"><?php echo e($project->prjTitle); ?></option>
<<<<<<< Updated upstream
                                              <?php else: ?>
=======
                                              <?php else: ?> 
>>>>>>> Stashed changes
                                              <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                      </select>
                            </div><br>
                          </div>
                          <div class="modal-footer">
                            <div class="container">
                              <div class="col-sm-3">
                              </div>
                              <div class="row">
                              <div class="col-sm-4"></div>
                                
                                    <button type="submit" name="button" class="btn btn-success btn-round">Hire</button>
                                    <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Cancel</button>

                                </form>
                            <!--Closing form tag -->
                              </div>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <!-- End of Modal -->


            </div>
    </div>


<?php $__env->stopSection(); ?>
</div>
<?php echo $__env->make('layouts.employerapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>