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
                                    <input type="text" class="form-control" name="firstName" value="<?php echo e(Auth::user()->firstName); ?>" required>
                                </div>
                        <!-- Last Name -->
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" name="lastName" value="<?php echo e(Auth::user()->lastName); ?>"  required>
                                </div>
                        <!-- Contact Number -->
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" id="contactNo" name="contactNo" value="<?php echo e(Auth::user()->contactNo); ?>" required>
                                </div>
                                  <!-- Address line 1 -->
                              <label for="address">Full Address</label>
                              <div class="input-group input-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        </span>
                                    </div>
                                <!-- Unit -->
                                    <input type="text" class="form-control" name="unitNo" id="unitNo" placeholder="Unit No." value="">
                                <!-- Street -->
                                    <input type="text" class="form-control" name="street" id="street" placeholder="Street" value="">
                                <!-- Barangay -->
                                    <input type="text" class="form-control" name="brgy" id="brgy" placeholder="Barangay" value="">
                                </div>
                          <!-- Address line 2 dropdown -->
                                <div class="input-group input-sm">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                        </span>
                                    </div>
                            <!--Province-->
                                <select size="0.4" class="form-control" name="location" id="location" required>
                                        <option value="" selected disabled>Province..</option>
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
                                <!-- City -->
                                    <select size="0.4" class="form-control" name="city" id="city" required>
                                        <option value="" selected disabled>City..</option>
                                        <optgroup label="Pangasinan" style="color: black;">
                                            <option value="Alaminos City">Alaminos City</option>
                                            <option value="Dagupan City">Dagupan City</option>
                                            <option value="San Carlos City">San Carlos City</option>
                                            <option value="Urdaneta City">Urdaneta City</option>
                                        </optgroup>
                                        <optgroup label="Pampanga" style="color: black;">
                                            <option value="Angeles City">Angeles City</option>
                                            <option value="Mabalacat City">Mabalacat City</option>
                                            <option value="San Fernando City">San Fernando City</option>
                                        </optgroup>
                                        <optgroup label="Rizal" style="color: black;">
                                            <option value="Antipolo City">Antipolo City</option>
                                        </optgroup>
                                        <optgroup label="Cavite" style="color: black;">
                                            <option value="Bacoor City">Bacoor City</option>
                                            <option value="Cavite City">Cavite City</option>
                                            <option value="Dasmarinas City">Dasmarinas City</option>
                                            <option value="General Trias City">General Trias City</option>
                                            <option value="Imus City">Imus City</option>
                                            <option value="Tagaytay City">Tagaytay City</option>
                                            <option value="Trece Martires City">Trece Martires City</option>
                                        </optgroup>
                                        <optgroup label="Benguet" style="color: black;">
                                            <option value="Baguio City">Baguio City</option>
                                        </optgroup>
                                        <optgroup label="Bataan" style="color: black;">
                                            <option value="Balanga City">Balanga City</option>
                                        </optgroup>
                                        <optgroup label="Ilocos" style="color: black;">
                                            <option value="Candon City">Candon City</option>
                                            <option value="Laoag City">Laoag City</option>
                                            <option value="Vigan City">Vigan City</option>
                                        </optgroup>
                                        <optgroup label="Batangas" style="color: black;">
                                            <option value="Batangas City">Batangas City</option>
                                            <option value="Lipa City">Lipa City</option>
                                            <option value="Tanauan City">Tanauan City</option>
                                        </optgroup>
                                        <optgroup label="Laguna" style="color: black;">
                                            <option value="Binan City">Binan City</option>
                                            <option value="Cabuyao City">Cabuyao City</option>
                                            <option value="Calamba City">Calamba City</option>
                                            <option value="San Pablo City">San Pablo City</option>
                                            <option value="San Pedro City">San Pedro City</option>
                                            <option value="Santa Rosa City">Santa Rosa City</option>
                                        </optgroup>
                                        <optgroup label="Nueva Ecija" style="color: black;">
                                            <option value="Cabanatuan City">Cabanatuan City</option>
                                            <option value="Gapan City">Gapan City</option>
                                            <option value="Munoz City">Munoz City</option>
                                            <option value="San Jose City">San Jose City</option>
                                            <option value="Palayan City">Palayan City</option>
                                        </optgroup>   
                                        <optgroup label="Mindoro" style="color: black;">
                                            <option value="Calapan City">Calapan City</option>
                                        </optgroup>   
                                        <optgroup label="Metro Manila" style="color: black;">
                                            <option value="Caloocan City">Caloocan City</option>
                                            <option value="Las Pinas City">Las Pinas City</option>
                                            <option value="Makati City">Makati City</option>
                                            <option value="Malabon City">Malabon City</option>
                                            <option value="Mandaluyong City">Mandaluyong City</option>
                                            <option value="Manila City">Manila City</option>
                                            <option value="Marikina City">Marikina City</option>
                                            <option value="Muntinlupa City">Muntinlupa City</option>
                                            <option value="Navotas City">Navotas City</option>
                                            <option value="Paranaque City">Paranaque City</option>
                                            <option value="Pasay City">Pasay City</option>
                                            <option value="Pasig City">Pasig City</option>
                                            <option value="Quezon City">Quezon City</option>
                                            <option value="San Juan City">San Juan City</option>
                                            <option value="Taguig City">Taguig City</option>
                                            <option value="Valenzuela City">Valenzuela City</option>
                                        </optgroup>   
                                        <optgroup label="Isabela" style="color: black;">
                                            <option value="Cauayan City">Cauayan City</option>
                                            <option value="Ilagan City">Ilagan City</option>
                                            <option value="Santiago City">Santiago City</option>
                                        </optgroup>  
                                        <optgroup label="Camarines" style="color: black;">
                                            <option value="Iriga City">Iriga City</option>
                                            <option value="Naga City">Naga City</option>
                                        </optgroup> 
                                        <optgroup label="Albay" style="color: black;">
                                            <option value="Legazpi City">Legazpi City</option>
                                            <option value="Ligao City">Ligao City</option>
                                            <option value="Tabaco City">Tabaco City</option>
                                        </optgroup> 
                                        <optgroup label="Quezon" style="color: black;">  
                                            <option value="Lucena City">Lucena City</option>
                                            <option value="Tayabas City">Tayabas City</option>
                                        </optgroup>    
                                        <optgroup label="Bulacan" style="color: black;">  
                                            <option value="Malolos City">Malolos City</option>
                                            <option value="Meycauayan City">Meycauayan City</option>
                                            <option value="San Jose del Monte City">San Jose del Monte City</option>
                                        </optgroup>  
                                        <optgroup label="Masbate" style="color: black;">  
                                            <option value="Masbate City">Masbate City</option>
                                        </optgroup>   
                                        <optgroup label="Zambales" style="color: black;">  
                                            <option value="Olongapo City">Olongapo City</option>
                                        </optgroup>   
                                        <optgroup label="Palawan" style="color: black;">  
                                            <option value="Puerta Princesa City">Puerta Princesa City</option>
                                        </optgroup>    
                                        <optgroup label="Sorsogon" style="color: black;">  
                                            <option value="Sorsogon City">Sorsogon City</option>
                                        </optgroup> 
                                        <optgroup label="Kalinga" style="color: black;">  
                                            <option value="Tabuk City">Tabuk City</option>
                                        </optgroup>
                                        <optgroup label="Tarlac" style="color: black;">  
                                            <option value="Tarlac City">Tarlac City</option>
                                        </optgroup>
                                        <optgroup label="Cagayan" style="color: black;">  
                                            <option value="Tuguegarao City">Tuguegarao City</option>
                                        </optgroup>
                                        <optgroup label="Negros" style="color: black;">
                                            <option value="Bacolod City">Bacolod City</option>
                                            <option value="Bago City">Bago City</option>
                                            <option value="Bais City">Bais City</option>
                                            <option value="Bayawan City">Bayawan City</option>
                                            <option value="Cadiz City">Cadiz City</option>
                                            <option value="Canlaon City">Canlaon City</option>
                                            <option value="Dumaguete City">Dumaguete City</option>
                                            <option value="Escalante City">Escalante City</option>
                                            <option value="Guihulngan City">Guihulngan City</option>
                                            <option value="Himamaylan City">Himamaylan City</option>
                                            <option value="Kabankalan City">Kabankalan City</option>
                                            <option value="La Carlota City">La Carlota City</option>
                                            <option value="Sagay City">Sagay City</option>
                                            <option value="San Carlos City">San Carlos City</option>
                                            <option value="Silay City">Silay City</option>
                                            <option value="Sipalay City">Sipalay City</option>
                                            <option value="Talisay City">Talisay City</option>
                                            <option value="Tanjay City">Tanjay City</option>
                                            <option value="Victorias City">Victorias City</option>
                                        </optgroup>
                                        <optgroup label="Leyte" style="color: black;">
                                            <option value="Baybay City">Baybay City</option>
                                            <option value="Ormoc City">Ormoc City</option>
                                            <option value="Tacloban City">Tacloban City</option>
                                        </optgroup>
                                        <optgroup label="Samar" style="color: black;">
                                            <option value="Borongan City">Borongan City</option>
                                            <option value="Calbayog City">Calbayog City</option>
                                            <option value="Calbayog City">Catbalogan City</option>
                                        </optgroup>
                                        <optgroup label="Cebu" style="color: black;">
                                            <option value="Carcar City">Carcar City</option>
                                            <option value="Toledo City">Toledo City</option>
                                            <option value="Cebu City">Cebu City</option>
                                            <option value="Danao City">Danao City</option>
                                            <option value="Lapu-Lapu City">Lapu-Lapu City</option>
                                            <option value="Mandaue City">Mandaue City</option>
                                            <option value="Naga City">Naga City</option>
                                            <option value="Toledo City">Toledo City</option>
                                            <option value="Bogo City">Bogo City</option>
                                        </optgroup>
                                        <optgroup label="Iloilo" style="color: black;">
                                            <option value="Iloilo City">Iloilo City</option>
                                            <option value="Passi City">Passi City</option>
                                        </optgroup>
                                        <optgroup label="Leyte" style="color: black;">
                                            <option value="Maasin City">Maasin City</option>
                                        </optgroup>
                                        <optgroup label="Capiz" style="color: black;">
                                            <option value="Roxas City">Roxas City</option>
                                        </optgroup>
                                        <optgroup label="Bohol" style="color: black;">
                                            <option value="Tagbilaran City">Tagbilaran City</option>
                                        </optgroup>
                                        <optgroup label="Agusan" style="color: black;">
                                            <option value="Bayugan City">Bayugan City</option>
                                            <option value="Butuan City">Butuan City</option>
                                            <option value="Cabadbaran City">Cabadbaran City</option>
                                        </optgroup>
                                        <optgroup label="Surigao" style="color: black;">
                                            <option value="Bislig City">Bislig City</option>
                                        </optgroup>
                                        <optgroup label="Misamis" style="color: black;">
                                            <option value="Cagayan de Oro City">Cagayan de Oro City</option>
                                            <option value="El Salvador City">El Salvador City</option>
                                            <option value="Gingoog City">Gingoog City</option>
                                            <option value="Oroquieta City">Oroquieta City</option>
                                            <option value="Ozamiz City">Ozamiz City</option>
                                            <option value="Tangub City">Tangub City</option>
                                        </optgroup>
                                        <optgroup label="Maguindanao" style="color: black;">
                                            <option value="Cotabato City">Cotabato City</option>
                                        </optgroup>
                                        <optgroup label="Zamboanga" style="color: black;">
                                            <option value="Dapitan City">Dapitan City</option>
                                            <option value="Dipolog City">Dipolog City</option>
                                            <option value="Pagadian City">Pagadian City</option>
                                            <option value="Zamboanga City">Zamboanga City</option>
                                        </optgroup>
                                        <optgroup label="Davao" style="color: black;">
                                            <option value="Davao City">Davao City</option>
                                            <option value="Digos City">Digos City</option>
                                            <option value="Mati City">Mati City</option>
                                            <option value="Panabo City">Panabo City</option>
                                            <option value="Samal City">Samal City</option>
                                            <option value="Tagum City">Tagum City</option>
                                        </optgroup>
                                        <optgroup label="Cotabato" style="color: black;">
                                            <option value="General Santos City">General Santos City</option>
                                            <option value="Kidapawan City">Kidapawan City</option>
                                            <option value="Koronadal City">Koronadal City</option>
                                        </optgroup>
                                        <optgroup label="Lanao" style="color: black;">
                                            <option value="Iligan City">Iligan City</option>
                                            <option value="Marawi City">Marawi City</option>
                                        </optgroup>
                                        <optgroup label="Basilan" style="color: black;">
                                            <option value="Isabela City">Isabela City</option>
                                            <option value="Lamitan City">Lamitan City</option>
                                        </optgroup>
                                        <optgroup label="Bukidnon" style="color: black;">
                                            <option value="Malaybalay City">Malaybalay City</option>
                                            <option value="Valencia City">Valencia City</option>
                                        </optgroup>
                                        <optgroup label="Surigao" style="color: black;">
                                            <option value="Surigao City">Surigao City</option>
                                            <option value="Tandag City">Tandag City</option>
                                        </optgroup>
                                        <optgroup label="Sultan Kudarat" style="color: black;">
                                            <option value="Tacurong City">Tacurong City</option>
                                        </optgroup>
                                    </select>
                                    <!--Zip Code-->
                                        <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Zip Code" value="">
                                        </div><br>
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