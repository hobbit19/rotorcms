<?=\Form::open(array('class' => 'form-horizontal'))?>
	<fieldset>
		<legend><?= __('create.new_message') ?></legend>

		<div class="control-group">
			<?=\Form::label(__('create.message'), 'text', array('class' => 'control-label'))?>
			<div class="controls">
				<?=\Form::textarea('text', \Input::post('text'), array('class' => 'span8', 'rows' => 5))?>
			</div>
		</div>

		<div class="form-actions">
			<?=\Form::submit('submit', __('create.submit'), array('class' => 'btn btn-primary'))?>
		</div>

	</fieldset>
<?=\Form::close()?>
