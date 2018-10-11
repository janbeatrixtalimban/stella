<title><?php echo $__env->yieldContent('pageTitle'); ?> Welcome <?php echo e(Auth::user()->firstName); ?>! </title>

<?php $__env->startSection('content'); ?>

<body class="landing-page sidebar-collapse" data-spy="scroll">
  <!-- Navigation bar hehe -->
  <nav class="navbar navbar-expand navbar-dark bg-black flex-column flex-md-row bd-navbar">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" href="<?php echo e(url('/employerHome')); ?>" rel="tooltip" title="Browse now" data-placement="bottom">
                        <img src="<?php echo asset('img/logo_white.png')?>" width="100">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#example-navbar-danger" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-bar bar1"></span>
                      <span class="navbar-toggler-bar bar2"></span>
                      <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>

                <div class="col-sm-1">
                </div>

            <!-- Search Bar -->
                  <div class="col-sm-4">
                      <form action="/find" method="get">
                            <?php echo e(csrf_field()); ?>

                                <div class="input-group no-border" style="padding-top:10px;" >
                                    <input name="find" id="find" class="form-control form-control-search" placeholder="Search..." itemprop="query-input">
                                  </div>
                  </div>
                  <div class="col-sm-2">
                                <div class="input-group no-border input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.4" class="form-control" name="searchtype" id="searchtype">
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
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo e(url('/employerprofile ')); ?>" rel="tooltip" title="Go to profile" role="button">
                        <img src="/uploads/avatars/<?php echo e(Auth::user()->avatar); ?>" width="25" height="25" alt="Thumbnail Image" class="rounded-circle img-raised">
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
                <div class="col-sm-1"><!--space-->
                </div>
   
<!-- Two Column Display loop of Models Shown-->
<div class="column">
  <table>
      <?php $__currentLoopData = $user->chunk(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chunk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
              <?php $__currentLoopData = $chunk; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <td>
                    <?php if($user->typeID == 2): ?>
                      <div style="display: none;">
                        <?php else: ?>
                    <div class="col-sm-12">
                      <div id="model" class="card text-center">
                          <div class="card-body" style="color:#1b1b1b;">
                            <h4 class="card-title"><?php echo e($user->firstName); ?> <?php echo e($user->lastName); ?></h4>
                              <img src="/uploads/avatars/<?php echo e($user ->avatar); ?>" alt="" class="img-raised" width="200" height="200"><br>
                            <!--Buttons with icons -->
                               <form class="" action="/employer/hire" method="post">
                                  <?php echo e(csrf_field()); ?>

                                  <a data-toggle="modal" data-target="#<?php echo e($user->userID); ?>" style="color:white;" class="btn btn-maroon btn-round" rel="tooltip" title="View Attributes"><i class="now-ui-icons design_bullet-list-67"></i></a>
                                  <a href="<?php echo e(url('/profile/view/'.$user->userID)); ?>" target="_blank" class="btn btn-black btn-round" rel="tooltip" title="View profile"><i class="now-ui-icons design_image"></i></a> 
                                  <input type="hidden" name="userID" id="userID" value="<?php echo e($user->userID); ?>" readonly>
                                  <button type="submit" name="button" class="btn btn-info btn-round" rel="tooltip" title="Hire Model"><i class="now-ui-icons ui-1_check"></i></button>
                                </form>
                          </div>
                          <div class="card-footer text-muted mb-2">
                            <?php echo e($user ->skill); ?>

                          </div>
                        </div>
                      </div>
                      <?php endif; ?></div></td>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </table>
</div>

            

          <!-- Right Column contents -->
            <div class="col-sm-3">
                <div class="column">

                  <!-- Ads Card and carousel -->
                      <div class="card">
                        <div class="card-body" style="color:#1b1b1b; height: 15rem;">
                        <h5 class="card-title"><i class="now-ui-icons business_badge"></i>  Ads</h5>
                        <div id="carouselExampleIndicators" style="width: 16rem;" class="text-center carousel slide" data-ride="carousel">
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


          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->


      <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <!-- View model attributes Modal -->
          <div id="<?php echo e($details->userID); ?>" class="modal fade show" style="padding-top: 100px;" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">

          <!-- Modal content-->
                <div class="modal-content" style="color:black;">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title"><?php echo e($details->firstName); ?> <?php echo e($details->lastName); ?></h4>
                    </div>
                    <div class="modal-body">
                      <h6><?php echo e($details->skill); ?></h6><br>
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
                      <button type="button" class="btn btn-info btn-round" href="<?php echo e(url('/modelProfile')); ?>" target="_blank">View Profile</button>
                    </div>
                </div>
              </div>
            </div>
          <!-- End of Modal -->
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          <!-- Apply to job confirmation Modal -->
                <div id="confirmhire" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog confirmapplymodal" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Are you sure you want to hire (Model Name)?</h4>
                          </div>
                          <div class="modal-body">
                          </div>
                          <div class="modal-footer">
                            <div class="container">
                              <div class="col-sm-3">
                              </div><form class="" action="/employer/hire" method="post">
                                <?php echo e(csrf_field()); ?>

                                <input type="hidden" name="userID" id="userID" value="<?php echo e($user->userID); ?>" readonly>
                                <button type="submit" name="button" class="btn btn-maroon btn-round" data-dismiss="modal">Hire</button>
                              </form>
                              <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">No</button>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              <!-- End of Modal -->


            </div>
    </div>


<?php $__env->stopSection(); ?>
</div>
<?php echo $__env->make('layouts.employerapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>