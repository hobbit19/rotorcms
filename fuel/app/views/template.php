<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<?php echo Asset::css('bootstrap.css'); ?>
	<style>
		body { margin: 40px; }
	</style>
</head>
<body>

	<?if ($current_user):?>
	<p class="navbar-text pull-right">
		Loged in as <?=Html::anchor('users/view/'.$current_user->id, $current_user->username)?>
		<?=Html::anchor('users/logout', 'Log out')?>
	</p>
	<?else:?>
	<p class="navbar-text pull-right"><?=Html::anchor('users/login', 'Log in')?></p>
	<?endif?>

	<div class="container">
		<div class="row">
			<div class="span16">
				<h1><?php echo $title; ?></h1>
				<hr>
<?php if (Session::get_flash('success')): ?>
				<div class="alert-message success">
					<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('success'))); ?>
					</p>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert-message error">
					<p>
					<?php echo implode('</p><p>', e((array) Session::get_flash('error'))); ?>
					</p>
				</div>
<?php endif; ?>
			</div>
			<div class="span16">
<?php echo $content; ?>
			</div>
		</div>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>
</body>
</html>
