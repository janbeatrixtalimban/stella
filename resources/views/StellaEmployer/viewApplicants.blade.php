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
                        <img src="{{asset('/uploads/avatars/'.Auth::user()->avatar)}}" width="25" height="25" alt="Thumbnail Image" class="rounded-circle img-raised">
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
                        <h4 class="text-center">&nbsp;&nbsp;View Applicants</h4>
                        <br>
			            <ul class="nav flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/employer/viewapplicants') }}">View Applicants</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/employer/viewaccepted') }}" style="padding-left:40px;">&nbsp;&#x21AA;&nbsp;View Accepted Models</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/employer/viewhired') }}">View Hired Models</a>
                            </li><br><br>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-1"><!--space-->
                </div><br><br>
              
            @if($hello != 0)
                @foreach($details->chunk(2) as $chunk)
		        <div class="row">
                    <div class="col-sm-12">
                                   
                    @foreach ($chunk as $detail) 
                    <div class="column">
                        @if($detail->applicantStatus == 0)
                        <!-- lagay dito -->
                            @if($detail->applicantStatus == 0)              
                                <h5 style="color:#1b1b1b;" rel="tooltip" title="Pending.">{{ $detail->prjTitle }}</h5>
                            @elseif($detail->applicantStatus == 1)
                                <h5 style="color:green;" rel="tooltip" title="Hired.">{{ $detail->prjTitle }}</h5>
                            @else
                            @endif
                        
                            <div class="col-md-12 col-sm-12 col-md-12" style="width:100%;">
                                <div id="model" class="card text-center">
                                    <div class="card-body" style="color:#1b1b1b;" style="width:100%;">
                                        <h5 class="card-title">{{ $detail->firstName }} {{ $detail->lastName }}</h5>
                                            <img src="{{asset('/uploads/avatars/'.$detail->avatar)}}" alt="" class="img-raised" width="200" height="200"><br>

                            <!--Accept button modal trigger with icon -->
                                    @if($detail->applicantStatus == 0)
                                        <button data-toggle="modal" data-target="#accept{{ $detail->applicantID}}" type="submit" name="button" class="btn btn-success btn-round" rel="tooltip" title="Accept"><i class="now-ui-icons ui-1_check"></i></button>
                                    @elseif($detail->applicantStatus == 1)
                                        <button data-toggle="modal" data-target="#accept{{ $detail->applicantID}}" type="submit" name="button" class="btn btn-success btn-round" rel="tooltip" title="Already Hired." disabled><i class="now-ui-icons ui-1_check"></i></button>
                                    @else
                                    @endif
                            <!--Accept button modal trigger with icon -->
                                    @if($detail->applicantStatus == 0)
                                        <button data-toggle="modal" data-target="#reject{{ $detail->applicantID}}" type="submit" name="button" class="btn btn-maroon btn-round" rel="tooltip" title="Reject"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                                    @elseif($detail->applicantStatus == 2)
                                        <button data-toggle="modal" data-target="#reject{{ $detail->applicantID}}" type="submit" name="button" class="btn btn-maroon btn-round" disabled><i class="now-ui-icons ui-1_simple-remove"></i></button>
                                    @else
                                    @endif
                                    </div>
                                    <div class="card-footer text-muted mb-2">
                                        {{ $detail->skill }}
                                    </div>
                                </div>
                            </div>
                        
                        @else
                        @endif
                    </div>               
                    @endforeach
                    </div>
                </div>
                @endforeach
           
            @elseif($hello == 0)
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3"></div>
                            <div class="col-lg-9">
                                <h2 class="text-center" style='color:grey;'> No current applicants to show</h2>
                            </div>
                    </div>
                </div>
            @else
            @endif
            </div>
        </div>
	</div>

<!-- Accept Confirmation Modal --> 
    @foreach ($details as $detail)
            <div id="accept{{$detail->applicantID}}" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            @if($detail->applicantStatus == 0)
                            <h4>Are you sure your want to hire {{$detail->firstName}} {{$detail->lastName}} to <a style="color:#a01919;">{{$detail->prjTitle}}</a>?</h4>
                            @elseif($detail->applicantStatus == 1)
                            <h4>You have already hired <b>{{$detail->firstName}} {{$detail->lastName}}</b> to <a style="color:#a01919;">{{$detail->prjTitle}}</a> project.
                            </h4>
                            @else
                            @endif
                        </div>
                          <div class="modal-footer text-center">
                          <div class="container">
                              <div class="col-sm-2">
                              </div>
                              <form class="" action="{{ url('/employer/accept') }}" method="post">
                                {{ csrf_field() }}
                                    <input type="hidden" name="applicantID" id="applicantID" value="{{$detail->applicantID}}" readonly>
                                    <input type="hidden" name="emailAddress" id="emailAddress" value="{{$detail->emailAddress}}" readonly>
                                    <input type="hidden" name="status" id="status" value="{{$detail->applicantStatus}}" readonly>
                                    @if($detail->applicantStatus == 0)
                                    <button type="submit" name="button" class="btn btn-success btn-round">Yes</button>
                                    @elseif($detail->applicantStatus == 1)
                                    <button type="submit" name="button" class="btn btn-success btn-round" hidden>Yes</button>
                                    @else
                                    @endif
                                    @if($detail->applicantStatus == 0)
                                    <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">No</button> 
                                    @elseif($detail->applicantStatus == 1)
                                    <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal" style="float:right;">Dismiss</button>
                                    @else
                                    @endif                   
                                </form>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
	    </div>
            @endforeach
    <!-- End of Accept Confirmation Modal -->



    <!-- Reject Confirmation Modal -->                        
    @foreach ($details as $detail)
          <!-- Apply to job confirmation Modal -->
            <div id="reject{{$detail->applicantID}}" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                            @if($detail->applicantStatus == 0)
                            <h4>Are you sure your want to reject {{$detail->firstName}} {{$detail->lastName}}'s application to <a style="color:#a01919;">{{$detail->prjTitle}}</a>?</h4>
                            @elseif($detail->applicantStatus == 2)
                            <h4>You have rejected <b>{{$detail->firstName}} {{$detail->lastName}}</b> from joining the <a style="color:#a01919;">{{$detail->prjTitle}}</a> project.
                            </h4>
                            @else
                            @endif
                        <form class="" action="{{ url('/employer/reject') }}" method="post">
                           {{ csrf_field() }}

			    <textarea class="form-control" style="height:150px" name="rejectReason" placeholder="State your Reason.." required></textarea>
                        </div>
                          <div class="modal-footer text-center">
                          <div class="container">
                              <div class="col-sm-2">
                              </div>
                                    <input type="hidden" name="applicantID" id="applicantID" value="{{$detail->applicantID}}" readonly>
                                    <input type="hidden" name="emailAddress" id="emailAddress" value="{{$detail->emailAddress}}" readonly>
                                    <input type="hidden" name="status" id="status" value="{{$detail->applicantStatus}}" readonly>
                                    @if($detail->applicantStatus == 0)
                                    <button type="submit" name="button" class="btn btn-success btn-round">Yes</button>
                                    @elseif($detail->applicantStatus == 2)
                                    <button type="submit" name="button" class="btn btn-success btn-round" hidden>Yes</button>
                                    @else
                                    @endif
                                    @if($detail->applicantStatus == 0)
                                    <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal">No</button> 
                                    @elseif($detail->applicantStatus == 2)
                                    <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal" style="float:right;">Dismiss</button>
                                    @else
                                    @endif                   
                                </form>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
	     </div>
            @endforeach
    <!-- End of Reject Confirmation Modal -->


            </div><!--feed content row closing tag -->
        </div><!-- container fluid closing tag-->

@endsection
</div>


