<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('body-class', 'hd-auth-body'); ?>
<?php $__env->startSection('content'); ?>
<section class="remedy-layout-wrapper">
    <div class="container">
        <h1 class="text-center font-weight-light">Weekly <b>Billings</b></h1>
        <form>
            <div class="row mt-5">
            	<div class="col-lg-4"><h5>Agent</h5></div>
            	<div class="col-lg-4"><h5>Weekly Billings</h5></div>
            	<div class="col-lg-4"><h5>Average Close Out</h5></div>
            </div>

            <div class="row mt-3 border-top border-gray">
                <div class="col-lg-4 px-3  mt-2">
                    <img src="<?php echo e(asset('assets/images/avatar-img.png')); ?>" alt="remedy" class="col-lg-2 rounded-circle p-0">
                    <label><h5 class="pl-lg-3 pl-1">Ben</h5></label>
                </div>
            	<div class="col-lg-4 px-3 bg-2 form-group mt-2">
            		<div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control " name="" value="" autocomplete="" autofocus placeholder="">
                    </div>
            	</div>
            	<div class="col-lg-4 px-3 bg-2 form-group mt-2">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control " name="" value="" autocomplete="" autofocus placeholder="">
                    </div>
                </div>
            </div>

            <div class="row mt-3 border-top border-gray">
                <div class="col-lg-4 px-3  mt-2">
                    <img src="<?php echo e(asset('assets/images/avatar-img.png')); ?>" alt="remedy" class="col-lg-2 rounded-circle p-0">
                    <label><h5 class="pl-lg-3 pl-1">Ben</h5></label>
                </div>
                <div class="col-lg-4 px-3 bg-2 form-group mt-2">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control " name="" value="" autocomplete="" autofocus placeholder="">
                    </div>
                </div>
                <div class="col-lg-4 px-3 bg-2 form-group mt-2">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control " name="" value="" autocomplete="" autofocus placeholder="">
                    </div>
                </div>
            </div>

            <div class="row mt-3 border-top border-gray">
                <div class="col-lg-4 px-3  mt-2">
                    <img src="<?php echo e(asset('assets/images/avatar-img.png')); ?>" alt="remedy" class="col-lg-2 rounded-circle p-0">
                    <label><h5 class="pl-lg-3 pl-1">Ben</h5></label>
                </div>
                <div class="col-lg-4 px-3 bg-2 form-group mt-2">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control " name="" value="" autocomplete="" autofocus placeholder="">
                    </div>
                </div>
                <div class="col-lg-4 px-3 bg-2 form-group mt-2">
                    <div class="remedy-input-icon-wrapper">
                        <input type="text" class=" form-control " name="" value="" autocomplete="" autofocus placeholder="">
                    </div>
                </div>
            </div>

            <div class="form-btn-block">
                <button type="submit" class="remedy-login-btn">Submit <i><img src="<?php echo e(asset('assets/images/back-arrow-icon.svg')); ?>" alt="remedy"></i></button>
            </div>

        <form>
    <div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /opt/lampp/htdocs/opus8/resources/views/weekly_billing/bill_form.blade.php ENDPATH**/ ?>