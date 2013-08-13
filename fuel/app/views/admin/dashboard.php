<div class="row">
	<div class="col-lg-4">
		<div class="panel">
			<div class="panel-heading">
				<h4 class="panel-title"><?=Html::anchor('admin/users', 'Последниe пользователи')?></h4>
			</div>
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
	</div>

	<div class="col-lg-4">
		<div class="panel">
			<div class="panel-heading">
				<h4 class="panel-title">Последниe сообщения</h4>
			</div>
			<p>No messages</p>
		</div>
	</div>

	<div class="col-lg-4">
		<div class="panel">
			<div class="panel-heading">
				<h4 class="panel-title"><?=Html::anchor('admin/news', 'Последниe новости')?></h4>
			</div>
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
</div>

