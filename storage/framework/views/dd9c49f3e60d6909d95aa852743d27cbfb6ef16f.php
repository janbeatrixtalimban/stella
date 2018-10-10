<title><?php echo $__env->yieldContent('pageTitle'); ?> Stella Admin </title>


<?php $__env->startSection('content'); ?>

<body class="landing-page sidebar-collapse" data-spy="scroll">

    <?php if(count($details) > 0): ?>
                    <div class="panel panel-default">
                        <div class="panel-heading m-3 text-center">
                            <h3>Employer</h3>
                        </div>

                        <div class="panel-body table-responsive">
                            <table class="table table-hover table-striped task-table">

                                <!-- Table Headings -->
                                <thead>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Company</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th>Date Registered</th>
                                    
                                    <th></th>
                                    <th></th>
                                </thead>

                                <!-- Table Body -->
                                <tbody>
                                    <?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                           
                                            <td class="table-text">
                                                <div><?php echo e($details->firstName); ?></div>
                                            </td>
                                            
                                            <td class="table-text">
                                                <div><?php echo e($details->lastName); ?></div>
                                            </td>
                                            <td class="table-text">
                                                <div><?php echo e($details->emailAddress); ?></div>
                                            </td>
                                            <td class="table-text">
                                                    <div><?php echo e($details->name); ?></div>
                                                </td>
                                                <td class="table-text">
                                                        <div><?php echo e($details->position); ?></div>
                                                    </td>
                                            <td class="table-text">
                                                <div><?php echo e($details->status); ?></div>
                                            </td>
                                            <td class="table-text">
                                                <div><?php echo e($details->created_at); ?></div>
                                            </td>
                                            <td><a href="#">View</a></td>
                                           
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                      
                    </div>
            
               <?php endif; ?>

</body>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.registerapp', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>