<title><?php echo $__env->yieldContent('pageTitle'); ?> Edit Profile </title>

<?php $__env->startSection('content'); ?>

<body class="landing-page sidebar-collapse" data-spy="scroll">
            <!-- Navigation bar hehe -->
            <nav class="navbar navbar-expand navbar-dark bg-black flex-column flex-md-row bd-navbar">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" rel="tooltip" title="Click to go Home" href="<?php echo e(url('/employerHome')); ?>" data-placement="bottom">
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
                        <a class="navbar-brand" href="<?php echo e(url('/employerHome ')); ?>" data-placement="bottom">
                            Home
                        </a>
                        </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link" href="<?php echo e(url('/employerprofile')); ?>" rel="tooltip" title="Go to profile" role="button">
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
                            <a class="dropdown-item" href="<?php echo e(url('/employerapplicants')); ?>">View Applicants</a>
                            <a class="dropdown-item" href="<?php echo e(url('/subscriptionEmployer')); ?>">Subscription</a>
                            <a class="dropdown-item" href="<?php echo e(url('/#')); ?>">Settings</a>
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

    <!-- Form Content -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-1"><!--space-->
                </div>
                <div class="col-sm-2">
                </div>
                <div class="col-sm-6">
                    <div class="cointainer" style="color:black;">
                    <h3>Edit Job Post</h3><br>
                        <div class="card card-plain">    
                                <form method="POST" action="<?php echo e(url('/SaveProj')); ?>">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" id="projectID" name="projectID" value="<?php echo e($projects->projectID); ?>" />
                                    <div class="row">
                                    <!-- Project Title -->
                                        <label>Project Title:</label>
                                        <div class="input-group input-lg">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              </span>
                                          </div>
                                            <input type="text" name="prjTitle" class="form-control" value="<?php echo e($projects->prjTitle); ?>" placeholder="" >
                                        </div>
                                    <!-- Description -->
                                        <label>Description:</label>
                                        <div class="input-group input-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <textarea class="form-control" name="jobDescription" id="jobDescription" rows="3" placeholder="Description.."><?php echo e($projects->jobDescription); ?></textarea>
                                        </div>
                                        <!-- ModelNo -->
                                        <label>Number of Models Needed:</label>
                                <div class="input-group input-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="modelNo" value="<?php echo e($projects->modelNo); ?>" required >
                              </div>
                              <!-- Address -->
                              <label>Address</label>
                              <div class="input-group no-border input-sm">
                                 <div class="input-group-prepend">
                                     <span class="input-group-text">
                                     </span>
                                 </div>
                                 <input type="text" class="form-control" name="unitNo" id="unitNo" placeholder="Unit No." value="" required>
                                 <input type="text" class="form-control" name="street" id="street" placeholder="Street" value="" required>
                                 <input type="text" class="form-control" name="brgy" id="brgy" placeholder="Barangay" value="" required>
                             </div>
                                    <!-- Location -->
                                   
                                        <div class="input-group input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="city" id="city" placeholder="City" value="" required>
                                            <select size="0.4" class="form-control" name="location" id="location" required>
                                                <option value="" selected disabled><?php echo e($projects->location); ?></option>
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
                                            <input type="text" class="form-control" name="zipCode" id="zipCode" placeholder="Zip Code" value="" required>
                                        </div>
                                    <!-- Role -->
                                    <label>Role:</label>
                                        <div class="input-group input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.4" class="form-control" name="role" id="role" required>
                                                <option value="" selected disabled><?php echo e($projects->role); ?></option>
                                                    <option value="Fashion Model">Fashion(Editorial) model</option>
                                                    <option value="Runway Model">Runway model</option>
                                                    <option value="Commercial Model">Commercial model</option>
                                                    <option value="Plus Size Model">Plus size model</option>
                                                    <option value="Petite Model">Petite model</option>
                                                    <option value="Swimsuit Model">Swimsuit Model</option>
                                                    <option value="Lingerie Model">Lingerie Model</option>
                                                    <option value="Glamour Model">Glamour Model</option>
                                                    <option value="Fitness Model">Fitness Model</option>
                                                    <option value="Fitting Model">Fitting Model</option>
                                                    <option value="Parts Model">Parts Model</option>
                                                    <option value="Promotional Model">Promitional Model</option>
                                                    <option value="Mature Model">Mature Model</option>
                                            </select>
                                        </div>
                                    <!-- Edit Talent fee-->
                                        <label>Talent Fee:</label>
                                        <div class="input-group input-lg">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <input type="text" name="talentFee" class="form-control" value="<?php echo e($projects->talentFee); ?>" >
                                        </div>

                                         <!-- HEight -->
                                         <label>Height Requirement:</label>
                                <div class="input-group input-lg">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="height"  value="<?php echo e($projects->height); ?>">
                              </div>

                               <!-- body built -->
                               <label>Body Built:</label>
                               <div class="input-group input-lg">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                </div>
                                <select size="0.4" class="form-control" name="bodyBuilt" id="bodyBuilt" required>
                                    <option value="" selected disabled>Select Body Built</option>
                                        <option value="Petite">Petite</option>
                                        <option value="Slim">Slim</option>
                                        <option value="Athletic">Athletic</option>
                                        <option value="Plus Size">Plus Size</option>
                                </select>
                            </div>
                                    
                                    <!-- Edit Button -->
                                        <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg" style="float:right;">Edit Job Post</button><br>
                                        <a class="link" href="<?php echo e(url('/employerprofile')); ?>">Cancel</a>

                                </form>

                        </div>
                    </div>
                </div><!-- col-sm-6 closing tag -->

                <div class="col-sm-3"><!--space-->
                </div>


          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->


        </div>
    </div>
<?php $__env->stopSection(); ?>
</div>
<?php echo $__env->make('layouts.employerapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>