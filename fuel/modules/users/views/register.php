<?=\Form::open(array('role' => 'form', 'class' => 'well'))?>

	<fieldset>
	 	<legend><?=__('register.registration')?></legend>

		<div class="form-group">
			<?=\Form::label(__('register.username'), 'username')?>
			<?=\Form::input('username', \Input::post('username'), array('required' => 'required', 'class' => 'form-control'))?>
		</div>

		<div class="form-group">
			<?=\Form::label(__('register.email'), 'email')?>
			<?=\Form::input('email', \Input::post('email'), array('required' => 'required', 'type' => 'email', 'class' => 'form-control'))?>
		</div>

		<div class="form-group">
			<?=\Form::label(__('register.password'), 'password')?>
			<?=\Form::input('password', \Input::post('password'), array('required' => 'required', 'type' => 'password', 'class' => 'form-control'))?>
		</div>

		<div class="form-group">
			<?=\Form::label(__('register.confirm_password'), 'confirm_password')?>
			<?=\Form::input('confirm_password', \Input::post('confirm_password'), array('required' => 'required', 'type' => 'password', 'class' => 'form-control'))?>
		</div>

		<?=\Captcha::forge('simplecaptcha')->html()?>

		<?=\Form::submit('submit', __('register.create_account'), array('class' => 'btn btn-primary'))?>

	</fieldset>
<?=Form::close()?>

