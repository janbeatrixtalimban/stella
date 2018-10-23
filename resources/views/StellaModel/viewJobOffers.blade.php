@extends('layouts.employerapp')

<title>@yield('pageTitle') View Job Offers </title>

@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">
            <!-- Navigation bar hehe -->
            <nav class="navbar navbar-expand-lg bg-black" style="width:100%;">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" href="{{ url('/modelfeed ') }}" rel="tooltip" title="Go to Homepage" data-placement="bottom">
                        <img src="<?php echo asset('img/logo_white.png')?>" width="100">
                    </a>
                    <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-bar top-bar"></span>
                      <span class="navbar-toggler-bar middle-bar"></span>
                      <span class="navbar-toggler-bar bottom-bar"></span>
                    </button>
                </div>

                <div class="col-sm-1">
                </div>

              <!-- Options and logout-->
              <div class="collapse navbar-collapse justify-content-end" id="navigation">

                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="{{ url('/modelfeed') }}" data-placement="bottom" rel="tooltip" title="Go to Homepage">
                                <p>Home</p>
                            </a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="{{ url('/modelprofile ') }}" rel="tooltip" title="Go to profile" role="button">
                        <img src="/uploads/avatars/{{ Auth::user()->avatar }}" width="25" height="25" alt="Thumbnail Image" class="rounded-circle img-raised">
                        <p>
                          <span class="d-lg-none d-md-block"> {{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</span>
                        </p>
                        </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link dropdown-toggle" href="#pablo" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <p>
                                <i class="now-ui-icons">
                                  <span class="button-bar"></span>
                                  <span class="button-bar"></span>
                                  <span class="button-bar"></span>
                                </i>
                                <span class="d-lg-none d-md-block">   View Job Offers</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">View Job Offers</a>
                                <a class="dropdown-item" href="{{ url('/modelprofile') }}" style="color:black;">
                                <h6>{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</h6></a>
                                <a class="dropdown-item" href="{{ url('/viewjoboffers') }}" style="color:black;">View Job Offers</a>
                                <a class="dropdown-item" href="{{ url('/subscription') }}" style="color:black;">Subscription</a> 
                                <a class="dropdown-item" href="{{ url('/#') }}" style="color:black;">Settings</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ url('/logout') }}" style="color:black;">Logout</a>
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
                <div class="col-sm-7">
                <!-- Card for job offer contents -->
                @foreach($details as $details)
                      <div id="joboffer" class="card text-center">
                          <div class="card-body" style="color:#1b1b1b;">
                          <div class="row">
                            <div class="col-sm-8">
                              <h3 class="card-title text-center">{{ $details->prjTitle }}</h3>
                              <p>{{ $details->jobDescription }}</p>
                              <h0>Email: <b>{{ $details->emailAddress }}</b></h0><br>
                              <h0>Company: <b>{{$details->name}}</b></h0><br>
                              <h0>Role: <b>{{ $details->role }}</b></h0><br>
                              <h0>Talent fee: <b>P{{ $details->talentFee }}.00</b></h0><br>
                              <h0>Where: <b>{{ $details->address }}, {{ $details->location }}</b></h0><br><br>
                         <!-- Accept or Reject Job Post -->
                                <form class="text-center" action="/model/accept" method="post">
                                  {{ csrf_field() }}
                                    <input type="hidden" name="hireID" id="hireID" value="{{$details->hireID}}" readonly>
                                    <input type="hidden" name="emailAddress" id="emailAddress" value="{{$details->emailAddress}}" readonly>
                                    @if($details->hirestatus == '0')
                                    <button type="submit" name="button" class="btn btn-success btn-round">Accept</button>
                                    <button type="" name="button" class="btn btn-maroon btn-round">Reject</button>
                                    @elseif($details->hirestatus == '1')
                                    <button type="submit" name="button" class="btn btn-success btn-round" disabled>Accept</button>
                                    <button type="" name="button" class="btn btn-maroon btn-round">Reject</button>
                                    @else
                                    @endif
                                </form>
                            </div>
                            <div class="col-sm-4">
                                <div style="position:absolute; top:50%; height:10em; margin-top:-5em;">
                                  <h5 class="card-title">Not satisfied with the talent fee?</h5>
                                    <h5 class="card-title">Make an offer</h5>
                                    <div class="input-group input-sm">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                            </span>
                                        </div>
                                        <form class="text-center" action="/model/haggle" method="post">
                                          {{ csrf_field() }}
                                          @if($details->haggleStatus == '1')
                                          
                                            <input type="hidden" name="hireID" id="hireID" value="{{$details->hireID}}" readonly>
                                            <input type="text" class="form-control" id="haggleAmount" value="{{$details->haggleAmount}}" name="haggleAmount" readonly>
                                        </div>
                                        <button type="submit" name="button" class="btn btn-info btn-round" disabled>Haggle</button>
                                          
                                          @else
                                        
                                          <input type="hidden" name="hireID" id="hireID" value="{{$details->hireID}}" readonly>
                                        <input type="text" class="form-control" id="haggleAmount" value="{{$details->haggleAmount}}" name="haggleAmount" required>
                                    </div>
                                    <button type="submit" name="button" class="btn btn-info btn-round">Haggle</button>
                                        
                                        @endif
                                        
                                  </form>
                                </div>
                            </div>
                            </div>
                          </div>
                          <div class="card-footer text-muted mb-2 text-center">
                              {{ $details->created_at }}
                          </div>
                    </div>

                    
                </div><!-- col-sm-6 closing tag -->

                @endforeach

        <!-- Right Column contents -->

            <div class="col-sm-3">
                <div class="column">



            <div class="col-sm-1"><!--space-->
            </div>

          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->


            </div>
    </div>

@endsection
</div>
