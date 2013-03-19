<?=Form::open(array('class' => 'form-horizontal well'))?>

	<fieldset>
	 	<legend><?=Lang::get('login.authorization')?></legend>
		<div class="control-group">
			<label class="control-label" for="form_username"><?=Lang::get('login.username_or_email')?></label>
			<div class="controls">
				<div class="input-append">
					<?=Form::input('username', Input::post('username'), array('required' => 'required'))?>
					<span class="add-on"><i class="icon-user"></i></span>
				</div>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="form_password"><?=Lang::get('login.password')?></label>
			<div class="controls">
				<div class="input-append">
				<?=Form::input('password', null, array('required' => 'required', 'type' => 'password'))?>
					<span class="add-on"><i class="icon-wrench"></i></span>
				</div>
			</div>
		</div>

		<div class="control-group">
			<div class="controls">
				<label class="checkbox">
					<?=Form::checkbox('remember', Input::post('remember', 1), true)?> <?=Lang::get('login.remember_me')?>
				</label>
			</div>
		</div>

		<div class="form-actions">
			<?=Form::button('submit', Lang::get('login.sign_in'), array('class' => 'btn btn-primary'))?>

		</div>
	</fieldset>
<?=Form::close()?>
