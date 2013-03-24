<ul class="breadcrumb">
  <li><?=Html::anchor('/', 'Home')?> <span class="divider">/</span></li>
  <li><?=Html::anchor('guestbook/create', 'Create')?> <span class="divider">/</span></li>
  <li class="active">Messages</li>
</ul>

<? foreach ($messages as $message): ?>
	<div class="media">
		<?=Html::anchor('users/'.$message->user->id, Html::img('http://www.gravatar.com/avatar/'.md5($message->user->email).'?size=48&amp;d=mm', array('alt' => 'avatar')), array('class' => 'pull-left'))?>

		<div class="media-body">
			<span class="pull-right muted"><small><?=mb_convert_encoding(Date::forge($message->created_at), 'utf-8', 'windows-1251')?></small></span>
			<h4 class="media-heading"><?=Html::anchor('users/'.$message->user->id, $message->user->username)?></h4>

			<?=$message->text?>

		</div>
	</div>
	<hr />
<? endforeach ?>

<?=$pagination?>
