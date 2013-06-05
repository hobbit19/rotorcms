<?=\Form::open(array('class' => 'form-horizontal'))?>
	<fieldset>
		<legend>Редактирование пользователя</legend>

		<div class="control-group">
			<?=\Form::label('email', 'email', array('class' => 'control-label'))?>
			<div class="controls">
				<?=\Form::input('email', $user->email, array('required' => 'required'))?>
			</div>
		</div>

		<div class="control-group">
			<?=\Form::label('Новый пароль', 'password', array('class' => 'control-label'))?>
			<div class="controls">
				<?=\Form::input('password', null)?>
			</div>
		</div>

		<div class="form-actions">
			<?=\Form::button('submit', 'Сохранить', array('class' => 'btn btn-primary'))?>
		</div>


	</fieldset>
<?=\Form::close()?>
