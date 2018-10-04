@extends('layouts.registerapp')

<title>@yield('pageTitle') Register Employer</title>

@section('content')

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
                                          <input type="text" name="birthDate" class="form-control date-picker" value="Birthdate :      mm/dd/yyyy" data-datepicker-color="red" required>
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
                                                <optgroup label="Visayas" style="color: black;">
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
                                                <optgroup label="Mindnao" >
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
                                              </div>
                                              <div class="form-control">
                                                Click to upload
                                                <input size="0.5" type="file" name="filePath" class="form-control" accept="image/jpeg, image/png">
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
                          <!-- ReCaptcha-->
                                <div class="d-flex justify-content-center">
                                    <div class="g-recaptcha" data-sitekey="6LcGAHAUAAAAAG5pXvyGGWTW0CgEg0o-9npi37Kb"></div>
                                </div>
                                <br><br>
                            <!-- Register/submit button -->
                            <input type="checkbox" name="tnc" value="1" > I agree with the <a data-toggle="modal" href="#termsandconditions" style="color:black;" required>terms and conditions</a>
                            <br><br>
                                <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg " >Register</button>
                                    <hc>
                                        <a href="{{ url('/stellahome') }}" class="link" style="padding:10px;">Cancel</a>
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
@endsection

