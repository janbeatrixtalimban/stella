@extends('layouts.employerapp')

<title>@yield('pageTitle') View Applicants </title>

@section('content')

<body class="landing-page sidebar-collapse" data-spy="scroll">
            <!-- Navigation bar -->
            <nav class="navbar navbar-expand-lg bg-black" style="width:100%;">
						<div class="container">
              
                <div class="navbar-translate">
                    <a class="navbar-brand" href="{{ url('/employerHome') }}" rel="tooltip" title="Go to Homepage" data-placement="bottom">
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
                        <a class="nav-link" href="{{ url('/employerHome') }}" data-placement="bottom" rel="tooltip" title="Go to Homepage">
                            <p>Home</p>
                        </a>
                        </li>
                        <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('/employerprofile ') }}" rel="tooltip" title="Go to profile" role="button">
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
                                <span class="d-lg-none d-md-block">   View Applicants</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">View Applicants</a>
                                <a class="dropdown-item" href="{{ url('/employerprofile') }}" style="color:black;"> 
                                <h6>{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</h6></a>
                                <a class="dropdown-item" href="{{ url('/employer/viewapplicants') }}" style="color:black;">View Applicants</a>
                                <a class="dropdown-item" href="{{ url('/employer/haggleFee') }}" style="color:black;">View Haggle Offers</a>
                                <a class="dropdown-item" href="{{ url('/subscriptionEmployer') }}" style="color:black;">Subscription</a>
                                <a class="dropdown-item" href="{{ url('/employer/forgotPassword') }}" style="color:black;">Settings</a>
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
                <div class="col-sm-2"><!--side navbar-->
                    <div class="side-navbar" style="color:black; border-right:black;">
                        <h4>View Applicants</h4>
                        <br>
                        <ul class="nav flex-column">
                          <h6>Job Post</h6><br>
                          @foreach($projects as $project)
                            <li class="nav-item">
                                <a class="nav-link" value="{{ $project->projectID }}" href="{{ $project->projectID }}">{{ $project->prjTitle }}</a>
                            </li>
                          @endforeach<br><br>
                        </ul>
                    </div>
                </div><br><br>
              
        <div class="col-sm-9">
  <!-- Job Post Applicants --> 
                    
            @foreach($details->chunk(3) as $chunk)
           
            <div class="row">
                <div class="column">
                    <table>
                        <tr>
                                      
                          @foreach ($chunk as $details)
                          @if($details->applicantStatus != 2)
                            <td>
                         
                                              
                                <h4 style="color:#1b1b1b;">{{ $details->prjTitle }}</h4>
                                    <div class="col-sm-12">
                                          <div id="model" class="card text-center">
                                                <div class="card-body" style="color:#1b1b1b;">
                                                    <h5 class="card-title">{{ $details->firstName }} {{ $details->lastName }}</h5>
                                                    <img src="/uploads/avatars/{{ $details ->avatar }}" alt="" class="img-raised" width="200" height="200"><br>
                                                <!--Buttons with icons -->

                                                    <form class="" action="/employer/accept" method="post">
                                                      {{ csrf_field() }}
                                                        <input type="hidden" name="applicantID" id="applicantID" value="{{$details->applicantID}}" readonly>
                                                        <input type="hidden" name="emailAddress" id="emailAddress" value="{{$details->emailAddress}}" readonly>
                                                        <input type="hidden" name="status" id="status" value="{{$details->applicantStatus}}" readonly>
                                                        @if($details->applicantStatus == 0)
                                                        <button type="submit" name="button" class="btn btn-success btn-round">Accept</button>
                                                        @elseif($details->applicantStatus == 1)
                                                        <button type="submit" name="button" class="btn btn-success btn-round" disabled>Accept</button>
                                                        @else
                                                        @endif
                                                       
                                                    </form>
                                                    <form class="" action="/employer/reject" method="post">
                                                        {{ csrf_field() }}
                                                          <input type="hidden" name="applicantID" id="applicantID" value="{{$details->applicantID}}" readonly>
                                                          <input type="hidden" name="emailAddress" id="emailAddress" value="{{$details->emailAddress}}" readonly>
                                                          <input type="hidden" name="status" id="status" value="{{$details->applicantStatus}}" readonly>
                                                          @if($details->applicantStatus == 0)
                                                          <button type="submit" name="button" class="btn btn-maroon btn-round">Reject</button>
                                                          @elseif($details->applicantStatus == 1)
                                                          <button type="submit" name="button" class="btn btn-maroon btn-round" disabled>Reject</button>
                                                          @else
                                                          @endif
                                                          
                                                      </form>
                                                </div>
                                                <div class="card-footer text-muted mb-2">
                                                    {{ $details->skill }}
                                                </div>
                                            </div>
                                      </div>
                            </td> 
                            @else
                            @endif
                                        
                          @endforeach

                        </tr>
                        
        @endforeach
                    </table>

                  </div>
                </div>
              </div>
            </div><!--col-sm-9 closing -->

        
        <!-- Right Column contents -->

            <div class="col-sm-1"><!--space-->
            </div>


            </div><!--feed content row closing tag -->
        </div><!-- container fluid closing tag-->


      


@endsection
</div>
