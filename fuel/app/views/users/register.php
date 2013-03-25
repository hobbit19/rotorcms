<?=Form::open(array('class' => 'form-horizontal'))?>

	<fieldset>
	 	<legend><?=__('register.registration')?></legend>
		<div class="control-group">
			<?=Form::label(__('register.username'), 'username', array('class' => 'control-label'))?>

			<div class="controls">
				<div class="input-append">
					<?=Form::input('username', Input::post('username'), array('required' => 'required'))?>
					<span class="add-on"><i class="icon-user"></i></span>
				</div>
			</div>
		</div>

		<div class="control-group">
			<?=Form::label(__('register.password'), 'password', array('class' => 'control-label'))?>

			<div class="controls">
				<div class="input-append">
					<?=Form::input('password', Input::post('password'), array('required' => 'required', 'type' => 'password'))?>
					<span class="add-on"><i class="icon-wrench"></i></span>
				</div>
			</div>
		</div>

		<div class="control-group">
			<?=Form::label(__('register.confirm_password'), 'confirm_password', array('class' => 'control-label'))?>

			<div class="controls">
				<div class="input-append">
					<?=Form::input('confirm_password', Input::post('confirm_password'), array('required' => 'required', 'type' => 'password'))?>
					<span class="add-on"><i class="icon-wrench"></i></span>
				</div>
			</div>
		</div>

		<div class="control-group">
			<?=Form::label(__('register.email'), 'email', array('class' => 'control-label'))?>

			<div class="controls">
				<div class="input-append">
					<?=Form::input('email', Input::post('email'), array('required' => 'required', 'type' => 'email'))?>
					<span class="add-on"><i class="icon-envelope"></i></span>
				</div>
			</div>
		</div>

		<?=\Captcha::forge('simplecaptcha')->html()?>

		<div class="form-actions">
			<?=Form::button('submit', __('register.create_account'), array('class' => 'btn btn-primary'))?>

		</div>
	</fieldset>
<?=Form::close()?>
