<title><?php echo $__env->yieldContent('pageTitle'); ?> Register Model | Step:2</title>

<?php $__env->startSection('content'); ?>

<body class="login-page sidebar-collapse">
        
        <!-- Navigation bar -->
        <nav class="navbar navbar-expand-lg bg-black fixed-top navbar-transparent " color-on-scroll="400">
            <div class="container">
                <div class="col-lg-1">
                </div>
                <div class="col-lg-11">
                  <div class="navbar-translate">
                    <img src="<?php echo asset('img/stella icon logo.png')?>" width="40">
                    <a class="navbar-brand" href="" rel="tooltip" title="Register as a model" data-placement="bottom" target="_blank">
                      Model Registration
                    </a>
                </div>
                <div class="col-lg-1">
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
      
      <!-- Logo Header -->
      <div class="page-header clear-filter" filter-color="orange">
          <div class="page-header-image" style="background-image:url()"></div>
            <div class="container">
              <div class="row">
                <div class="col-sm-4">
                </div>
                <div class="col-sm-4">
                  <div class="card-login card-plain">
                      <div class="text-center">
                        <div style="width: 200px;" class="logo-container">
                            <img src="<?php echo asset('img/logo_white.png')?>">
                        </div>
                      </div>
                  </div>
              </div>
              <div class="col-sm-4">
              </div>
            </div>
      <!--End logo header-->
      
      <!-- Body Contents -->
            <!--Left column contents-->
            <h3 class="h3-seo">Step 2: Your Attributes</h3>
            <form class="" action="" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                            <?php if(\Session::has('failure')): ?>
                                <div class="alert alert-danger" role="alert">
                                <?php echo \Session::get('failure'); ?>

                                </div>
                            <?php endif; ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                            <!-- Model Form (fields) -->
                                  <!-- Eye Color -->
                            <h4>Physical Appearance</h4>
                            <div class="card card-login card-plain">
                                <div class="input-group no-border input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.5" class="form-control" name="eyeColor" id="eyeColor" required>
                                            <optgroup style="color: black;">
                                                <option value="" selected disabled style="color: black;">Select your Eye Color..</option>
                                                    <option value="Brown">Brown</option>
                                                    <option value="Hazel">Hazel</option>
                                                    <option value="Blue">Blue</option>
                                                    <option value="Green">Green</option>
                                                    <option value="Grey">Grey</option>
                                                    <option value="Amber">Amber</option>
                                                </optgroup>
                                            </select>
                                        </div>
                                <!-- Hair Color -->
                                <div class="input-group no-border input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.5" class="form-control" name="hairColor" id="hairColor" required>
                                            <optgroup style="color: black;">
                                                <option value="" selected disabled style="color: black;">Select your Hair Color.. </option>
                                                    <option value="Black">Black</option>
                                                    <option value="Brown">Brown</option>
                                                    <option value="Blonde">Blonde</option>
                                                    <option value="Ombre">Ombre</option>
                                                    <option value="Orange">Orange</option>
                                                    <option value="Pink">Pink</option>
                                                    <option value="Purple">Purple</option>
                                                    <option value="Red">Red</option>
                                                    <option value="Blue">Blue</option>
                                                    <option value="Green">Green</option>
                                                    <option value="Grey">Grey</option>
                                                    <option value="Highlights">Highlights</option>
                                                </optgroup>
                                            </select>
                                        </div> 
                                <!-- Hair Length -->
                                        <div class="input-group no-border input-sm">
                                                
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select size="0.5" class="form-control" name="hairLength" id="hairLength" required>
                                            <optgroup style="color: black;">
                                                <option value="" selected disabled style="color: black;">Select your hair length..</option>
                                                    <option value="Bald">Bald</option>
                                                    <option value="Boy Cut">Boy Cut</option>
                                                    <option value="Short Bob">Short Bob</option>
                                                    <option value="Shoulder Length">Shoulder Length</option>
                                                    <option value="Medium Length">Medium Length</option>
                                                    <option value="Long">Long</option>
                                            </optgroup>
                                            </select>
                                        </div>
                            <!-- Skin Color -->
                                    <div class="input-group no-border input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                        <select size="0.5" class="form-control" name="complexion" id="complexion" required> 
                                        <optgroup style="color: black;">
                                                <option value="" selected disabled style="color: black;">Select skin tone..</option>
                                                <option value="Fair">Fair</option>
                                                <option value="Light Beige">Light Beige</option>
                                                <option value="Medium Beige">Medium Beige</option>
                                                <option value="Tanned">Tanned</option>
                                                <option value="Morena">Morena</option>
                                                <option value="Brown">Brown</option>
                                                <option value="Black">Black</option>
                                        </optgroup>
                                        </select>
                                    </div>
                            <!-- Gender -->
                                    <div class="input-group no-border input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                        <select size="0.5" class="form-control" name="gender" id="gender" required>
                                        <optgroup style="color: black;">
                                                <option value="" selected disabled style="color: black;">Select Gender..</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                                <option value="Transgender Male">Transgender Male</option>
                                                <option value="Transgender Female">Transgender Female</option>
                                            </optgroup>
                                        </select>
                                    </div>
                            <!--Tattoo-->
                                    <div class="input-group no-border input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                        <select size="0.5" class="form-control" name="tatoo" id="tatoo" required> <optgroup style="color: black;">
                                                <option value="" selected disabled style="color: black;">Select Tattoo Marks/Scars..</option>
                                                <option value="Tatooed">Tatoo/s</option>
                                                <option value="Scarred">Scar/s</option>
                                                <option value="None">None</option>
                                            </optgroup>
                                        </select>
                                    </div><br>
                                
                                      </div>
                                    <!-- End of fields for left column -->
                            </div>
                        </div>
                    <!-- End of left Column -->
               
                    <!-- Right Column Contents -->
                    <div class="col-sm-5">
                        <div class="form-group">
                          <div class="card card-login card-plain">
                          <h4>Weight and Measurements</h4>
                                <!--Weight-->
                                <div class="input-group no-border input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input type="text" class="form-control" name="weight" value="" placeholder="Weight in Kilograms">
                                        </div>
                                <!--Height-->
                                <div class="input-group no-border input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input type="text" class="form-control" name="height" value="" placeholder="Height in CM">
                                        </div>
                                <!--Waist-->
                                <div class="input-group no-border input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input type="text" class="form-control" name="waist" value="" placeholder="Waist in Inch">
                                        </div>
                                <!--hips-->
                                <div class="input-group no-border input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input type="text" class="form-control" name="hips" value="" placeholder="Hips in Inch">
                                        </div>
                    <!-- Chest-->
                            <div class="input-group no-border input-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="chest" value="" placeholder="Chest in cm" required>
                            </div>
                    <!--Shoe-->
                        <div class="input-group no-border input-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                                <input type="text" class="form-control" name="shoeSize" value="" placeholder="Shoe Size (US)" required>
                            </div><br>
                
                          <!-- ReCaptcha--> 
                                <div class="d-flex justify-content-center">
                                    <div class="g-recaptcha" data-sitekey="6LcGAHAUAAAAAG5pXvyGGWTW0CgEg0o-9npi37Kb"></div>
                                </div>
                                <br><br>
                            <!-- Register/submit button -->
                                <input type="checkbox" name="tnc" value="1" required> I agree with the <a data-toggle="modal" href="#termsandconditions" style="color:black;">terms and conditions</a><br>
                                <br>
                                    <hc>
                                        <a href="" class="link" rel="tooltip" title="Back to Step 1" style="padding:10px;">Go Back</a>
                                    </hc>
                                <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg " >Register</button>
                            </div> 
                        </div>
                    </div>
                    <div class="col-sm-1">
                    </div>
                    <!-- End of Right column -->  
            
                    </div>
                </div>
              
                                                <!-- DO NOT REMOVE THIS CLASS -->
                                                <div class="pull-left col-lg-6"></div>                      
                            
                </form>
              </div>
      <!-- End Body Contents -->
      
      <!-- T&C Modal -->
      <div id="termsandconditions" class="modal fade" tabindex="-1" role="dialog" style="width:100%;">
        <div class="modal-dialog" role="document" style="width:100%; top: 150;">

          <!-- Modal content-->
          <div class="modal-content" style="color:black;" style="width:100%;">
              <div class="modal-header" style="width:100%;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Terms and Conditions</h4>
              </div>
              <div class="modal-body" style="width:100%;">
                <ul>
                    <li>
                        <h0>Models have to be 18 years old and above to join the Stella community.</h0>
                    </li>
                    <li>
                        <h0>Stella is only open to models who reside in the Philippines.</h0>
                    </li>
                    <li>
                        <h0>Stella reserves the right to take down content that surpases our community guidelines.</h0>
                    </li>
                </ul>
              </div>
              <div class="modal-footer" style="width:100%;">
                <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Dismiss</button>
              </div>
            </div>
        </div>
        <!-- End of Modal -->


      </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.registerapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>