<?php $__env->startSection('title', 'Login'); ?>
<?php $__env->startSection('body-class', 'hd-auth-body'); ?>
<?php $__env->startSection('content'); ?>
<section class="remedy-layout-wrapper">
    <div class="container">
        <div class="remedy-form-wrapper">
            <form method="post" id="login" class="hd-form" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
                <div class="form-group">
                    <div class="remedy-input-icon-wrapper">
                        <i><img src="<?php echo e(asset('assets/images/mail-icon.svg')); ?>" alt="remedy"></i>
                        <input id="email" type="email" class=" form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" autocomplete="email" autofocus placeholder="Enter your email">
                    </div>
                </div>
                <div class="form-group">
                    <div class="remedy-input-icon-wrapper">
                        <i><img src="<?php echo e(asset('assets/images/password-icon.svg')); ?>" alt="remedy"></i>
                        <input id="password" type="password" class=" form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" autocomplete="current-password" placeholder="Enter Password">
                    </div>
                </div>
                <div class="form-btn-block">
                    <button type="submit" class="remedy-login-btn">Sign in <i><img src="<?php echo e(asset('assets/images/back-arrow-icon.svg')); ?>" alt="remedy"></i></button>
                </div>
            </form>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/resources/views/auth/login.blade.php ENDPATH**/ ?>