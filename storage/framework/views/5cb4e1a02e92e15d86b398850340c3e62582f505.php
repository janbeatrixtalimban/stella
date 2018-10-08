<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="img/png" href="<?php echo asset('img/stella icon logo.png')?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo e(config('app.name', 'STELLA')); ?></title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'/>
        
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>" />
        <link href="<?php echo asset('http://fonts.googleapis.com/css?family=Montserat:400,700,200')?>" rel="stylesheet"/>
        <link href="<?php echo asset('http://use.fontawesome.com/releases/v.5.0.6/css/all.css')?>" rel="stylesheet"/>
        <link href="<?php echo asset('css/bootstrap.min.css')?>" rel="stylesheet"/>
        <link href="<?php echo asset('css/now-ui-kit.css?v=1.2.0')?>" rel="stylesheet"/>
        <link href="<?php echo asset('demo/demo.css')?>" rel="stylesheet"/>

        <script src='https://www.google.com/recaptcha/api.js'></script>

    </head>
        
    <?php echo $__env->yieldContent('content'); ?>

    <footer class="footer">
            <div class="container">
              <nav>
                <ul>
                  <li>
                    <a href="">
                      About Us
                    </a>
                  </li>
                </ul>
              </nav>
              <div class="copyright" id="copyright">
                &copy;
                <script>
                  document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
                </script>, Developed by Angela, Bea, and Justine
              </div>
            </div>
          </footer>
        </div>
      
      <!-- Javascript -->
        <script src="<?php echo asset('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('https://www.google.com/recaptcha/api.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('js/core/jquery.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('js/core/popper.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('public/js/bootstrap.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('js/core/bootstrap.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('js/plugins/bootstrap-switch.js')?>"></script>
        <script src="<?php echo asset('js/plugins/nouislider.min.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('js/plugins/bootstrap-datepicker.js')?>" type="text/javascript"></script>
        <script src="<?php echo asset('https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE')?>"></script>
        <script src="<?php echo asset('js/now-ui-kit.js?v=1.2.0')?>" type="text/javascript"></script>
        </body>

</html>
