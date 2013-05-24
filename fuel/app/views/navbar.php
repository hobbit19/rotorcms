<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="brand" href="/">RotorCMS</a>
			<div class="nav-collapse collapse">
                <? \Lang::load('nav'); ?>
				<?=\Request::forge('base/navlinks')->execute()?>
				<?if ($current_user):?>
				<ul class="nav pull-right">
					<li class="dropdown">
						<?=Html::anchor('users/'.$current_user->id, $current_user->username.' <b class="caret"></b>', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'))?>

						<ul class="dropdown-menu">
							<?if ($current_user->hasAccess('admin')):?>
							<li><?=Html::anchor('admin', __('nav.admin'))?></li>
							<?endif?>
							<li><?=Html::anchor('account', __('nav.settings'))?></li>
							<li class="divider"></li>
							<li><?=Html::anchor('logout', __('nav.exit'), array('onclick' => "return confirm('".__('nav.confirm')."')"))?></li>
						</ul>
					</li>
				</ul>
				<?else:?>
				<ul class="nav pull-right">
					<li><?=Html::anchor('login', __('nav.login'))?></li>
					<li><?=Html::anchor('register', __('nav.register'))?></li>
				</ul>
				<?endif?>

			</div>
		</div>
	</div>
</div>
