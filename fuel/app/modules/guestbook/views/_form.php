<?=\Form::open(array('class' => 'form-horizontal'))?>

	<fieldset>
		<legend>New message</legend>
		<div class="clearfix">
			<?php echo \Form::label('Message', 'text'); ?>

			<div class="input">
				<?php echo \Form::textarea('text', \Input::post('text'), array('class' => 'span6', 'rows' => 5)); ?>

			</div>
		</div>
		<div class="actions">
			<?php echo Form::submit('submit', 'Send message', array('class' => 'btn btn-primary')); ?>

		</div>
	</fieldset>
<?=\Form::close()?>
