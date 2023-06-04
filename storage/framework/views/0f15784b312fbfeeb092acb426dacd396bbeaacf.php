<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title><?php echo $__env->yieldContent('title'); ?></title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href=<?php echo e(asset("../assets/img/icon.ico")); ?> type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src=<?php echo e(asset("../assets/js/plugin/webfont/webfont.min.js")); ?>></script>
	<script>
		WebFont.load({
			google: {"families":["Open+Sans:300,400,600,700"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands"], urls: ['../assets/css/fonts.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href=<?php echo e(asset("../assets/css/bootstrap.min.css")); ?>>
	<link rel="stylesheet" href=<?php echo e(asset("../assets/css/azzara.min.css")); ?>>

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href=<?php echo e(asset("../assets/css/demo.css")); ?>>
</head>
<body>
	<div class="wrapper">
		<!-- Header -->
		<?php echo $__env->make('layout.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!-- Header -->

		<!-- Sidebar -->
		<?php echo $__env->make('layout.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		<!-- End Sidebar -->

		<div class="main-panel">
			<div class="content">
				<?php echo $__env->yieldContent('content'); ?>
			</div>
		</div>
	</div>
</div>
<!--   Core JS Files   -->
<script src=<?php echo e(asset("../assets/js/core/jquery.3.2.1.min.js")); ?>></script>
<script src=<?php echo e(asset("../assets/js/core/popper.min.js")); ?>></script>
<script src=<?php echo e(asset("../assets/js/core/bootstrap.min.js")); ?>></script>

<!-- jQuery UI -->
<script src=<?php echo e(asset("../assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js")); ?>></script>
<script src=<?php echo e(asset("../assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js")); ?>></script>

<!-- jQuery Scrollbar -->
<script src=<?php echo e(asset("../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js")); ?>></script>

<!-- Moment JS -->
<script src=<?php echo e(asset("../assets/js/plugin/moment/moment.min.js")); ?>></script>

<!-- Chart JS -->
<script src=<?php echo e(asset("../assets/js/plugin/chart.js/chart.min.js")); ?>></script>

<!-- jQuery Sparkline -->
<script src=<?php echo e(asset("../assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js")); ?>></script>

<!-- Chart Circle -->
<script src=<?php echo e(asset("../assets/js/plugin/chart-circle/circles.min.js")); ?>></script>

<!-- Datatables -->
<script src=<?php echo e(asset("../assets/js/plugin/datatables/datatables.min.js")); ?>></script>

<!-- Bootstrap Notify -->
<script src=<?php echo e(asset("../assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js")); ?>></script>

<!-- Bootstrap Toggle -->
<script src=<?php echo e(asset("../assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js")); ?>></script>

<!-- jQuery Vector Maps -->
<script src=<?php echo e(asset("../assets/js/plugin/jqvmap/jquery.vmap.min.js")); ?>></script>
<script src=<?php echo e(asset("../assets/js/plugin/jqvmap/maps/jquery.vmap.world.js")); ?>></script>

<!-- Google Maps Plugin -->
<script src=<?php echo e(asset("../assets/js/plugin/gmaps/gmaps.js")); ?>></script>

<!-- Sweet Alert -->
<script src=<?php echo e(asset("../assets/js/plugin/sweetalert/sweetalert.min.js")); ?>></script>

<!-- Azzara JS -->
<script src=<?php echo e(asset("../assets/js/ready.min.js")); ?>></script>
</body>
</html><?php /**PATH D:\XAMPP\htdocs\project\Laravel\kknsystem-app\resources\views/layout/mainLayout.blade.php ENDPATH**/ ?>