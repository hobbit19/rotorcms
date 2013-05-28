<div class="btn-toolbar">
	<button class="btn btn-primary">New User</button>
</div>

<?if ($users):?>

<table class="table">
	<thead>
		<tr>
			<th>Avatar</th>
			<th>Login</th>
			<th>Email</th>
			<th>Date registered</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>

		<?foreach ($users as $user):?>
		<tr>
			<td><?=Html::anchor('users/'.$user->id, Html::img('http://www.gravatar.com/avatar/'.md5($user->email).'?size=24&amp;d=mm', array('alt' => 'avatar')), array('class' => 'pull-left'))?></td>
			<td><?=Html::anchor('users/'.$user->id, $user->username)?></td>
			<td><?=$user->email?></td>
			<td><?=\Date::forge(strtotime($user->created_at))?></td>
			<td><span class="label label-important">Banned</span></td>
			<td>
				<a href="user.html"><i class="icon-pencil"></i></a>
				<a href="#myModal" role="button" data-toggle="modal"><i class="icon-ban-circle"></i></a>
				<a href="#myModal" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
			</td>
		</tr>
		<?endforeach?>

	</tbody>
</table>

<?=$pagination?>

<?else:?>
	<p>Нет пользователей</p>
<?endif?>

