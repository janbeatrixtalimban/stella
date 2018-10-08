<?php $__env->startSection('content'); ?>

    <form id="reg" method="POST" action="/login">
        <?php echo e(csrf_field()); ?>

        <?php if(\Session::has('failure')): ?>
        <div class="alert alert-danger" role="alert">
        <?php echo \Session::get('failure'); ?>

        </div>
        <?php endif; ?>
        <div class="form-group px-5">
            <label for="emailAddress">Email Address:</label>
            <input type="email" class="form-control" id="emailAddress" name="emailAddress" placeholder="Enter email">
        </div>
        <div class="form-group px-5">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
            <button type="submit" class=" btn btn-md btn-block btn-rounded btn-primary text-uppercase my-4">Log In</button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>