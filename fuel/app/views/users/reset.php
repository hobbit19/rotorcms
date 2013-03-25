<?=\Form::open(array('class' => 'form-horizontal'))?>

	<fieldset>
		<legend>Введите email</legend>

		<div class="control-group">
			<?=\Form::label(__('register.email'), 'email', array('class' => 'control-label'))?>
			<div class="controls">
				<div class="input-append">
					<?=\Form::input('email', \Input::post('email'), array('required' => 'required', 'type' => 'email'))?>
					<span class="add-on"><i class="icon-envelope"></i></span>
				</div>
			</div>
		</div>

		<div class="form-actions">
			<?=\Form::button('submit', 'Отправить', array('class' => 'btn btn-primary'))?>
		</div>

		<?=\HTML::anchor('users/reset','Забыли Пароль?')?>
	</fieldset>
<?=\Form::close()?>
