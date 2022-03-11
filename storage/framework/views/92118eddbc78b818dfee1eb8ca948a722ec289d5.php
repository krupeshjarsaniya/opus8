<?php $__env->startSection('title', 'Agent Preview'); ?>
<?php $__env->startSection('content'); ?>
<section class="remedy-layout-wrapper">
    <div class="container">
        <p class="text-center agent-not-founds"><?php echo e($message); ?></p>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/agent-error.blade.php ENDPATH**/ ?>