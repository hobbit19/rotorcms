<?=\Form::open(array('role' => 'form', 'class' => 'well'))?>

	<fieldset>
		<legend><?=__('login.authorization')?></legend>

		<div class="form-group">
			<?=\Form::label(__('login.username_or_email'), 'username')?>
			<?=\Form::input('username', \Input::post('username'), array('required' => 'required', 'class' => 'form-control'))?>
		</div>

		<div class="form-group">
			<?=\Form::label(__('login.password'), 'password')?>
			<?=\Form::input('password', \Input::post('password'), array('required' => 'required', 'type' => 'password', 'class' => 'form-control'))?>
		</div>

		<div class="checkbox">
			<label>
				<?=\Form::checkbox('remember', \Input::post('remember', 1), true)?> <?=__('login.remember_me')?>
			</label>
		</div>

		<?=\Form::submit('submit', __('login.sign_in'), array('class' => 'btn btn-primary'))?>
		<?=Html::anchor('reset', __('login.forgot'), array("class" => "pull-right text-muted"))?>
	</fieldset>
<?=\Form::close()?>
