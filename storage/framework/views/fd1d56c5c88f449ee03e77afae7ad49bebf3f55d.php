<title><?php echo $__env->yieldContent('pageTitle'); ?> Log into Stella </title>

<?php $__env->startSection('content'); ?>

<body class="login-page sidebar-collapse">
  <!-- Navigation bar hehe -->
  <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
    <div class="container">
    <div class="col-lg-1">
    </div>
    <div class="col-lg-11">
      <div class="navbar-translate">
        <img src="<?php echo asset('img/stella icon logo.png')?>" width="40">
        <a class="navbar-brand" href="" rel="tooltip" title="Welcome back!" data-placement="bottom">
          Log In
        </a>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->

  <!-- Login Form -->
  <div class="page-header clear-filter" filter-color="orange">
    <div class="page-header-image" data-parallax="true" style="background-image:url('<?php echo asset('img/header.jpg')?>"></div>
      <div class="container">
      <br><br>
        <div class="col-md-4 ml-auto mr-auto">
          <div class="card card-login card-plain">
            <form class="form" method="POST" action="<?php echo e(url('/loginUser')); ?>">
                <?php echo e(csrf_field()); ?>

              <div class="card-header text-center">
                <div style="width: 250px;" class="logo-container">
                  <img src="<?php echo asset('img/logo_white.png')?>" width="500">
                </div>
              </div>
              <div class="card-body">
                    <?php if(\Session::has('failure')): ?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo \Session::get('failure'); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(\Session::has('activate')): ?>
                        <div class="alert alert-info" role="alert">
                        <?php echo \Session::get('activate'); ?>

                        </div>
                    <?php endif; ?>

		    <?php if(\Session::has('success')): ?>
                        <div class="alert alert-success" role="alert">
                        <?php echo \Session::get('success'); ?>

                        </div>
                    <?php endif; ?>

                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons users_circle-08"></i>
                    </span>
                  </div>
                  <input style="border-top-right-radius: 30px; border-bottom-right-radius: 30px;" type="text" name="emailAddress" id="emailAddress" class="form-control" placeholder="E-Mail Address">
                </div>
                <div class="input-group no-border input-lg">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="now-ui-icons text_caps-small"></i>
                    </span>
                  </div>
                  <input style="border-top-right-radius: 30px; border-bottom-right-radius: 30px;" type="password" name="password" placeholder="Password" class="form-control" />
                </div>
              </div>
              <div class="card-footer text-center">
                <button type="submit" name="button" class="btn btn-maroon btn-round btn-lg btn-block">Log In</button>
                <div class="pull-left">
                  <h6>
                    <a href="<?php echo e(url('/')); ?>" class="link">Not yet registered?</a>
                  </h6>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>
<?php $__env->stopSection(); ?>
</div>

<?php echo $__env->make('layouts.homeapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>