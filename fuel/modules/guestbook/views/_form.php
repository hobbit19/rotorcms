<?/*=\Form::open(array('class' => 'form-horizontal'))?>
	<fieldset>
		<legend><?= __('create.new_message') ?></legend>

		<div class="form-group">
			<?=\Form::label(__('create.message'), 'text', array('class' => 'col-lg-2 control-label'))?>
			<div class="col-lg-10">
				<?=\Form::textarea('text', \Input::post('text'), array('class' => 'form-control', 'rows' => 5))?>
			</div>
		</div>

		<div class="form-group">
			<div class="col-lg-offset-2 col-lg-10">
				<?=\Form::submit('submit', __('create.submit'), array('class' => 'btn btn-primary'))?>
			</div>
		</div>

	</fieldset>
<?=\Form::close()*/?>


<?=\Form::open(array('role' => 'form', 'class' => 'well'))?>
	<fieldset>
		<legend><?= __('create.new_message') ?></legend>

		<div class="form-group">
			<?=\Form::label(__('create.message'), 'text')?>
			<?=\Form::textarea('text', \Input::post('text'), array('class' => 'form-control', 'rows' => 3))?>
		</div>
		<?=\Form::submit('submit', __('create.submit'), array('class' => 'btn btn-primary'))?>
	</fieldset>
<?=\Form::close()?>
