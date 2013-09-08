<img src="<?=$captcha_route;?>" alt="Simple Captcha" height="<?=$captcha_height;?>" width="<?=$captcha_width;?>" />

<div class="form-group">
	<?=\Form::label(__('register.captcha_key'), 'simplecaptcha')?>
	<?=\Form::input($captcha_post_name, null, array('required' => 'required', 'class' => 'form-control'))?>
</div>
