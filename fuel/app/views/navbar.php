<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="/">RotorCMS</a>
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
		</div>
		<div class="navbar-collapse collapse">
			<? \Lang::load('nav'); ?>
			<?=\Request::forge('base/navlinks')->execute()?>
			<?if ($current_user):?>
			<ul class="nav navbar-nav navbar-right">
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
			<ul class="nav navbar-nav navbar-right">
				<li><?=Html::anchor('login', __('nav.login'))?></li>
				<li><?=Html::anchor('register', __('nav.register'))?></li>
			</ul>
			<?endif?>

		</div>
	</div>
</div>

<div class="modal fade" id="exit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3 class="modal-title">Exit Confirmation</h3>
      </div>
      <div class="modal-body">
        <p class="text-danger"><?=__('nav.confirm')?></p>
      </div>
      <div class="modal-footer">
      	<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		<?=Html::anchor('logout', __('nav.exit'), array('class' => "btn btn-danger"))?>
      </div>
    </div>
  </div>
</div>
