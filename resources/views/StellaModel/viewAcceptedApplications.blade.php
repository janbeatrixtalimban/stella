@extends('layouts.modelapp')

<title>@yield('pageTitle') View Accepted Offers </title>

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
                                <span class="d-lg-none d-md-block">   Accepted Applications</span>
                              </p>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" style="right:150px;" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-header" style="color:grey;">Accepted Applications</a>
                                <a class="dropdown-item" href="{{ url('/modelprofile') }}" style="color:black;">
                                <h6>{{ Auth::user()->firstName}} {{ Auth::user()->lastName}}</h6></a>
                                <a class="dropdown-item" href="{{ url('/model/viewJobOffers') }}" style="color:black;">View Job Offers</a>
				                <a class="dropdown-item" href="{{ url('/model/viewAcceptedApplication') }}" style="color:black;">View Accepted Applications</a>
                                <a class="dropdown-item" href="{{ url('/subscription') }}" style="color:black;">Subscription</a> 
                                <a class="dropdown-item" href="{{ url('/model/forgotPassword') }}" style="color:black;">Settings</a>
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
            </div><br><br>
  
  <div class="col-sm-8">

    <!-- Card for job offer contents -->
@if($hello != 0)
      @foreach($details->reverse() as $detail)
	
	        @if($detail->applicantStatus == 1)
              <div id="joboffer" class="card text-center">
                <div class="card-body" style="color:#1b1b1b;">
                  <div class="row">
                    <div class="col-sm-7">
                      <h3 class="card-title text-center">{{ $detail->prjTitle }}</h3>
                        <p>{{ $detail->jobDescription }}</p>

                      <!-- View more details button -->
                          <button data-toggle="modal" data-target="#details{{$detail->applicantID}}" name="button" class="btn btn-info btn-round" rel="tooltip" title="View Details"><i class="now-ui-icons design_bullet-list-67"></i></button>
                    </div><!--closing for col-sm-7-->

                          <div class="col-sm-4" style="padding-top:30px;">
                              <h5 class="text-center">Your application to {{ $detail->prjTitle }} was accepted!</h5>
                              <img src="<?php echo asset('img/check.png')?>" width="60">
                          </div>

                  </div><!-- closing for row tag -->
                </div><!--card body closing -->
                <div class="card-footer text-muted mb-2 text-center">
                    {{ $detail->updated_at->diffForHumans() }}
                </div>
      
            </div><!-- card closing tag -->
            @else
            @endif

      @endforeach
 @else 

    <div class="container-fluid">
	<div class="row">
	
	    <div class="col-lg-2"></div>
	    <div class="col-lg-8">
            	<h2 class="text-center" style='color:grey; padding-top:40%;'> No currently accepted applications</h2>
	    <div class="col-lg-2"></div>
	    </div>
	</div>
    </div>   

@endif

</div>
                 
      </div><!-- col-sm-8 closing tag -->
      

            <div class="col-sm-1"><!--space-->
            </div>

          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->


  
<!-- View Details Modal -->
    @foreach ($details as $detail)
          
        <div id="details{{$detail->applicantID}}" class="modal fade" style="padding-top: 80px;" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                              <h4><img src="{{asset('/uploads/avatars/'.$detail->avatar)}}" width="40" height="40" alt="Thumbnail Image" class="rounded-circle">    {{ $detail->prjTitle }} </h4>
                              <p>by {{ $detail->firstName }} {{ $detail->lastName }}</p><br>

                              <p><b>Details:</b></p>
                                <ul>
                                    <li>
                                      <h0>Email: <b>{{ $detail->emailAddress }}</b></h0>
                                    </li>
                                    <li>
                                      <h0>Company: <b>{{$detail->name}}</b></b></h0>
                                    </li>
                                    <li>
                                      <h0>Role: <b>{{ $detail->role }}</b></h0>
                                    </li>
                                @if($detail->haggleStatus == '101')
                                    <li>
                                      <h0>Talent fee: <b>P{{ $detail->talentFee }}.00</b></h0>
                                    </li>
                                @elseif ($detail->haggleStatus == '0')
                                    <li>
                                      <h0>Original Talent fee: <b>P{{ $detail->talentFee }}.00</b></h0>
                                    </li>
                                    <li>
                                      <h0>Haggle Offer: <a style="color:#a01919;"><b>P{{ $detail->haggleAmount }}.00</b></a></h0>
                                    </li>
                                @elseif ($detail->haggleStatus == '1')
                                    <li>
                                      <h0>Agreed Talent Fee (FINAL): <b>P{{ $detail->haggleAmount }}.00</b></h0>
                                    </li>
                                @elseif ($detail->haggleStatus == '2')
                                    <li>
                                      <h0>Original Talent fee: <b>P{{ $detail->talentFee }}.00</b></h0>
                                    </li>
                                @else
                                @endif
                                    <li>
                                      <h0>Where: <b>{{ $detail->address }}, {{ $detail->location }}</b></h0>
                                    </li>
                                </ul>

                          </div>
                          <div class="modal-footer">
                            <div class="container">
                              <button type="button" class="btn btn-maroon btn-round" data-dismiss="modal" style="float:right;">Close</button>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
	</div>
    @endforeach
<!-- End of Modal -->

            
	</div>
    </div>

@endsection
</div>

