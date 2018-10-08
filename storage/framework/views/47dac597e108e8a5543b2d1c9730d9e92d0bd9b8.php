<title><?php echo $__env->yieldContent('pageTitle'); ?> Register Employer</title>

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
                      Registration
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
                        <h3 class="h3-seo">Employer Registration</h3>
                      </div>
                  </div>
              </div>
              <div class="col-sm-4">
              </div>
            </div>
      <!--End logo header-->
      
      <!-- Body Contents -->
            <!--Left column contents-->
            <form class="" action="/registerEmployer" method="post" enctype="multipart/form-data">
                <?php echo e(csrf_field()); ?>

                            <?php if($errors->any()): ?>
                                <div class="alert alert-danger">
                                    <ul>
                                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li><?php echo e($error); ?></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </ul>
                                </div>
                             <?php endif; ?>
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                            <h4>Employer Information</h4>
                            <!-- Employer Form (fields) -->
                                  <!--First Name-->
                                  <div class="card card-login card-plain">
                                      <div class="input-group no-border input-sm">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              </span>
                                          </div>
                                          <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" value="" required>
                                      </div>
                                  <!--Last Name-->
                                      <div class="input-group no-border input-sm">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              </span>
                                          </div>
                                          <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
                                      </div>
                                  <!-- Birthdate -->
                                      <div class="input-group no-border input-sm">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              </span>
                                          </div>
                                          <input type="date" class="form-control" name="birthDate" value="" required>
                                      </div>
                                  <!-- Location dropdown -->
                                  <div class="input-group no-border input-sm">
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
                                    <!--Contact number-->
                                        <div class="input-group no-border input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" name="contactNo" placeholder="09xx-xxx-xxxx" required>
                                        </div>
                                        <br>
                                    <!-- Valid ID -->
                                        <label for="validId"><b>Valid Government Company Document</b></label>
                                          <div class="input-group no-border input-sm">
                                            <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                    <i class="now-ui-icons arrows-1_cloud-upload-94"></i>
                                                  </span>
                                                    <input size="0.5" type="file" name="filePath" class="form-control" accept="image/jpeg, image/png" required>
                                              </div>
                                          </div>
                                      </div>
                                    <!-- End of fields for left column -->
                            </div>
                        </div>
                    <!-- End of left Column -->
               
                    <!-- Right Column Contents -->
                    <div class="col-sm-4">
                        <div class="form-group">
                        <h4>Company Information</h4>
                            <!-- Employer Form (fields) -->
                                <!--Company Name-->
                                <div class="card card-login card-plain">
                                      <div class="input-group no-border input-sm">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              </span>
                                          </div>
                                          <input type="text" class="form-control" name="name" id="name" placeholder="Company Name" value="" required>
                                </div>
                                <!-- Position -->
                                <div class="card card-login card-plain">
                                      <div class="input-group no-border input-sm">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              </span>
                                          </div>
                                          <input type="text" class="form-control" name="position" id="position" placeholder="Position" value="" required>
                                </div>
                          <h4>Log In Credentials</h4>
                            <!--Email-->
                                <div class="input-group no-border input-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="emailAddress" placeholder="Enter your E-mail" required>
                                </div>
                            <!-- Password -->
                                <div class="input-group no-border input-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="Enter your Password" required>
                                </div>
                            <!-- Repeat Password -->
                                <div class="input-group no-border input-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required>
                                </div> 
                                <br>
                            <!--hidden avatar field -->
                                <input type="hidden" name="avatar" id="avatar" value="default.png" required>
                          <!-- ReCaptcha-->
                                <div class="d-flex justify-content-center">
                                    <div class="g-recaptcha" data-sitekey="6LcGAHAUAAAAAG5pXvyGGWTW0CgEg0o-9npi37Kb"></div>
                                </div>
                                <br><br>
                            <!-- Register/submit button -->
                                <input type="checkbox" name="tnc" value="1" required> I agree with the <a data-toggle="modal" href="#termsandconditions" style="color:black;">terms and conditions</a>
                                <br>
                                <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg " >Register</button>
                                    <hc>
                                        <a href="<?php echo e(url('/stellahome')); ?>" class="link" style="padding:10px;">Cancel</a>
                                    </hc>
                            </div> 
                        </div>
                    </div>
                    <div class="col-sm-2">
                    </div>
                    <!-- End of Right column -->  
            
                    </div>
                </div>
              
                                                <!-- DO NOT REMOVE THIS CLASS -->
                                                <div class="pull-left col-lg-6"></div>                      
                            
                </form>
              </div>
    </div>
      <!-- End Body Contents -->
      
      <!-- T&C Modal -->
      <div id="termsandconditions" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog tncmodal" role="document">

          <!-- Modal content-->
          <div class="modal-content" style="color:black;">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Terms and Conditions</h4>
              </div>
              <div class="modal-body">
                <ul>
                    <li>
                        <h0>Employers will be held liable if they fail to provide legitimate project details.</h0>
                    </li>
                    <li>
                        <h0>Stella only allows physical projects that will take place in the Philippines.</h0>
                    </li>
                    <li>
                        <h0>Stella reserves the right to take down content that surpases our community guidelines.</h0>
                    </li>
                </ul>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">Dismiss</button>
              </div>
            </div>
        </div>
        <!-- End of Modal -->


      </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.registerapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>