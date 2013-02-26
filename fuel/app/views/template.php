<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php echo Asset::css(array('bootstrap.min.css', 'bootstrap-responsive.min.css', 'app.css')); ?>
	<?php echo Asset::js(array('jquery-1.9.1.min.js', 'bootstrap.min.js')); ?>
</head>
<body class="preview" id="top" data-spy="scroll" data-target=".subnav" data-offset="80">

	<div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                	<span class="icon-bar"></span>
            	 	<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          		</button>
                <a class="brand" href="/">RotorCMS</a>
                <div class="nav-collapse collapse">
                    <ul class="nav">
                        <li class="active"><a href="#about">About</a></li>
                        <li><a href="#projects">Projects</a></li>
                        <li><a href="#photos">Photos</a></li>
                        <li><a href="#contact">Contacts</a></li>
                    </ul>

					<?if ($current_user):?>
					<ul class="nav pull-right">

						<li class="dropdown">
							<?=Html::anchor('users/view/'.$current_user->id, $current_user->username.' <b class="caret"></b>', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'))?>

							<ul class="dropdown-menu">
								<li><?=Html::anchor('users/logout', 'Log out')?></li>
							</ul>
						</li>

					</ul>
					<?else:?>
					<ul class="nav pull-right">
						<li><?=Html::anchor('users/login', 'Log in')?></li>
						<li><?=Html::anchor('users/register', 'Sign in')?></li>
					</ul>
					<?endif?>

                </div>
            </div>
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
