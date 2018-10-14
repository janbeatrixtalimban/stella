<title><?php echo $__env->yieldContent('pageTitle'); ?> Welcome to Stella! </title>

<?php $__env->startSection('content'); ?>

<body class="index-page sidebar-collapse">
  <!-- Navigation bar hehe -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
      <div class="navbar-translate">
        <img src="<?php echo asset('img/stella icon logo.png')?>" width="40">
        <a class="navbar-brand" href="" rel="tooltip" title="Register now with Stella!" data-placement="bottom"
          target="_blank">
          Welcome
        </a>
        <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index"
          aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-bar top-bar"></span>
          <span class="navbar-toggler-bar middle-bar"></span>
          <span class="navbar-toggler-bar bottom-bar"></span>
        </button>
      </div>
      <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="<?php echo asset('img/blurred-image-1.jpg')?>">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo e(url('/loginUser')); ?>" onclick="scrollToDownload()">  
              <i class="now-ui-icons users_single-02"></i>
              <p>Log In</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  
  <!-- MAIN HOMEPAGE CONTENT -->
  <div class="wrapper">
    <div class="page-header clear-filter" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url('<?php echo asset('img/header2.jpg')?>">
      </div>
      <div class="container-fluid">
        <div class="content-center brand">
          <img src="<?php echo asset('img/logo_white.png')?>" s>
          <h1 class="h1-seo">Start your journey</h1>
            <a href="<?php echo e(url('/register')); ?>" class="btn btn-maroon btn-round btn-lg" >I am a Model</a>
            <a href="<?php echo e(url('/registerEmployer')); ?>" class="btn btn-maroon btn-round btn-lg" >I am an Employer</a>
        </div>
      </div>
      <?php $__env->stopSection(); ?>
      
    </div>
  </div>
<?php echo $__env->make('layouts.homeapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>