<? foreach ($messages as $message): ?>

	<div class="media">

		<?=Html::anchor('users/view/'.$message->user->id, Html::img('http://www.gravatar.com/avatar/'.md5($message->user->email).'?size=48&amp;d=mm', array('alt' => 'avatar')), array('class' => 'pull-left'))?>

		<div class="media-body">
			<h4 class="media-heading"><?=Html::anchor('users/view/'.$message->user->id, $message->user->username)?></h4>
			<?=$message->text?><br />
   			<?=Date::forge($message->created_at)->format("eu_full")?>
		</div>

	</div>

<? endforeach ?>

<?=$pagination?>
