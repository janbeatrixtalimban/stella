@extends('layouts.homeapp')

<title>@yield('pageTitle') Account activation </title>

@section('content')

<body class="index-page sidebar-collapse">
  <!-- Navigation bar hehe -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <img src="<?php echo asset('img/stella icon logo.png')?>" width="40">
        <a class="navbar-brand" href="" data-placement="bottom">
        </a>
      </div>
    </div>
  </nav>
  
  <!-- MAIN HOMEPAGE CONTENT -->
  <div class="wrapper">
    <div class="page-header clear-filter" style="background: -webkit-linear-gradient(90deg, rgba(102, 14, 14, 0.733), rgba(224, 23, 3, 0.6));" filter-color="red">
      <div class="page-header-image" data-parallax="true" style="">
      </div>
      <div class="container-fluid">
        <div class="content-center brand">
          <img src="<?php echo asset('img/logo_white.png')?>" width="50%">
          <h3 class="h3-seo">Thank you for registering to Stella! Your account has been activated!</h3>
            <a href="{{ url('/loginUser') }}" class="btn btn-maroon btn-round btn-lg" >Log In now!</a>
        </div>
      </div>
      @endsection
      
    </div>
  </div>