<header class="remedy-headerbar">
	<div class="container">
		<div class="row align-item-center">
			<?php if(Auth::check()): ?>
				<a href="<?php echo e(url('/agent')); ?>" class="remedy-logo-block"><img src="<?php echo e(asset('assets/images/remedy-logo.png')); ?>" alt="remedy"></a>
				<div class="text-right btn-logout">
					<a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="remedy-agent-btn">Logout</a>
					<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST">
						<?php echo csrf_field(); ?>
					</form>
				</div>
			<?php else: ?>
				<a href="<?php echo e(url('/')); ?>" class="remedy-logo-block"><img src="<?php echo e(asset('assets/images/remedy-logo.png')); ?>" alt="remedy"></a>
			<?php endif; ?>

		</div>
	</div>
</header><?php /**PATH /var/www/html/resources/views/include/header.blade.php ENDPATH**/ ?>