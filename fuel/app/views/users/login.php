<?=Form::open(array('class' => 'form-signin'))?>
	<h2 class="form-actions">Please sign in</h2>
	<input type="text" name="username" class="span3" placeholder="Username">
	<input type="password" name="password" class="span3" placeholder="Password">
	<label class="checkbox">
		<input type="checkbox" value="remember-me"> Remember me
	</label>
	<button class="btn btn-primary" type="submit">Sign in</button>
<?=Form::close()?>

