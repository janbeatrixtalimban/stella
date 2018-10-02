 
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
                    <a class="dropdown-item" href="{{ url('/subscription') }}">Subscriptions</a>
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
                    <h5 class="card-title text-center py-3">Why go premium?</h5>
                <div class="card-body">
                        
                    
                    <h1> PLS INSERT WHY THANKS hahaha </h1>
                    
                       
                   
                    <a href="/gopremium" class="btn btn-rounded float-right animated pulse btn-info">Get Subscription</a>
                    <a href="/modelfeed" class="btn btn-rounded float-right animated pulse btn-info">Back</a>
                    
               
                </div>
            </div>
        </div>
    
            
            
@endsection 
