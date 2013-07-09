<?=\Form::open(array('class' => 'form-horizontal'))?>
	<fieldset>
		<legend><?=__('comments.enter')?></legend>

		<div class="control-group">
			<?=\Form::label(__('comments.label_text'), 'text', array('class' => 'control-label'))?>
			<div class="controls">
				<?=\Form::textarea('text', \Input::post('text'), array('class' => 'span8', 'rows' => 5))?>
			</div>
		</div>

		<div class="form-actions">
			<?=\Form::submit('submit', __('comments.submit'), array('class' => 'btn btn-primary'))?>
		</div>

	</fieldset>
<?=\Form::close()?>