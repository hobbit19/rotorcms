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

	<div class="container-fluid">
		<div class="row-fluid">

			<div class="span12">
				<div class="page-header">
					<h1><?=$title?><?=isset($subtitle) ? ' <small>'.$subtitle.'</small>' : ''?></h1>
				</div>
				<?=View::forge('notice')?>
			</div>

		</div>
		<div class="row-fluid">

		<?if(!isset($fullpage)):?>
			<?=View::forge('sidebar')?>
		<?endif;?>

			<div class="<?=!isset($fullpage) ? 'span9' : 'span12'?>">
				<?=\Breadcrumb::create_links()?>
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
<?=Asset::js(array('jquery-2.0.0.min.js', 'bootstrap.min.js', 'app.js'))?>
</body>
</html>
