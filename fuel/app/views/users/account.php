<?=\Form::open(array('class' => 'form-horizontal'))?>

	<fieldset>
	 	<legend>Настройки</legend>
		<div class="control-group">
			<?=\Form::label('Логин', 'username', array('class' => 'control-label'))?>
			<div class="controls">
				<?=\Form::input('username', $user->username, array('required' => 'required'))?>
			</div>
		</div>

		<div class="control-group">
			<?=\Form::label('Email', 'email', array('class' => 'control-label'))?>
			<div class="controls">
				<?=\Form::input('email', $user->email, array('required' => 'required'))?>
			</div>
		</div>

		<div class="control-group">
			<?=\Form::label('Текущий пароль', 'password', array('class' => 'control-label'))?>
			<div class="controls">
				<?=\Form::input('password', null, array('required' => 'required'))?>
			</div>
		</div>

		<div class="form-actions">
			<?=\Form::button('submit', 'Изменить данные', array('class' => 'btn btn-primary'))?>
		</div>

	</fieldset>
<?=\Form::close()?>
