<title><?php echo $__env->yieldContent('pageTitle'); ?> Welcome <?php echo e(Auth::user()->firstName); ?>! </title>

<?php $__env->startSection('content'); ?>

<body class="landing-page sidebar-collapse" data-spy="scroll">
            <!-- Navigation bar hehe -->
            <nav class="navbar navbar-expand navbar-dark bg-black flex-column flex-md-row bd-navbar">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" rel="tooltip" title="Click to go Home" href="<?php echo e(url('/modelfeed')); ?>" data-placement="bottom">
                        <img src="<?php echo asset('img/logo_white.png')?>"  width="90">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#example-navbar-danger" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-bar bar1"></span>
                      <span class="navbar-toggler-bar bar2"></span>
                      <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>

                <div class="col-sm-1">
                </div>

              <!-- Options and logout-->
              <div class="collapse navbar-collapse justify-content-end" id="navigation">

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="navbar-brand" href="<?php echo e(url('/modelfeed ')); ?>" data-placement="bottom">
                                    Home
                            </a>
                        </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo e(url('/modelprofile ')); ?>" rel="tooltip" title="Go to profile" role="button">
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
                            <a class="dropdown-header">Edit Profile</a>
                            <a class="dropdown-item" href="<?php echo e(url('#')); ?>">View Job Offers</a>
                            <a class="dropdown-item" href="<?php echo e(url('/subscription')); ?>">Subscription</a>
                            <a class="dropdown-item" href="<?php echo e(url('/modelsetting')); ?>">Settings</a>
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
                <div class="col-sm-2"><!--side navbar-->
                    <div class="side-navbar" style="color:black;">
                        <h4><?php echo e(Auth::user()->firstName); ?>'s Profile</h4>
                        <br>
                        <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('/modeleditprofile')); ?>">Edit Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('/modelattribute')); ?>">Edit Attributes</a>
                            </li>
                            <br>
                            <br>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('/modelprofile')); ?>">Go Back</a>
                            </li>
                        </ul>
                    </div>
                </div>
        <!-- Form -->
                <div class="col-sm-4" style="color:black;">
                    <h3>Edit Your Information</h3><br>
                    <div class="cointainer" style="color:black;">
                        <div class="card card-plain">
                            <form method="POST" action="<?php echo e(url('/SaveEdit/'.Auth::user()->userID)); ?>">
                                <?php echo e(csrf_field()); ?>


                        <!-- First Name -->
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" name="firstName" value="<?php echo e(Auth::user()->firstName); ?>" readonly="true">
                                </div>
                        <!-- Last Name -->
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="lastName" value="<?php echo e(Auth::user()->lastName); ?>"  readonly="true">
                                </div>
                        <!-- Contact Number -->
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" id="contactNo" name="contactNo" required>
                                </div>
                        <!-- Location -->
                                <label>Location</label>
                                <div class="input-group input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.4" class="form-control" name="location" id="location" required>
                                                <option value="" selected disabled>Select your location..</option>
                                                <optgroup label="Luzon" style="color: black;">
                                                    <option value="Abra">Abra</option>
                                                    <option value="Albay">Albay</option>
                                                    <option value="Apayo">Apayo</option>
                                                    <option value="Aurora">Aurora</option>
                                                    <option value="Bataan">Bataan</option>
                                                    <option value="Batanes">Batanes</option>
                                                    <option value="Batangas">Batangas</option>
                                                    <option value="Benguet">Benguet</option>
                                                    <option value="Bulacan">Bulacan</option>
                                                    <option value="Cagayan">Cagayan</option>
                                                    <option value="Camarines">Camarines</option>
                                                    <option value="Catanduanes">Catanduanes</option>
                                                    <option value="Cavite">Cavite</option>
                                                    <option value="Ifugao">Ifugao</option>
                                                    <option value="Ilocos">Ilocos</option>
                                                    <option value="Isabela">Isabela</option>
                                                    <option value="Kalinga">Kalinga</option> 
                                                    <option value="La Union">La Union</option>
                                                    <option value="Laguna">Laguna</option>
                                                    <option value="Marinduque">Marinduque</option>
                                                    <option value="Masbate">Masbate</option>
                                                    <option value="Metro Manila">Metro Manila</option>
                                                    <option value="Mountain Province">Mountain Province</option>
                                                    <option value="Nueva Ecija">Nueva Ecija</option>
                                                    <option value="Nueva Vizcaya">Nueva Vizcaya</option>
                                                    <option value="Mindoro">Mindoro</option>
                                                    <option value="Palawan">Palawan</option>
                                                    <option value="Pampanga">Pampanga</option>
                                                    <option value="Pangasinan">Pangasinan</option>
                                                    <option value="Rizal">Rizal</option>
                                                    <option value="Romblon">Romblon</option>
                                                    <option value="Quezon">Quezon</option>
                                                    <option value="Quirino">Quirino</option>
                                                    <option value="Sorsogon">Sorsogon</option>
                                                    <option value="Tarlac">Tarlac</option>
                                                    <option value="Zambales">Zambales</option>
                                                </optgroup>
                                                <optgroup label="Visayas" style="color: black;">
                                                    <option value="Aklan">Aklan</option>
                                                    <option value="Antique">Antique</option>
                                                    <option value="Biliran">Biliran</option>
                                                    <option value="Bohol">Bohol</option>
                                                    <option value="Capiz">Capiz</option>
                                                    <option value="Cebu">Cebu</option>
                                                    <option value="Eastern Samar">Eastern Samar</option>
                                                    <option value="Guimaras">Guimaras</option>
                                                    <option value="Iloilo">Iloilo</option>
                                                    <option value="Leyte">Leyte</option>
                                                    <option value="Negros">Negros</option>
                                                    <option value="Samar">Samar</option>
                                                    <option value="Siquijor">Siquijor</option>
                                                </optgroup>
                                                <optgroup label="Mindnao" style="color: black;">
                                                <option value="Agusan">Agusan</option>
                                                    <option value="Basilan">Basilan</option>
                                                    <option value="Bukidnon">Bukidnon</option>
                                                    <option value="Camiguin">Camiguin</option>
                                                    <option value="Compostela Valley">Compostela Valley</option>
                                                    <option value="Cotabato">Cotabato</option>
                                                    <option value="Cebu">Cebu</option>
                                                    <option value="Davao">Davao</option>
                                                    <option value="Dinagat Islands">Dinagat Islands</option>
                                                    <option value="Lanao">Lanao</option>
                                                    <option value="Maguindanao">Maguindanao</option>
                                                    <option value="Misamis">Misamis</option>
                                                    <option value="Sarangani">Sarangani</option>
                                                    <option value="Sultan Kudarat">Sultan Kudarat</option>
                                                    <option value="Sulu">Sulu</option>
                                                    <option value="Surigao">Surigao</option>
                                                    <option value="Tawi-Tawi">Tawi-Tawi</option>
                                                    <option value="Zamboanga">Zamboanga</option>
                                                </optgroup>
                                            </select>
                                        </div>
                        <!-- Birthday -->
                                <div class="form-group">
                                    <label>Birthday</label>
                                    <input type="text" class="form-control" name="birthDate" value="<?php echo e(Auth::user()->birthDate); ?>"  readonly="true">
                                </div>
                        <!-- Email -->
                                <div class="form-group">    
                                    <label>Email</label>   
                                    <input type="text" class="form-control" id="emailAddress" name="emailAddress" value="<?php echo e(Auth::user()->emailAddress); ?>"  readonly="true"> 
                                </div> 
                        <!-- Save button -->
                            <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg" style="float:right;">Save</button>

                            </form>
                        </div>
                    </div>
                </div><!-- col-sm-6 closing tag -->

        <!--End of form -->
        
                <div class="col-sm-1"><!--space-->
                </div>



        <!-- Right Column contents -->

            <div class="col-sm-3">
                <div class="column">


                  <!-- Ads Card and carousel -->
                      <div class="card">
                        <div class="card-body" style="color:#1b1b1b; height: 18rem;">
                        <h5 class="card-title"><i class="now-ui-icons business_badge"></i>  Ads</h5>
                        <div id="carouselExampleIndicators" style="width: 18rem;" class="text-center carousel slide" data-ride="carousel">
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
<?php echo $__env->make('layouts.modelapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>