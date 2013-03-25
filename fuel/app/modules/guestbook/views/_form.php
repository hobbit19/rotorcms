<?=\Form::open(array('class' => 'form-horizontal'))?>
	<fieldset>
		<legend>New message</legend>

		<div class="control-group">
			<?=\Form::label('Message', 'text', array('class' => 'control-label'))?>
			<div class="controls">
				<?=\Form::textarea('text', \Input::post('text'), array('class' => 'span8', 'rows' => 5))?>
			</div>
		</div>

		<div class="form-actions">
			<?=\Form::submit('submit', 'Send message', array('class' => 'btn btn-primary'))?>
		</div>

	</fieldset>
<?=\Form::close()?>
