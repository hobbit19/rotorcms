<?=Form::open(array('class' => 'form-horizontal well'))?>

	<fieldset>
	 	<legend><?=Lang::get('authorization')?></legend>
		<div class="control-group">
			<label class="control-label" for="form_username"><?=Lang::get('username_or_email')?></label>
			<div class="controls">
				<?=Form::input('username', Input::post('username'), array('required' => 'required'))?>

			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="form_password"><?=Lang::get('password')?></label>
			<div class="controls">
				<?=Form::input('password', null, array('required' => 'required', 'type' => 'password'))?>

			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<label class="checkbox">
					<?=Form::checkbox('remember', Input::post('remember', 1), true)?> <?=Lang::get('remember_me')?>
				</label>
			</div>
		</div>

		<div class="form-actions">
			<?=Form::button('submit', Lang::get('sign_in'), array('class' => 'btn btn-primary'))?>

		</div>
	</fieldset>
<?=Form::close()?>
