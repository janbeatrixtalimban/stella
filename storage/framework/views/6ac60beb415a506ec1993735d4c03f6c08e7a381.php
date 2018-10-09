<!DOCTYPE html>
<html>
<head>
<title>Registration</title>
</head>
<body>

<h2>Welcome to STELLA PH</h2>
<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<p>You have registered this email to our app!
         </p>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</body>
</html>