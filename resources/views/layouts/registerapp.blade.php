<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="icon" type="image/png" href="<?php echo asset('img/stella icon logo.png')?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    @yield('pageTitle')
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'
  />

  <!-- bootstrap and stylesheets -->
  <link href="<?php echo asset('https://fonts.googleapis.com/css?family=Montserrat:400,700,200')?>" rel="stylesheet" />
  <link href="<?php echo asset('https://use.fontawesome.com/releases/v5.0.6/css/all.css')?>" rel="stylesheet">
  <link href="<?php echo asset('css/bootstrap.min.css')?>" rel="stylesheet" />
  <link href="<?php echo asset('css/now-ui-kit.css?v=1.2.0')?>" rel="stylesheet" />
  <link href="<?php echo asset('demo/demo.css')?>" rel="stylesheet" />
</head> 

@yield('content')

<!-- Javascript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?php echo asset('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('https://www.google.com/recaptcha/api.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/core/jquery.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/core/popper.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/core/bootstrap.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/plugins/bootstrap-switch.js')?>"></script>
    <script src="<?php echo asset('js/plugins/nouislider.min.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('js/plugins/bootstrap-datepicker.js')?>" type="text/javascript"></script>
    <script src="<?php echo asset('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE')?>"></script>
    <script src="<?php echo asset('js/now-ui-kit.js?v=1.2.0')?>" type="text/javascript"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src='{{asset("js/bea.js")}}'></script>
    <script type="text/javascript">

      $("select[name='location']:eq(0)").on("change", function() {
          $("select[name='city']:eq(0)").find("optgroup, option").hide().filter("[label='" + this.value + "'], [label='" + this.value + "'] > *").show();
      });

    </script>
  </body>
  </html>