<div class="span4">
	<h4>Последниe пользователи</h4>

<?if ($users):?>
<?foreach ($users as $user):?>
	<div>
		<?=Html::img('http://www.gravatar.com/avatar/'.md5($user->email).'?size=32&amp;d=mm', array('alt' => $user->username))?>
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
	<h4>Последниe темы</h4>

	<p>No themes</p>
</div>

