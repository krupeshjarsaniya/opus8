<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('body-class', 'hd-auth-body'); ?>
<?php $__env->startSection('content'); ?>
<section class="remedy-layout-wrapper">
    <div class="container">
        <h1 class="text-center mb-5 font-weight-light">Week 41 <b>Billings</b></h1>
       
    <div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
<script src="<?php echo e(asset('assets/js/chart/chart.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/apexcharts.js')); ?>"></script>
<script src="<?php echo e(asset('assets/js/chart/vue-apexcharts.js')); ?>"></script>
<script>

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/opus8/resources/views/weekly_billing/bill_chart.blade.php ENDPATH**/ ?>