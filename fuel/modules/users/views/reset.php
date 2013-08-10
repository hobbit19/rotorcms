<?=\Form::open(array('class' => 'form-horizontal'))?>

	<fieldset>
		<legend><?php __('reset.enter') ?></legend>

		<div class="control-group">
			<?=\Form::label(__('reset.email'), 'email', array('class' => 'control-label'))?>
			<div class="controls">
				<div class="input-append">
					<?=\Form::input('email', \Input::post('email'), array('required' => 'required', 'type' => 'email'))?>
					<span class="add-on"><i class="icon-envelope"></i></span>
				</div>
			</div>
		</div>

		<div class="form-actions">
			<?=\Form::button('submit', __('reset.submit'), array('class' => 'btn btn-primary'))?>
		</div>
	</fieldset>
<?=\Form::close()?>
