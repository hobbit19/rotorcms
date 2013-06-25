<?=\Form::open(array('class' => 'form-horizontal'))?>

	<fieldset>
	 	<legend><?= __('account.settings') ?></legend>
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

		<div class="control-group">
			<?=\Form::label(__('account.password'), 'password', array('class' => 'control-label'))?>
			<div class="controls">
				<?=\Form::input('password', null, array('required' => 'required', 'type' => 'password'))?>
			</div>
		</div>

		<div class="form-actions">
			<?=\Form::button('submit', __('account.save'), array('class' => 'btn btn-primary'))?>
		</div>

	</fieldset>
<?=\Form::close()?>
