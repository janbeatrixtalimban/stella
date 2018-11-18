@extends('layouts.adminapp')

<title>@yield('pageTitle') Stella Admin </title>

<!-- Side nav bar -->
<body class="">
  <div class="wrapper ">
      <!-- Admin side bar -->
    <div class="sidebar" data-color="black">
      <div class="logo">
        <img src="<?php echo asset('img/logo_white.png')?>" width="150">
        <h5 style="color:white;"> Welcome, {{ Auth::user()->firstName}} {{ Auth::user()->lastName}}! </h5>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="{{ url('/admin/dashboard') }}">
              <i class="now-ui-icons business_chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/admin/ViewAuditLog') }}">
              <i class="now-ui-icons files_paper"></i>
              <p>Audit Log</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/admin/viewAdmin') }}">
              <i class="now-ui-icons business_badge"></i>
              <p>Admins</p>
            </a>
          </li>
          <li>
             <a href="{{ url('/admin/income') }}">
                <i class="now-ui-icons business_money-coins"></i>
                <p>Income Report</p>
             </a>
          </li>
          <li>
            <a href="{{ url('/admin/ViewModel') }}">
              <i class="now-ui-icons users_single-02"></i>
              <p>Models</p>
            </a>
          </li>
          <li>
          <li>
            <a href="{{ url('/admin/ViewEmployer') }}">
           <i class="now-ui-icons users_single-02"></i>
            <p>Employers</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/admin/reportedJobs') }}">
              <i class="now-ui-icons gestures_tap-01"></i>
              <p>Reports - Job Posts</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/admin/reportedImg') }}">
              <i class="now-ui-icons gestures_tap-01"></i>
              <p>Reports - Photos</p>
            </a>
          </li>
        </ul>
      </div>
    </div>

<!-- Section Start -->    
@section('content')
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Add Admin</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="now-ui-icons users_single-02"></i>
                      <p>
                        <span class="d-lg-none d-md-block">Add Admin</span>
                    </p>
                </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <p style="text-align:center;">&nbsp;<b>{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</b></p></a>
                                
                        <a class="dropdown-item" href="{{ url('/admin/logout') }}" style="color:black;">Logout</a>
                    </div>
            </li>
        </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      
      <div class="panel-header panel-header-sm">
      </div>
      <div class="content">
        <div class="row">
            <div class="col-md-1"></div>
          <div class="col-md-10">
            <div class="card">
              <div class="card-header">
		<div class="row">
                <h4 class="card-title" style="padding-left:15px;padding-right:30px;">Add Admin</h4> 
		   <a href="{{ url('/admin/viewAdmin') }}" style="padding-top:17px; color:#003366;">[Go Back]</a>
              </div></div>

                    <div class="card-body">
                        <form method="POST" action="{{ url('/admin/addAdmin') }}">
                            {{ csrf_field() }}
                            <!-- First Name -->
                            <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" name="firstName" value="" required >
                                        </div>
                                    </div>
                            <!-- Last Name -->
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" name="lastName" value=""  required >
                                        </div>
                                    </div>
                            <!-- Birthday -->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Birthday</label>
                                        <input type="date" class="form-control" name="birthDate" value=""  required>
                                    </div>
                                </div>
                            </div>
				@if (\Session::has('name'))
                                    <div class="alert alert-danger" role="alert">
                                        {!! \Session::get('name') !!}
                                    </div>
                                @endif
				@if (\Session::has('birthday'))
                                    <div class="alert alert-danger" role="alert">
                                        {!! \Session::get('birthday') !!}
                                    </div>
                                @endif


                            <!-- Contact Number -->
                                <div class="form-group">
                                    <label>Contact Number</label>
                                    <input type="text" class="form-control" id="contactNo" name="contactNo" placeholder="09xx-xxx-xxxx" required>
                                </div>
				@if (\Session::has('contact'))
                                    <div class="alert alert-danger" role="alert">
                                        {!! \Session::get('contact') !!}
                                    </div>
                                @endif

                            <!-- Address -->
                            <label>Address:</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="unitNo" id="unitNo" placeholder="Unit No." value=""  required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="street" id="street" placeholder="Street" value=""  required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="brgy" id="brgy" placeholder="Barangay" value=""  required>
                                    </div>
                                </div>
                            </div>
                            <!-- Location dropdown -->
                            <div class="row">
                                <div class="col-md-4">
                                    <!--Province-->
                                    <div class="form-group"> 
                                        <select size="0.5" class="form-control" name="location" id="location" required>
                                            <option value="" selected disabled>Select your province..</option>
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
                                </div>
                            <!-- City -->
                                    <div class="col-md-4">
                                        <div class="form-group"> 
                                        <select size="0.4" class="form-control" name="city" id="city">
                                                        <option value="" selected disabled>Select City..</option>
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
                                                </div>
                                            </div>
                                    <div class="col-md-4">
                                        <div class="form-group"> 
                                            <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Zip Code" value=""  required>
                                        </div>
                                    </div>
                            </div>
				@if (\Session::has('address'))
                                    <div class="alert alert-danger" role="alert">
                                        {!! \Session::get('address') !!}
                                    </div>
                                @endif

                            <!-- Email -->
                            <div class="form-group">    
                                <label>Email</label>   
                                    <input type="text" class="form-control" id="emailAddress" name="emailAddress" value=""  required> 
                            </div> 
				@if (\Session::has('email'))
                                    <div class="alert alert-danger" role="alert">
                                        {!! \Session::get('email') !!}
                                    </div>
                                @endif

                            <!-- Password -->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">    
                                        <label>Password</label>   
                                        <input type="password" class="form-control" id="password" name="password" value=""  required> 
                                    </div> 
                                </div>
                            <!-- Repeat Password -->
                                <div class="col-md-6">
                                    <div class="form-group">    
                                        <label>Confirm Password</label>   
                                        <input type="password" class="form-control" id="confirmpassword" name="confirmpassword" value=""  required> 
                                    </div> 
                                </div>
                            </div>
				@if (\Session::has('password'))
                                    <div class="alert alert-danger" role="alert">
                                        {!! \Session::get('password') !!}
                                    </div>
                                @endif

                            <!-- Save button -->
                                <button type="submit" name="button" class="btn btn-info btn-round btn-lg" style="float:right;">Save</button>

                        </form>
                    </div>
                </div>
            </div><!-- col-sm-6 closing tag -->

        <!--End of form -->
          
        </div>

      </div>
@endsection
 <!-- Form -->
 
</body>
