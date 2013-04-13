<?=\Form::open(array('class' => 'form-horizontal'))?>

	<fieldset>
		<legend>Введите код сброса пароля</legend>

		<div class="control-group">
			<?=\Form::label('Код сброса', 'key', array('class' => 'control-label'))?>
			<div class="controls">
				<div class="input-append">
					<?=\Form::input('key', \Input::post('key'), array('required' => 'required', 'type' => 'text'))?>
					<span class="add-on"><i class="icon-ok"></i></span>
				</div>
			</div>
		</div>

		<div class="form-actions">
			<?=\Form::button('submit', 'Сбросить пароль', array('class' => 'btn btn-primary'))?>
		</div>
	</fieldset>
<?=\Form::close()?>
