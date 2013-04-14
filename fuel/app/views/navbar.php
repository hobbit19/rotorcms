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

				<?=\Request::forge('base/navlinks')->execute()?>

				<?if ($current_user):?>
				<ul class="nav pull-right">
					<li class="dropdown">
						<?=Html::anchor('users/'.$current_user->id, $current_user->username.' <b class="caret"></b>', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'))?>

						<ul class="dropdown-menu">
							<?if ($current_user->hasAccess('admin')):?>
							<li><?=Html::anchor('admin', 'Admin Panel')?></li>
							<?endif?>
							<li><?=Html::anchor('profile', 'Profile')?></li>
							<li class="divider"></li>
							<li><?=Html::anchor('logout', 'Log out', array('onclick' => "return confirm('Are you sure?')"))?></li>
						</ul>
					</li>
				</ul>
				<?else:?>
				<ul class="nav pull-right">
					<li><?=Html::anchor('login', 'Sign in')?></li>
					<li><?=Html::anchor('register', 'Sign up')?></li>
				</ul>
				<?endif?>

			</div>
		</div>
	</div>
</div>
