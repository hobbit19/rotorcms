<? if (\Session::get_flash('success')): ?>
	<div class="alert alert-success">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo implode('<br />', e((array) \Session::get_flash('success'))); ?>
	</div>
<? endif; ?>

<? if (\Session::get_flash('error')): ?>
	<div class="alert alert-error">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<?php echo implode('<br />', e((array) \Session::get_flash('error'))); ?>
	</div>
<? endif; ?>
