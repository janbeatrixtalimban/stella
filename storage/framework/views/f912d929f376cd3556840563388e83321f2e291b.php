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
                            <a class="dropdown-header">Edit Profile</a>
                            <a class="dropdown-item" href="<?php echo e(url('/modeljoboffers')); ?>">View Job Offers</a>
                            <a class="dropdown-item" href="<?php echo e(url('/modelsubscription')); ?>">Subscription</a>
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
                                <a class="nav-link" href="<?php echo e(url('/modeleditattributes')); ?>">Edit Attributes</a>
                            </li>
                            <br>
                            <br>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo e(url('/modelprofile')); ?>">Go Back</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="cointainer" style="color:black;">
                        <div class="card card-plain">
                            <form method="POST" action="<?php echo e(url('/updateAttribute/'.Auth::user()->userID)); ?>">
                            <?php echo e(csrf_field()); ?>


                            <h3>Edit Profile</h3>
                                <h4>Your Attributes</h4>
                                <!-- Eye Color -->
                                <div class="form-group">
                                        <label>Eye Color</label>
                                        <input type="text" class="form-control" name="eyeColor" value="<?php echo e($details->eyeColor); ?>"  readonly="true">
                                    </div>
                                <!-- Hair Color -->
                                <label>Hair Color</label>
                                <div class="input-group input-lg">
                                        
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.5" class="form-control" name="hairColor" id="hairColor" required>
                                                <option value="" selected disabled> <?php echo e($details->hairColor); ?> </option>
                                                    <option value="black">black</option>
                                                    <option value="brown">brown</option>
                                                    <option value="blonde">blonde</option>
                                                    <option value="ombre">ombre</option>
                                                    <option value="orange">orange</option>
                                                    <option value="pink">pink</option>
                                                    <option value="purple">purple</option>
                                                    <option value="red">red</option>
                                                    <option value="blue">blue</option>
                                                    <option value="green">green</option>
                                                    <option value="grey">grey</option>
                                                    <option value="highlights">highlights</option>
                                            </select>
                                        </div> 
                                <!-- Hair Length -->
                                <label>Hair Length</label>
                                        <div class="input-group input-lg">
                                                
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.5" class="form-control" name="hairLength" id="hairLength" value="<?php echo e($details->hairLength); ?>" required>
                                                <option value="" selected disabled><?php echo e($details->hairLength); ?>.</option>
                                                    <option value="bald">bald</option>
                                                    <option value="boy cut">boy Cut</option>
                                                    <option value="short bob">short Bob</option>
                                                    <option value="shoulder length">shoulder Length</option>
                                                    <option value="medium">medium Length</option>
                                                    <option value="long">long</option>
                                            </select>
                                        </div>
                                <!--Weight-->
                                <label>Weight</label>
                                <div class="input-group input-lg">
                                        
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input type="text" class="form-control" name="weight" value="<?php echo e($details->weight); ?>" placeholder="Weight in pounds" required>
                                        </div>
                                <!--Height-->
                                <label>Height</label>
                                <div class="input-group input-lg">
                                        <div class="input-group-prepend">
                                                
                                            <span class="input-group-text">
                                                    
                                            </span>
                                        </div>
                                            <input type="text" class="form-control" name="height" value="<?php echo e($details->height); ?>" placeholder="Height in cm" required>
                                        </div>
                                <!--Waist-->
                                <label>Waist</label>
                                <div class="input-group input-lg">
                                        <div class="input-group-prepend">
                                                
                                            <span class="input-group-text">
                                                    
                                            </span>
                                        </div>
                                            <input type="text" class="form-control" name="waist" value="<?php echo e($details->waist); ?>" placeholder="Waist in cm" required>
                                        </div>
                                <!--hips-->
                                <label>Hips</label>
                                <div class="input-group input-lg">
                                        <div class="input-group-prepend">
                                                
                                            <span class="input-group-text">
                                                    
                                            </span>
                                        </div>
                                            <input type="text" class="form-control" name="hips" value="<?php echo e($details->hips); ?>" placeholder="Hips in cm" required>
                                        </div>
                                
                        </div>
                    </div>
                </div><!-- col-sm-6 closing tag -->

                <div class="col-sm-1"><!--space-->
                </div>



        <!-- Right Column contents -->

            <div class="col-sm-3">
                <div class="cointainer" style="color:black;">
                        <!-- Skin Color -->
                        <label>Complexion</label>
                        <div class="input-group input-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <select size="0.5" class="form-control" name="complexion" id="complexion">
                                <option value="" selected disabled><?php echo e($details->complexion); ?></option>
                                    <option value="fair">fair</option>
                                    <option value="light beige">light beige</option>
                                    <option value="medium beige">medium beige</option>
                                    <option value="tanned">tanned</option>
                                    <option value="morena">morena</option>
                                    <option value="brown">brown</option>
                                    <option value="black">black</option>
                            </select>
                        </div>
                         <!--chest-->
                         <label>Chest</label>
                <div class="input-group input-lg">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                            </span>
                        </div>
                            <input type="text" class="form-control" name="chest" value="<?php echo e($details->chest); ?>" placeholder="Chest in cm" required>
                        </div>
                <!-- Gender -->
                <label>Gender</label>
                      <div class="input-group input-lg">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                            <select size="0.5" class="form-control" name="gender" id="gender" >
                                <option value="" selected disabled><?php echo e($details->gender); ?></option>
                                    <option value="male">male</option>
                                    <option value="female">female</option>
                                    <option value="transgender male">transgender male</option>
                                    <option value="transgender female">transgender female</option>
                            </select>
                        </div>
                <!--Shoe-->
                <label>Shoe Size</label>
                <div class="input-group input-lg">
                        <div class="input-group-prepend">
                                
                            <span class="input-group-text">
                                    
                            </span>
                        </div>
                            <input type="text" class="form-control" name="shoeSize" value="<?php echo e($details->shoeSize); ?>" placeholder="shoe size" required>
                        </div>
                <!--Tatto-->
                <label>Tattoos/Scars</label>
                <div class="input-group input-lg">
                        <div class="input-group-prepend">
                                
                            <span class="input-group-text">
                                    
                            </span>
                        </div>
                            <input type="text" class="form-control" name="tatoo" value="<?php echo e($details->tatoo); ?>" placeholder="Tattoo/Scars" required>
                        </div>
                <!-- Save button -->
                    <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg" style="float:right;">Save</button>
            </form>

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