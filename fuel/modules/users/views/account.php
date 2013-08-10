<?=\Form::open(array('class' => 'form-horizontal'))?>

	<fieldset>
	 	<div class="tabbable">
	 		<ul class="nav nav-tabs">
          		<li class="active"><a href="#settings" data-toggle="tab"><?= __('account.settings') ?></a></li>
          		<li><a href="#change_password" data-toggle="tab"><?= __('account.change_password') ?></a></li>
        	</ul>
	 	</div>

	 	<div class="tab-content">

        	<div class="tab-pane active" id="settings">
				<div class="control-group">
					<?=\Form::label(__('account.login'), 'username', array('class' => 'control-label'))?>
					<div class="controls">
						<?=\Form::input('username', $user->username, array('required' => 'required'))?>
					</div>
				</div>

				<div class="control-group">
					<?=\Form::label(__('account.email'), 'email', array('class' => 'control-label'))?>
					<div class="controls">
						<?=\Form::input('email', $user->email, array('required' => 'required'))?>
					</div>
				</div>
			</div>

			<div class="tab-pane" id="change_password">
				<div class="control-group">
					<?=\Form::label(__('account.new_password'), 'new_password', array('class' => 'control-label'))?>
					<div class="controls">
						<?=\Form::input('new_password', null, array('type' => 'password'))?>
					</div>
				</div>
				<div class="control-group">
					<?=\Form::label(__('account.re_password'), 're_password', array('class' => 'control-label'))?>
					<div class="controls">
						<?=\Form::input('re_password', null, array('type' => 'password'))?>
					</div>
				</div>
			</div>

        	<div class="control-group">
				<?=\Form::label(__('account.old_password'), 'password', array('class' => 'control-label'))?>
				<div class="controls">
					<?=\Form::input('password', null, array('type' => 'password'))?>
				</div>
			</div>

			<div class="form-actions">
				<?=\Form::button('submit', __('account.save'), array('class' => 'btn btn-primary'))?>
			</div>
		</div>

	</fieldset>
<?=\Form::close()?>
