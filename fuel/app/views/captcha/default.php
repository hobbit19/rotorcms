
<div class="controls">
	<img src="<?php echo $captcha_route; ?>" alt="Simple Captcha" height="<?php echo $captcha_height; ?>" width="<?php echo $captcha_width; ?>" />
</div>


<div class="control-group">
	<?=Form::label('Captcha', 'simplecaptcha', array('class' => 'control-label'))?>

	<div class="controls">
		<div class="input-append">
			<?=\Form::input($captcha_post_name, null, array('required' => 'required'))?>
			<span class="add-on"><i class="icon-cog"></i></span>
		</div>
	</div>
</div>
