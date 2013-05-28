<div class="row-fluid">
	<div class="span12">
		<ul>
			<li><?=Html::anchor('admin/users', 'Пользователи')?> (<?=$count_users?>)</li>
		</ul>
	</div>
</div>

<div class="row-fluid">
	<div class="span4">
		<h4>Последниe пользователи</h4>

	<?if ($users):?>
	<?foreach ($users as $user):?>
		<div>
			<?=Html::img('http://www.gravatar.com/avatar/'.md5($user->email).'?size=16&amp;d=mm', array('alt' => $user->username))?>
			<?=Html::anchor('users/'.$user->id, $user->username)?>
		</div>
	<?endforeach?>

		<p>Всего пользователей: <?=$count_users?></p>
	<?else:?>
		<p>No users</p>
	<?endif?>
	</div>


	<div class="span4">
		<h4>Последниe сообщения</h4>

		<p>No messages</p>
	</div>

	<div class="span4">
		<h4>Последниe новости</h4>
	<?if ($news):?>
	<?foreach ($news as $news_item):?>
		<div>
			<i class="icon-edit"></i> <?=Html::anchor('news/view/'.$news_item->id, $news_item->title)?>
		</div>
	<?endforeach?>

		<p>Всего новостей: <?=$count_news?></p>
	<?else:?>
		<p>No themes</p>
	<?endif?>
	</div>
</div>

