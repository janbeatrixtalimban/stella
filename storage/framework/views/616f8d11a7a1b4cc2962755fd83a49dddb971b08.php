<title><?php echo $__env->yieldContent('pageTitle'); ?> Welcome <?php echo e(Auth::user()->firstName); ?>! </title>

<?php $__env->startSection('content'); ?>

<body class="landing-page sidebar-collapse" data-spy="scroll">
  <!-- Navigation bar hehe -->
  <nav class="navbar navbar-expand navbar-dark bg-black flex-column flex-md-row bd-navbar">
						<div class="container">
              
                <div class="navbar-translate">
                  <img src="<?php echo asset('img/logo_white.png')?>" width="100">
                    <a class="navbar-brand" href="" rel="tooltip" title="Browse now" data-placement="bottom"
                      target="_blank">
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
                  <div class="col-sm-6">
                      <form action="" method="">
                            <?php echo e(csrf_field()); ?>

                                <div class="input-group no-border" style="padding-top:10px;" >
                                    <input name="search" id="search" class="form-control form-control-search" placeholder="Search..." itemprop="query-input">
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
                        <a class="nav-link" href="<?php echo e(url('/modelprofile ')); ?>" rel="tooltip" title="Go to profile" role="button">
                          <img src="<?php echo asset('img/default-profile-pic.png')?>" width="25" alt="Thumbnail Image" class="rounded-circle img-raised">
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
                            <a class="dropdown-item" href="<?php echo e(url('/modelprofile')); ?>">
                            <h6><?php echo e(Auth::user()->firstName); ?> <?php echo e(Auth::user()->lastName); ?></h6></a>
                            <a class="dropdown-item" href="<?php echo e(url('/modeljoboffers')); ?>">View Job Offers</a>
                            <a class="dropdown-item" href="<?php echo e(url('/modelsubscription')); ?>">Subscriptions</a>
                            <a class="dropdown-item" href="<?php echo e(url('/modelsubscription')); ?>">Settings</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="<?php echo e(url('/stellahome')); ?>">Logout</a>
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
                <div class="col-sm-6">
                    <div id="jobpost" class="card text-center">
                      <div class="card-body" style="color:#1b1b1b;">
                        <h4 class="card-title">Victoria Secret Fashion Show</h4>
                        <p class="card-text">We're looking for a morena runway model at least 5'7 in height.</p>
                        <a data-toggle="modal" href="#jobdetails" class="btn btn-maroon btn-round">View more details</a>
                        <a data-toggle="modal" href="#confirmapply" class="btn btn-info btn-round">Apply</a>
                      </div>
                      <div class="card-footer text-muted mb-2">
                         15 hours ago
                      </div>
                    </div>
                    <div id="jobpost" class="card text-center">
                      <div class="card-body" style="color:#1b1b1b;">
                        <h4 class="card-title">Penshoppe Fashion Show</h4>
                        <p class="card-text">Apply now to get a chance to become part of the Penshoppe Winter Collection Fashion Show.</p>
                        <a data-toggle="modal" href="#jobdetails" class="btn btn-maroon btn-round">View more details</a>
                        <a data-toggle="modal" href="#confirmapply" class="btn btn-info btn-round">Apply</a>
                      </div>
                      <div class="card-footer text-muted mb-2">
                        1 day ago
                      </div>
                    </div>
                    <div id="jobpost" class="card text-center">
                      <div class="card-body" style="color:#1b1b1b;">
                        <h4 class="card-title">Looking for part-time runway model</h4>
                        <p class="card-text">One time fashion show for DLS-CSB Fashion Design grad show.</p>
                        <a data-toggle="modal" href="#jobdetails" class="btn btn-maroon btn-round">View more details</a>
                        <a data-toggle="modal" href="#confirmapply" class="btn btn-info btn-round">Apply</a>
                      </div>
                      <div class="card-footer text-muted mb-2">
                        2 days ago
                      </div>
                    </div>
                </div><!-- col-sm-6 closing tag -->

                <div class="col-sm-1"><!--space-->
                </div>



        <!-- Right Column contents -->

            <div class="col-sm-3">
                <div class="column">


                  <!-- Notifications card -->
                      <div class="card">
                        <div class="card-body" style="color:#1b1b1b;">
                          <h5 class="card-title"><i class="now-ui-icons ui-1_bell-53"></i>  Notifications<i class="now-ui-icons arrows-1_refresh-69" rel="tooltip" title="Refresh Notifications" style="float:right;" ></i></h5>
                            <ul class="list-group list-group-flush">
                              <li class="list-group-item" href="#" class="card-link">Bench wants to hire you</li>
                              <li class="list-group-item">Penshoppe has viewed your application</li>
                              <li class="list-group-item">Victoria secret rejected your application</li>
                            </ul>
                            <br>
                            <h6a style="float:right;">See all notifications..</h6a>
                        </div>
                      </div>


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

            <div class="col-sm-1"><!--space-->
            </div>

          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->



  <!-- View Job detials Modal -->
          <div id="jobdetails" class="modal fade show" style="padding-top: 100px;" tabindex="-1" role="dialog">
              <div class="modal-dialog" role="document">

          <!-- Modal content-->
                <div class="modal-content" style="color:black;">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Job Title</h4>
                    </div>
                    <div class="modal-body">
                      <p>Job description....</p>

                      <p>Details</p>
                      <ul>
                          <li>
                              <h0>Detail 1.</h0>
                          </li>
                          <li>
                              <h0>Detail 2.</h0>
                          </li>
                      </ul>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Dismiss</button>
                    </div>
                </div>
              </div>
            </div>
          <!-- End of Modal -->



          <!-- Apply to job confirmation Modal -->
                <div id="confirmapply" class="modal fade" tabindex="-1" role="dialog">
                    <div class="modal-dialog confirmapplymodal" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Are you sure you want to apply?</h4>
                          </div>
                          <div class="modal-body">
                          </div>
                          <div class="modal-footer">
                            <div class="container">
                              <div class="col-sm-3">
                              </div>
                              <button type="button" class="btn btn-success btn-round" data-dismiss="modal">Yes</button>
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


<?php echo $__env->make('layouts.modelapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>