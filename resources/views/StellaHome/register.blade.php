@extends('layouts.registerapp')

<title>@yield('pageTitle') Register - Model</title>

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
                    <a class="navbar-brand" href="" rel="tooltip" title="Register as a model" data-placement="bottom">
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
                      </div>
                  </div>
              </div>
              <div class="col-sm-4">
              </div>
            </div>
      <!--End logo header-->
      

<!-- Body Contents -->
    <!--Left column contents-->
    <h3 class="h3-seo">Model Registration</h3><br><br>
        <form class="" action="{{ url('/register') }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="container-fluid">
                <div class="row"> <!--row for navpills -->
                <div class="col-sm-3"></div>
                <ul class="nav nav-pills" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">1: Account & Basic Information</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">2: Appearance & Measurements</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled hidden" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled hidden" id="measurement-tab" data-toggle="tab" href="#measurement" role="tab" aria-controls="contact" aria-selected="false"></a>
                    </li>
                </ul>
                </div><!-- closing for row navpills--><br><br>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="container-fluid">        
                        @if (\Session::has('other'))
                            <div class="alert alert-danger" role="alert">
                                {!! \Session::get('other') !!}
                            </div>
                        @endif
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-5">
                                <div class="form-group">
                            <!-- Model Form (fields) -->
                                <h4>Basic Information</h4>
                                <div class="card card-login card-plain">
                            <label>Full Name</label>&nbsp;<a style="color:red;" rel="tooltip" title="Required Fields">*</a>
                                <!--First Name-->
                                    <div class="card card-login card-plain">
                                        <div class="input-group no-border input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <input rel="tooltip" title="Required" type="text" class="form-control" name="firstName" id="firstName" placeholder="First Name" value="" required>
                                        </div>
                                    <!--Middle Name-->
                                        <div class="input-group no-border input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <input rel="tooltip" title="Optional" type="text" class="form-control" name="middleName" placeholder="Middle Name (optional)">
                                        </div>
                                    <!--Last Name-->
                                        <div class="input-group no-border input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <input rel="tooltip" title="Required"  type="text" class="form-control" name="lastName" placeholder="Last Name" required>
                                        </div>
                        			    @if (\Session::has('name'))
                            				<div class="alert alert-danger" role="alert">
                                			    {!! \Session::get('name') !!}
                            				</div>
                        			    @endif
                                    <!--Screen Name-->
                                    <label>Screen Name (optional)</label>
                                        <div class="input-group no-border input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <input rel="tooltip" title="Optional" type="text" class="form-control" name="screenName" id="screenName" placeholder="Screen Name" value="">
                                        </div><br>
                                    <!-- Birthdate -->
                                    <label rel="tooltip" title="Must be 18 and older">Birthdate</label>&nbsp;<a style="color:red;" rel="tooltip" title="Required Field">*</a>
                                        <div class="input-group no-border input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <input rel="tooltip" title="Required" type="date" class="form-control" name="birthDate" value="" required>
                                        </div><br>
                        			    @if (\Session::has('birthday'))
                            				<div class="alert alert-danger" role="alert">
                                			    {!! \Session::get('birthday') !!}
                            				</div>
                        			    @endif
                                    <!--Contact number-->
                                    <label rel="tooltip" title="e.g - 09121231234">Contact Number</label>&nbsp;<a style="color:red;" rel="tooltip" title="Required Field">*</a>
                                        <div class="input-group no-border input-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                    </span>
                                                </div>
                                                <input rel="tooltip" title="Required" type="text" class="form-control" name="contactNo" placeholder="09xx-xxx-xxxx" required>
                                        </div><br>
                        			    @if (\Session::has('contact'))
                            				<div class="alert alert-danger" role="alert">
                                			    {!! \Session::get('contact') !!}
                            				</div>
                        			    @endif
                                    <!-- Skill -->
                                    <label>Model Role</label>&nbsp;<a style="color:red;" rel="tooltip" title="Required Field">*</a>
                                        <div class="input-group no-border input-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                    </span>
                                                </div>
                                                <select rel="tooltip" title="Required" size="0.4" class="form-control" name="skill" id="skill" required>
                                                    <optgroup style="color: black;">
                                                    <option value="" selected disabled style="color: black;">Select Role..</option>
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
                                                    </optgroup>
                                                </select>
                                            </div>
                                    </div>
                                    <!-- End of fields for left column -->

                                </div> <!-- card closing tag -->
                            </div> <!--form group closing tag-->
                        </div> <!-- col-sm-5 closing for left column -->
                    
                    <!-- End of left Column -->
               
                    <!-- Right Column Contents -->
                    <div class="col-sm-5">
                        <div class="form-group">
                        <br><br>  
                        <div class="card card-login card-plain">
                        <!-- Address line 1 -->
                        <label>Full Address <a style="color:red;" rel="tooltip" title="Required Fields">*</a></label>
                                        <div class="input-group no-border input-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                    </span>
                                                </div>
                                            <!-- Unit -->
                                                <input rel="tooltip" title="Required" type="text" class="form-control" name="unitNo" id="unitNo" placeholder="Unit No." value="" required>
                                            <!-- Street -->
                                                <input rel="tooltip" title="Required" type="text" class="form-control" name="street" id="street" placeholder="Street" value="" required>
                                            <!-- Barangay -->
                                                <input rel="tooltip" title="Required" type="text" class="form-control" name="brgy" id="brgy" placeholder="Barangay" value="" required>
                                        </div>
                                    <!-- Address line 2 dropdown -->
                                        <div class="input-group no-border input-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">
                                                    </span>
                                                </div>
                                        <!--Province-->
                                            <select rel="tooltip" title="Required" size="0.4" class="form-control" name="location" id="location" required>
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
                                                <select size="0.4" class="form-control" name="city" id="city">
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
                                            <!-- Zip Code -->
                                                <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Zip Code" value="" required>
                                            </div>
                        			    @if (\Session::has('address'))
                            				<div class="alert alert-danger" role="alert">
                                			    {!! \Session::get('address') !!}
                            				</div>
                        			    @endif
						                <br>
                                        <!-- Valid ID -->
                                        <label rel="tooltip" title="Any government issued ID">Valid ID (for verification)</label>&nbsp;<a style="color:red;" rel="tooltip" title="Required Field">*</a>
                                            <div class="input-group no-border input-sm">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" style="background-color:none;">
                                                        <i class="now-ui-icons arrows-1_cloud-upload-94" style="background-color:none;"></i>
                                                    </span>
                                                        <input size="0.5" type="file" name="filePath" class="form-control" accept="image/jpeg, image/png" required>
                                                </div>
                                            </div><br><br>
						                @if (\Session::has('image'))
                            				<div class="alert alert-danger" role="alert">
                                			    {!! \Session::get('image') !!}
                            				</div>
                        			    @endif
                          <h4>Login Credentials <a style="color:red;" rel="tooltip" title="Required Fields">*</a></h4>
                            <!--Email-->
                            <div class="input-group no-border input-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                </div>
                                <input rel="tooltip" title="Required" type="text" class="form-control" name="emailAddress" placeholder="Enter your E-mail" required>
                                </div>
                        			    @if (\Session::has('email'))
                            				<div class="alert alert-danger" role="alert">
                                			    {!! \Session::get('email') !!}
                            				</div>
                        			    @endif
                            <!-- Password -->
                                <div class="input-group no-border input-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                </div>
                                <input rel="tooltip" title="Required" type="password" class="form-control" name="password" placeholder="Enter your Password" required>
                                </div>
                            <!-- Repeat Password -->
                                <div class="input-group no-border input-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                </div>
                                <input type="password" class="form-control" name="confirmpassword" placeholder="Confirm Password" required>
                                </div> 
                        			    @if (\Session::has('password'))
                            				<div class="alert alert-danger" role="alert">
                                			    {!! \Session::get('password') !!}
                            				</div>
                        			    @endif
                                <br>
                            <!--hidden avatar field -->
                                <input type="hidden" name="avatar" id="avatar" value="default.png" required>
                            <!-- Register/submit button -->
                                <button type="submit" id="next" onclick="return checkForm(2)" class="btn btn-maroon btn-round btn-lg" rel="tooltip" title="Proceed to Step 2">Next</button>
                                    <hc>
                                        <a href="{{ url('/home') }}" rel="tooltip" title="Cancel Registration" class="link" style="padding:10px;">Cancel</a>
                                    </hc>
                            </div> <!-- card closing -->
                        </div> <!--form-group closing -->
                    </div> <!--col-sm-5 closing -->

                    <div class="col-sm-1"></div>
                    <!-- End of Right column -->  

                    </div> <!-- closing ROW for step 1 form -->
                </div> <!-- closing container-fluid -->
            </div> <!-- closing tab navpill 1 -->
  

        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-1">
                        </div>
                        <div class="col-sm-5">
                            <div class="form-group">
                            <!-- Model Form (fields) -->
                                  <!-- Eye Color -->
                            <h4>Physical Appearance <a style="color:red;" rel="tooltip" title="Required Fields">*</a></h4>
                            <div class="card card-login card-plain">
                                <div class="input-group no-border input-sm">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                </span>
                                            </div>
                                            <select rel="tooltip" title="Required" size="0.5" class="form-control" name="eyeColor" id="eyeColor" required>
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
                                            <select rel="tooltip" title="Required" size="0.5" class="form-control" name="hairColor" id="hairColor" required>
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
                                            <select rel="tooltip" title="Required" size="0.5" class="form-control" name="hairLength" id="hairLength" required>
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
                                        <select rel="tooltip" title="Required" size="0.5" class="form-control" name="complexion" id="complexion" required> 
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
                                        <select rel="tooltip" title="Required" size="0.5" class="form-control" name="gender" id="gender" required>
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
                                        <select rel="tooltip" title="Required" size="0.5" class="form-control" name="tatoo" id="tatoo" required> <optgroup style="color: black;">
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
                        @if (\Session::has('attribute'))
                            <div class="alert alert-danger" role="alert">
                                {!! \Session::get('attribute') !!}
                            </div>
                        @endif
                        <div class="form-group">
                          <div class="card card-login card-plain">
                          <h4>Weight and Measurements <a style="color:red;" rel="tooltip" title="Required Fields">*</a></h4>
                                <!--Weight-->
                                <div class="input-group no-border input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input rel="tooltip" title="Required" type="text" class="form-control" name="weight" value="" placeholder="Weight (KG)" required>
                                        </div>
                                <!--Height-->
                                <div class="input-group no-border input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input rel="tooltip" title="Required" type="text" class="form-control" name="height" value="" placeholder="Height (CM)" required>
                                        </div>
                                <!--Waist-->
                                <div class="input-group no-border input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input rel="tooltip" title="Required" type="text" class="form-control" name="waist" value="" placeholder="Waist (Inch)" required>
                                        </div>
                                <!--hips-->
                                <div class="input-group no-border input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                            <input rel="tooltip" title="Required" type="text" class="form-control" name="hips" value="" placeholder="Hips (Inch)" required>
                                        </div>
                    <!-- Chest-->
                            <div class="input-group no-border input-sm">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                    </span>
                                </div>
                                <input rel="tooltip" title="Required" type="text" class="form-control" name="chest" value="" placeholder="Chest (Inch)" required>
                            </div>
                    <!--Shoe-->
                        <div class="input-group no-border input-sm">
                            <div class="input-group-prepend">
                                <span class="input-group-text">
                                </span>
                            </div>
                                <select rel="tooltip" title="Required" size="0.5" class="form-control" name="shoeSize" id="shoeSize" required> 
                                        <optgroup style="color: black;">
                                                <option value="" selected disabled style="color: black;">Select Shoe Size (US)..</option>
                                                <option value="US 3">US 3</option>
                                                <option value="US 4">US 4</option>
                                                <option value="US 5">US 5</option>
                                                <option value="US 6">US 6</option>
                                                <option value="US 7">US 7</option>
                                                <option value="US 8">US 8</option>
                                                <option value="US 9">US 9</option>
                                                <option value="US 10">US 10</option>
                                                <option value="US 11">US 11</option>
                                                <option value="US 12">US 12</option>
                                                <option value="US 13">US 13</option>
                                                <option value="US 14">US 14</option>
                                                <option value="US 15">US 15</option>
                                            </optgroup>
                                        </select>
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
                                        <a onclick="checkForm(1)" class="link" rel="tooltip" title="Back to Step 1" style="padding:10px;">Go Back</a>
                                    </hc>
                                <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg " >Register</button>
                            </div> 
                        </div>
                    </div>
                    <div class="col-sm-1">
                    </div>
                    <!-- End of Right column -->  
            
                    </div> <!-- ROW right columns closing -->
                </div><!-- container-fluid closing -->
            </div> <!-- attributes tab pane closing -->
        </div>
    </form>  
            
    
                                                <!-- DO NOT REMOVE THIS CLASS -->
                                                <div class="pull-left col-lg-6"></div>                      
                
        </div> <!--Page header closing -->
    </div> <!-- Closing tag for modal to work DO NOT REMOVE -->

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
                    <li>
                        <h0>Model's attributes will be displayed in their profiles for Employer viewing purposes. You will not be allowed to register without providing your modelling attributes.</h0>
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
@endsection

