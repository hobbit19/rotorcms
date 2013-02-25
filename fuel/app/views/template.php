<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo Asset::css(array('bootstrap.min.css', 'bootstrap-responsive.min.css', 'app.css')); ?>
	<?php echo Asset::js(array('jquery-1.9.1.min.js', 'bootstrap.min.js')); ?>
</head>
<body>

	<div id="header">
		<div class="row">
			<?=Html::anchor('/', Html::img('assets/img/logo.png', array('alt' => 'logo')))?>

			<?if ($current_user):?>
			<p class="navbar-text pull-right">
				Loged in as <?=Html::anchor('users/view/'.$current_user->id, $current_user->username)?>
				(<?=Html::anchor('users/logout', 'Log out')?>)
			</p>
			<?else:?>
			<p class="navbar-text pull-right">
				<?=Html::anchor('users/login', 'Log in')?> / 
				<?=Html::anchor('users/register', 'Sign in')?>
			</p>
			<?endif?>

		</div>
	</div>

	<div class="container">



		<div class="row">
			<div class="span12">

		        <div class="page-header">
		          <h1><?php echo $title; ?></h1>
		        </div>

<?php if (Session::get_flash('success')): ?>
				<div class="alert alert-success">
					<span>
					<?php echo implode('</span><span>', e((array) Session::get_flash('success'))); ?>
					</span>
				</div>
<?php endif; ?>
<?php if (Session::get_flash('error')): ?>
				<div class="alert alert-error">
					<span>
					<?php echo implode('</span><span>', e((array) Session::get_flash('error'))); ?>
					</span>
				</div>
<?php endif; ?>
			</div>

			<div class="span12">
<?php echo $content; ?>
			</div>
		</div>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://visavi.net">RotorCMS</a> is released under the MIT license.<br>
				<small>Version: <?php echo e(Fuel::VERSION); ?></small>
			</p>
		</footer>
	</div>
</body>
</html>
