<? foreach ($users as $user): ?>

	<div class="media">

		<?=Html::anchor('users/view/'.$user->id, Html::img('http://www.gravatar.com/avatar/'.md5($user->email).'?size=48&amp;d=mm', array('alt' => 'avatar')), array('class' => 'pull-left'))?>

		<div class="media-body">
			<h4 class="media-heading"><?=Html::anchor('users/view/'.$user->id, $user->username)?></h4>
   			<?=$user->email?>
		</div>

	</div>

<? endforeach ?>

<?=$pagination?>
