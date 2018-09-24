
@extends('layouts.modelapp')


@section('content')
        <!-- Navigation bar hehe -->
        <nav class="navbar navbar-expand navbar-dark bg-black flex-column flex-md-row bd-navbar">
                <div class="container">
      
        <div class="navbar-translate">
          <img src="<?php echo asset('img/logo_white.png')?>" width="100">
            <a class="navbar-brand" href="" rel="tooltip" title="Browse now" data-placement="bottom"
              target="_blank">
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
                <a class="nav-link" href="{{ url('/modelprofile ') }}" rel="tooltip" title="Go to profile" role="button">
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
                    <a class="dropdown-header">Homepage</a>
                    <a class="dropdown-item" href="{{ url('/modelprofile') }}">
                    <h6>{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</h6></a>
                    <a class="dropdown-item" href="{{ url('/modeljoboffers') }}">View Job Offers</a>
                    <a class="dropdown-item" href="{{ url('/modelsubscription') }}">Subscriptions</a>
                    <a class="dropdown-item" href="{{ url('/modelsubscription') }}">Settings</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{ url('/logout') }}">Logout</a>
                  </div>
                </div>
              </li>
            </ul>
      </div>

            </div><!-- nav container closing tag -->
</nav>
        <div class="col-sm-4">
            <div class="card">
                    <h5 class="card-title text-center py-3">General Account Settings</h5>
                <div class="card-body">
                        <form method="POST" action="{{ url('/SaveEdit/'.Auth::user()->userID) }}">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" name="firstName" value="{{ Auth::user()->firstName}}" readonly="true">
                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" name="lastName" value="{{ Auth::user()->lastName}}"  readonly="true">
                    </div>
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" id="contactNo" name="contactNo" >
                    </div>
                    <div class="form-group">
                        <label>Location</label>
                        <select size="0.5" class="form-control" name="location" id="location" required>
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
                    <div class="form-group">
                        <label>Birthday</label>
                        <input type="text" class="form-control" name="birthDate" value="{{ Auth::user()->birthDate}}"  readonly="true">
                    </div>
                    <div class="form-group">    
                        <label>Email</label>   
                        <input type="text" class="form-control" id="emailAddress" name="emailAddress" value="{{ Auth::user()->emailAddress}}"  readonly="true"> 
                    </div> 
                    
                    <a href="/modelfeed" class="btn btn-rounded float-right animated pulse btn-warning">Back</a>
                    <button type="submit" class="btn btn-rounded float-right animated pulse btn-success">Save</button>
                </form>
                </div>
            </div>
        </div>
    
        <script>
                var msg = '{{Session::get('alert')}}';
                var exist = '{{Session::has('alert')}}';
                if(exist){
                  alert(msg);
                }
              </script>
            
            
            
@endsection 
