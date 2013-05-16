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
                <? \Lang::load('nav'); ?>
				<?=\Request::forge('base/navlinks')->execute()?>
				<?if ($current_user):?>
				<ul class="nav pull-right">
					<li class="dropdown">
						<?=Html::anchor('users/'.$current_user->id, $current_user->username.' <b class="caret"></b>', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'))?>

						<ul class="dropdown-menu">
							<?if ($current_user->hasAccess('admin')):?>
							<li><?=Html::anchor('admin', __('other.admin'))?></li>
							<?endif?>
							<li><?=Html::anchor('account', __('other.settings'))?></li>
							<li class="divider"></li>
							<li><?=Html::anchor('logout', __('other.exit'), array('onclick' => "return confirm('Are you sure?')"))?></li>
						</ul>
					</li>
				</ul>
				<?else:?>
				<ul class="nav pull-right">
					<li><?=Html::anchor('login', __('other.login'))?></li>
					<li><?=Html::anchor('register', __('other.register'))?></li>
				</ul>
				<?endif?>

			</div>
		</div>
	</div>
</div>
