<?=Form::open(array('class' => 'form-horizontal well'))?>

	<fieldset>
	 	<legend>Registration</legend>
		<div class="control-group">
			<?=Form::label('Username', 'username', array('class' => 'control-label'))?>

			<div class="controls">
				<?=Form::input('username', Input::post('username'), array('required' => 'required'))?>
				<?=$val->error('username')?>

			</div>
		</div>

		<div class="control-group">
			<?=Form::label('Password', 'password', array('class' => 'control-label'))?>

			<div class="controls">
				<?=Form::input('password', Input::post('password'), array('required' => 'required', 'type' => 'password'))?>
				<?=$val->error('password')?>

			</div>
		</div>

		<div class="control-group">
			<?=Form::label('Confirm password', 'confirm_password', array('class' => 'control-label'))?>

			<div class="controls">
				<?=Form::input('confirm_password', Input::post('confirm_password'), array('required' => 'required', 'type' => 'password'))?>
				<?=$val->error('confirm_password')?>

			</div>
		</div>

		<div class="control-group">
			<?=Form::label('Email', 'email', array('class' => 'control-label'))?>

			<div class="controls">
				<?=Form::input('email', Input::post('email'), array('required' => 'required', 'type' => 'email'))?>
				<?=$val->error('email')?>

			</div>
		</div>		

		<div class="form-actions">
			<?=Form::button('submit', 'Create my account', array('class' => 'btn btn-primary'))?>

		</div>
	</fieldset>
<?=Form::close()?>
