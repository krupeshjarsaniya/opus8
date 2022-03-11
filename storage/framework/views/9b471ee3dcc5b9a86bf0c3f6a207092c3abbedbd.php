<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
	<meta property="og:image" itemprop="image primaryImageOfPage" content="<?php echo url('/'); ?>/assets/images/remedy-logo.png" />

	<link rel="icon" href="<?php echo e(asset('assets/images/remedy-logo.png')); ?>">

	<title><?php echo $__env->yieldContent('title'); ?> | <?php echo e(config('app.name')); ?></title>

	<?php echo $__env->make('include.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
</head>

<body class="<?php echo $__env->yieldContent('body-class'); ?>">
	<div class="loader_area">
		<div class="loader"></div>
		<div class="loader_text">Please Wait...</div>
	</div>

	<!-- <div id="overlay">
		<div id="text">Please wait...</div>
	</div> -->
	<?php echo $__env->make('include.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<div class="remedy-umbrella-layout">
		<?php echo $__env->yieldContent('content'); ?>
	</div>
	<?php echo $__env->make('include.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->make('include.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
	<?php echo $__env->yieldPushContent('js'); ?>
</body>

</html><?php /**PATH D:\xampp\htdocs\opus8\resources\views/layouts/app.blade.php ENDPATH**/ ?>