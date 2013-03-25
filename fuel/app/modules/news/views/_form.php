<?=\Form::open(array('class' => 'form-horizontal'))?>
	<fieldset>
		<legend>Create News</legend>

		<div class="control-group">
			<?=\Form::label('Title', 'title', array('class' => 'control-label'))?>
			<div class="controls">
				<?=\Form::input('title', \Input::post('title'))?>
			</div>
		</div>

		<div class="control-group">
			<?=\Form::label('Text', 'text', array('class' => 'control-label'))?>
			<div class="controls">
				<?=\Form::textarea('text', \Input::post('text'), array('class' => 'span8', 'rows' => 5))?>
			</div>
		</div>

		<div class="form-actions">
			<?=\Form::submit('submit', 'Create news', array('class' => 'btn btn-primary'))?>
		</div>

	</fieldset>
<?=\Form::close()?>
