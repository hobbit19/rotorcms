<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><?=$title?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="/assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
<?=Asset::css(array('bootstrap.min.css', 'bootstrap-responsive.min.css', 'app.css'))?>
</head>
<body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">

	<?=View::forge('navbar')?>

	<div class="container">

		<div class="row">
			<div class="span12">

				<div class="page-header">
					<h1><?=$title?></h1>
				</div>

<? if (Session::get_flash('success')): ?>
				<div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo implode('<br />', e((array) Session::get_flash('success'))); ?>
				</div>
<? endif; ?>
<? if (Session::get_flash('error')): ?>
				<div class="alert alert-error">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<?php echo implode('<br />', e((array) Session::get_flash('error'))); ?>
				</div>
<? endif; ?>
			</div>

			<div class="span12">
<?=$content?>
			</div>
		</div>
		<footer>
			<p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
			<p>
				<a href="http://visavi.net">RotorCMS</a> is released under the MIT license.<br>
				<small>Version: <?=e(Fuel::VERSION)?></small>
			</p>
		</footer>
	</div>
<?=Asset::js(array('jquery-1.9.1.min.js', 'bootstrap.min.js'))?>
</body>
</html>
