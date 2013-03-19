<?=Form::open(array('class' => 'form-horizontal well'))?>

	<fieldset>
	 	<legend>Registration</legend>
		<div class="control-group">
			<?=Form::label('Username', 'username', array('class' => 'control-label'))?>

			<div class="controls">
				<div class="input-append">
					<?=Form::input('username', Input::post('username'), array('required' => 'required'))?>
					<span class="add-on"><i class="icon-user"></i></span>
				</div>
				<?=$val->error('username')?>
			</div>
		</div>

		<div class="control-group">
			<?=Form::label('Password', 'password', array('class' => 'control-label'))?>

			<div class="controls">
				<div class="input-append">
					<?=Form::input('password', Input::post('password'), array('required' => 'required', 'type' => 'password'))?>
					<span class="add-on"><i class="icon-wrench"></i></span>
				</div>
				<?=$val->error('password')?>
			</div>
		</div>

		<div class="control-group">
			<?=Form::label('Confirm password', 'confirm_password', array('class' => 'control-label'))?>

			<div class="controls">
				<div class="input-append">
					<?=Form::input('confirm_password', Input::post('confirm_password'), array('required' => 'required', 'type' => 'password'))?>
					<span class="add-on"><i class="icon-wrench"></i></span>
				</div>
				<?=$val->error('confirm_password')?>

			</div>
		</div>

		<div class="control-group">
			<?=Form::label('Email', 'email', array('class' => 'control-label'))?>

			<div class="controls">
				<div class="input-append">
					<?=Form::input('email', Input::post('email'), array('required' => 'required', 'type' => 'email'))?>
					<span class="add-on"><i class="icon-envelope"></i></span>
				</div>
				<?=$val->error('email')?>

			</div>
		</div>

		<div class="form-actions">
			<?=Form::button('submit', 'Create my account', array('class' => 'btn btn-primary'))?>

		</div>
	</fieldset>
<?=Form::close()?>
