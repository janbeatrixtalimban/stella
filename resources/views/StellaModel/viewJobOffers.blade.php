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
            @foreach($details as $detail)
                @if($detail->hirestatus != '2')
                <div id="joboffer" class="card text-center">
                        <div class="card-body" style="color:#1b1b1b;">
                        <div class="row">
                          <div class="col-sm-7">
                            <h3 class="card-title text-center">{{ $detail->prjTitle }}</h3>
                            <p>{{ $detail->jobDescription }}</p>
                         <!-- Accept or Reject Job Post -->
                        <button data-toggle="modal" data-target="#details{{$detail->userID}}" name="button" class="btn btn-info btn-round" rel="tooltip" title="View Details"><i class="now-ui-icons design_bullet-list-67"></i></button>
                        <button data-toggle="modal" data-target="#confirm{{$detail->userID}}" name="button" class="btn btn-success btn-round" rel="tooltip" title="Accept Offer"><i class="now-ui-icons ui-1_check"></i></button>
                        <button type="" name="button" class="btn btn-maroon btn-round" rel="tooltip" title="Reject Offer"><i class="now-ui-icons ui-1_simple-remove"></i></button>
                            hey
                                <form class="text-center" action="/model/accept" method="post">
                                  {{ csrf_field() }}
                                    <input type="hidden" name="hireID" id="hireID" value="{{$detail->hireID}}" readonly>
                                    <input type="hidden" name="emailAddress" id="emailAddress" value="{{$detail->emailAddress}}" readonly>
                                    @if($detail->hirestatus == '0')
                                    <button type="submit" name="button" class="btn btn-success btn-round">Accept</button>
                                    
                                    @elseif($detail->hirestatus == '1')
                                    <button type="submit" name="button" class="btn btn-success btn-round" disabled>Accept</button>
                                    {{-- <button type="" name="button" class="btn btn-maroon btn-round">Reject</button> --}}
                                    @else
                                    @endif
                                </form>
                                <form class="text-center" action="/model/reject" method="post">
                                    {{ csrf_field() }}
                                      <input type="hidden" name="hireID" id="hireID" value="{{$detail->hireID}}" readonly>
                                      <input type="hidden" name="emailAddress" id="emailAddress" value="{{$detail->emailAddress}}" readonly>
                                      @if($detail->hirestatus == '0')
                                      
                                      <button type="submit" name="button" class="btn btn-maroon btn-round">Reject</button>
                                      @elseif($detail->hirestatus == '1')
                                      <button type="submit" name="button" class="btn btn-maroon btn-round" disabled>Reject</button>
                                      @else
                                      @endif
                                  </form>
                            </div>
                            <div class="col-sm-4">
                                @if($detail->hirestatus == '0')
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
                                          @if($detail->haggleStatus == '1')
                                          
                                            <input type="hidden" name="hireID" id="hireID" value="{{$detail->hireID}}" readonly>
                                            <input type="text" class="form-control" id="haggleAmount" value="{{$detail->haggleAmount}}" name="haggleAmount" readonly>
                                        </div>
                                        <button type="submit" name="button" class="btn btn-info btn-round" disabled>Haggle</button>
                                          
                                          @else
                                        
                                          <input type="hidden" name="hireID" id="hireID" value="{{$detail->hireID}}" readonly>
                                        <input type="text" class="form-control" id="haggleAmount" value="{{$detail->haggleAmount}}" name="haggleAmount" required>
                                    </div>
                                    <button type="submit" name="button" class="btn btn-info btn-round">Haggle</button>
                                        
                                        @endif
                                        
                                  </form>
                                </div>
                            </div>
                            </div>
                            @else
                            @endif
                          </div>
                          <div class="card-footer text-muted mb-2 text-center">
                              {{ $detail->created_at->diffForHumans() }}
                          </div>
                    </div>
                    @else
                    @endif
                    
                </div><!-- col-sm-6 closing tag -->

                @endforeach

        <!-- Right Column contents -->

            <div class="col-sm-3">
                <div class="column">



            <div class="col-sm-1"><!--space-->
            </div>

          </div><!--feed content row closing tag -->
      </div><!-- container fluid closing tag-->

      @foreach ($details as $detail)
          <!-- View Details Modal -->
            <div id="details{{$detail->userID}}" class="modal fade" style="padding-top: 100px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <div class="modal-body">
                              <h4><img src="/uploads/avatars/{{ $detail->avatar }}" width="40" height="40" alt="Thumbnail Image" class="rounded-circle">    {{ $detail->prjTitle }} </h4>
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
                                    <li>
                                      <h0>Talent fee: <b>P{{ $detail->talentFee }}.00</b></h0>
                                    </li>
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
            @endforeach
      <!-- End of Modal -->

    @foreach ($details as $detail)
      <!-- Confirm Accept Offer Modal -->
      <div id="confirm{{$detail->userID}}" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Are you sure you want to accept?</h4>
                          </div>
                          <div class="modal-body">
                          </div>
                          <div class="modal-footer">
                            <div class="container">
                              <div class="col-sm-3">
                              </div>
                              <form class="text-center" action="/model/accept" method="post">
                                  {{ csrf_field() }}
                                    <input type="hidden" name="hireID" id="hireID" value="{{$detail->hireID}}" readonly>
                                    <input type="hidden" name="emailAddress" id="emailAddress" value="{{$detail->emailAddress}}" readonly>
                                    <button type="submit" name="button" class="btn btn-success btn-round">Yes</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">No</button>
                                </form>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
            @endforeach
<!-- End of Modal -->



@foreach ($details as $detail)
      <!-- Confirm Accept Offer Modal -->
          <div id="haggle{{$detail->userID}}" class="modal fade" style="padding-top: 150px;" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">

                  <!-- Modal content-->
                      <div class="modal-content" style="color:black;">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Are you sure you want to accept?</h4>
                          </div>
                          <div class="modal-body">
                          </div>
                          <div class="modal-footer">
                            <div class="container">
                              <div class="col-sm-3">
                              </div>
                              <form class="text-center" action="/model/accept" method="post">
                                  {{ csrf_field() }}
                                    <input type="hidden" name="hireID" id="hireID" value="{{$detail->hireID}}" readonly>
                                    <input type="hidden" name="emailAddress" id="emailAddress" value="{{$detail->emailAddress}}" readonly>
                                    <button type="submit" name="button" class="btn btn-success btn-round">Yes</button>
                                    <button type="button" data-dismiss="modal" class="btn btn-maroon btn-round">No</button>
                                </form>
                            </div>
                          </div>
                      </div>
                    </div>
                </div>
              </form>
            @endforeach
<!-- End of Modal -->

            </div>
    </div>

@endsection
</div>
