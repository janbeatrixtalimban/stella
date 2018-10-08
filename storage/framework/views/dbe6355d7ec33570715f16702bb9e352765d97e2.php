<?php $__env->startSection('content'); ?>
    <form class="" action="/register" method="post">
        <?php echo e(csrf_field()); ?>

        <input type="text" name="firstName" value="" placeholder="enter first name"> <br />
        <input type="text" name="lastName" value="" placeholder="enter last name">  <br />
        <input type="text" name="middleName" value="" placeholder="enter middle name"> <br />
        <input type="date" name="birthDate" value="" > <br />
        <input type="text" name="emailAddress" value="" placeholder="enter email"> <br />
        <input type="text" name="contactNo" value="" placeholder="enter number"> <br />
        <input type="text" name="location" value="" placeholder="enter location"> <br />
        <input type="text" name="company" value="" placeholder="enter company"> <br />
        <input type="text" name="aboutDescription" value="" placeholder="Describe yourself"> <br />
        <input type="password" name="password" value="" placeholder="password"> <br />
        <input type="password" name="confirmpassword" value="" placeholder="confirm password"> <br />

        <button type="submit" name="button">Register</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>