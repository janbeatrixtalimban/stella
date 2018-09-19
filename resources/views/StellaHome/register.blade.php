<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="<?php echo asset('img/stella icon logo.png')?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Registration
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'
  />
  <link href="<?php echo asset('https://fonts.googleapis.com/css?family=Montserrat:400,700,200')?>" rel="stylesheet" />
  <link href="<?php echo asset('https://use.fontawesome.com/releases/v5.0.6/css/all.css')?>" rel="stylesheet">
  <link href="<?php echo asset('css/bootstrap.min.css')?>" rel="stylesheet" />
  <link href="<?php echo asset('css/now-ui-kit.css?v=1.2.0')?>" rel="stylesheet" />
  <link href="<?php echo asset('demo/demo.css')?>" rel="stylesheet" />
</head> 

<body class="login-page sidebar-collapse">
        <!-- Navigation bar -->
        <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
            <div class="container">
                <div class="col-lg-1">
                </div>
                <div class="col-lg-11">
                  <div class="navbar-translate">
                    <img src="<?php echo asset('img/stella icon logo.png')?>" width="40">
                    <a class="navbar-brand" href="" rel="tooltip" title="Register as a model or as an Employer" data-placement="bottom" target="_blank">
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
                        <div style="width: 250px;" class="logo-container">
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
            <form class="" action="/register" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                                                @if ($errors->any())
                                                    <div class="alert alert-danger">
                                                        <ul>
                                                            @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                             @endforeach
                                                        </ul>
                                                    </div>
                                                @endif
                <div class="container">
                  <div class="row">
                  <div class="col-sm-2">
                  </div>
                  <div class="col-lg-4">
                            <div class="form-group">
                            <h4>Basic Information</h4>
                            <!-- Model Form (fields) -->
    
                                  <!--First Name-->
                                      <div class="input-group no-border input-lg">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              </span>
                                          </div>
                                          <input type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" value="">
                                      </div>
                                  <!--Last Name-->
                                      <div class="input-group no-border input-lg">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              </span>
                                          </div>
                                          <input type="text" class="form-control" name="lastName" placeholder="Last Name" required>
                                      </div>
                                  <!-- Birthdate -->
                                      <div class="input-group no-border input-lg">
                                          <div class="input-group-prepend">
                                              <span class="input-group-text">
                                              </span>
                                          </div>
                                          <input type="text" name="birthDate" class="form-control date-picker" value="Birthdate :      mm/dd/yyyy" data-datepicker-color="red" required>
                                      </div>
                                      <br>
                                  <!-- Location dropdown -->
                      <label rel="tooltip" title="Only for Filipino residents.">
                        <b>Location</b>
                      </label>
                      <div id="ddlocation">
                              <div class="input-group no-border input-lg">
                                  <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                  </div>
                                  <select size="0.5" class="form-control" name="location" id="location" required>
                                      <option value="" selected disabled>Select your location..</option>
                                      <optgroup label="Luzon">
                                          <option value="abra">Abra</option>
                                          <option value="albay">Albay</option>
                                          <option value="apayo">Apayo</option>
                                          <option value="aurora">Aurora</ option>
                                          <option value="bataan">Bataan</option>
                                          <option value="batanes">Batanes</option>
                                          <option value="batangas">Batangas</option>
                                          <option value="benguet">Benguet</option>
                                          <option value="bulacan">Bulacan</option>
                                          <option value="cagayan">Cagayan</option>
                                          <option value="camarines">Camarines</option>
                                          <option value="catanduanes">Catanduanes</option>
                                          <option value="cavite">Cavite</option>
                                          <option value="ifugao">Ifugao</option>
                                          <option value="ilocos">Ilocos</option>
                                          <option value="isabela">Isabela</option>
                                          <option value="kalinga">Kalinga</option> 
                                          <option value="lu">La Union</option>
                                          <option value="laguna">Laguna</option>
                                          <option value="marinduque">Marinduque</option>
                                          <option value="masbate">Masbate</option>
                                          <option value="mm">Metro Manila</option>
                                          <option value="mp">Mountain Province</option>
                                          <option value="nueveja">Nueva Ecija</option>
                                          <option value="nuevviz">Nueva Vizcaya</option>
                                          <option value="mindoro">Mindoro</option>
                                          <option value="palawan">Palawan</option>
                                          <option value="pampanga">Pampanga</option>
                                          <option value="pangasinan">Pangasinan</option>
                                          <option value="rizal">Rizal</option>
                                          <option value="romblon">Romblon</option>
                                          <option value="quezon">Quezon</option>
                                          <option value="quirino">Quirino</option>
                                          <option value="sorsogon">Sorsogon</option>
                                          <option value="tarlac">Tarlac</option>
                                          <option value="zamba">Zambales</option>
                                      </optgroup>
                                      <optgroup label="Visayas">
                                          <option value="aklan">Aklan</option>
                                          <option value="antique">Antique</option>
                                          <option value="biliran">Biliran</option>
                                          <option value="bohol">Bohol</option>
                                          <option value="capiz">Capiz</option>
                                          <option value="cebu">Cebu</option>
                                          <option value="es">Eastern Samar</option>
                                          <option value="guimaras">Guimaras</option>
                                          <option value="iloilo">Iloilo</option>
                                          <option value="leyte">Leyte</option>
                                          <option value="negros">Negros</option>
                                          <option value="samar">Samar</option>
                                          <option value="siquijor">Siquijor</option>
                                      </optgroup>
                                      <optgroup label="Mindnao">
                                      <option value="agusan">Agusan</option>
                                          <option value="basilan">Basilan</option>
                                          <option value="bukidnon">Bukidnon</option>
                                          <option value="camiguin">Camiguin</option>
                                          <option value="compvalley">Compostela Valley</option>
                                          <option value="cotabato">Cotabato</option>
                                          <option value="cebu">Cebu</option>
                                          <option value="davao">Davao</option>
                                          <option value="di">Dinagat Islands</option>
                                          <option value="lanao">Lanao</option>
                                          <option value="mindanao">Maguindanao</option>
                                          <option value="misamis">Misamis</option>
                                          <option value="sarangani">Sarangani</option>
                                          <option value="sulkud">Sultan Kudarat</option>
                                          <option value="sulu">Sulu</option>
                                          <option value="surigao">Surigao</option>
                                          <option value="tt">Tawi-Tawi</option>
                                          <option value="zambo">Zamboanga</option>
                                      </optgroup>
                                  </select>
                              </div>
                      </div>
                  </div>
                  </div>

                  <!--contact number-->
                  <div class="input-group no-border input-lg">
                    <div class="input-group-prepend">
                        <span class="input-group-text">
                        </span>
                    </div>
                    <input type="text" class="form-control" name="contactNo" placeholder="09xx-xxx-xxxx" required>
                </div>
                                  <!-- Valid ID -->
                                          <label for="validId"><b>Valid Government ID</b></label>
                                          <div class="input-group no-border input-lg">
                                              <div class="input-group-prepend">
                                                  <span class="input-group-text">
                                                    <i class="now-ui-icons arrows-1_cloud-upload-94"></i>
                                                  </span>
                                              </div>
                                              <div class="form-control">
                                                Click to upload
                                                <input size="0.5" type="file" name="filePath" class="form-control" accept="image/jpeg, image/png">
                                              </div>
                                          </div>
                                      </div>
                              
      
      
              <!-- Right Column Contents -->
              <div class="col-sm-4">
                        <div class="form group">
                          <h4>Log In Credentials</h4>
                          <!--Email-->
                            <div class="input-group no-border input-lg">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                              </div>
                              <input type="text" class="form-control" name="emailAddress" placeholder="Enter your E-mail" required>
                            </div>
                          <!-- Password -->
                            <div class="input-group no-border input-lg">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                              </div>
                              <input type="password" class="form-control" name="password" placeholder="Enter your Password" required>
                            </div>
                          <!-- Repeat Password -->
                            <div class="input-group no-border input-lg">
                              <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                              </div>
                              <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required>
                            </div> 
                            <br>
                          <!-- ReCaptcha-->
                            <div class="d-flex justify-content-center">
                                <div class="g-recaptcha" data-sitekey="6LcGAHAUAAAAAG5pXvyGGWTW0CgEg0o-9npi37Kb"></div>
                            </div>
                          </div> 
                          </div>
                        </div>  
              <div class="col-sm-2">
              </div>
      
              <!-- Button -->
                    
                                <button type="submit" name="button" >Register</button>
                                    <div class="pull-left">
                                      <h6>
                                        <a href="{{ url('/stellahome') }}" class="link">Cancel</a>
                                      </h6>
                                    </div>
                          
                </form>
              </div>
      <!-- End Body Contents -->
      
      <!-- T&C Modal -->
      <div id="termsandconditions" class="modal fade" role="dialog">
        <div class="modal-dialog">
      
          <!-- Modal content-->
          <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Modal Header</h4>
              </div>
              <div class="modal-body">
                <p>Some text in the modal.</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              </div>
            </div>
        </div>
      </div>
<!-- Footer-->
<footer class="footer">
        <div class="container">
          <nav>
            <ul>
              <li>
                <a href="">
                  About Us
                </a>
              </li>
            </ul>
          </nav>
          <div class="copyright" id="copyright">
            &copy;
            <script>
              document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Developed by Angela, Bea, and Justine
          </div>
        </div>
      </footer>
    </div>
  
    <script src="<?php echo asset('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('https://www.google.com/recaptcha/api.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/core/jquery.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/core/popper.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('public/js/bootstrap.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/core/bootstrap.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/plugins/bootstrap-switch.js')?>"></script>
    <script src="<?php echo asset('js/plugins/nouislider.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/plugins/bootstrap-datepicker.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE')?>"></script>
    <script src="<?php echo asset('js/now-ui-kit.js?v=1.2.0')?>" type="text/javascript"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
  </body>
  </html>


