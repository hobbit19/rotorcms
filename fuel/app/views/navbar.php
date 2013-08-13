<div class="navbar navbar-fixed-top">
	<div class="container">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="/">RotorCMS</a>
		<div class="nav-collapse collapse" id="navbar-main">
			<? \Lang::load('nav'); ?>
			<?=\Request::forge('base/navlinks')->execute()?>
			<?if ($current_user):?>
			<ul class="nav navbar-nav pull-right">
				<li class="dropdown">
					<?=Html::anchor('users/'.$current_user->id, $current_user->username.' <b class="caret"></b>', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'))?>

					<ul class="dropdown-menu">
						<li><?=Html::anchor('account', __('nav.settings'))?></li>
						<li class="divider"></li>
						<li><?=Html::anchor('#exit', __('nav.exit'), array('data-toggle' => 'modal'))?></li>
					</ul>
				</li>
			</ul>
			<?else:?>
			<ul class="nav navbar-nav pull-right">
				<li><?=Html::anchor('login', __('nav.login'))?></li>
				<li><?=Html::anchor('register', __('nav.register'))?></li>
			</ul>
			<?endif?>

		</div>
	</div>
</div>
<!--
<div class="modal small hide fade" id="exit">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Exit Confirmation</h3>
	</div>
	<div class="modal-body">
		<p class="text-error"><?=__('nav.confirm')?></p>
	</div>
	<div class="modal-footer">
		<?=Html::anchor('', 'Cancel', array('class' => "btn"))?>
		<?=Html::anchor('logout', __('nav.exit'), array('class' => "btn btn-danger"))?>
	</div>
</div>
-->
