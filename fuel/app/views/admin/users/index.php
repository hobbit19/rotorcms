<div class="btn-toolbar">
	<button class="btn btn-primary">New User</button>
</div>

<?if ($users):?>

<table class="table table-hover">
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
			<td><span class="label <?=$user->label?>"><?=$user->status?></span></td>
			<td>
				<a href="/admin/users/edit/<?=$user->id?>"><i class="icon-pencil"></i></a>
				<a href="/admin/users/banned/<?=$user->id?>" role="button" data-toggle="modal"><i class="icon-ban-circle"></i></a>
				<a href="#delete" role="button" data-toggle="modal"><i class="icon-remove"></i></a>
			</td>
		</tr>
		<?endforeach?>

	</tbody>
</table>

<div class="modal small hide fade" id="delete">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3>Delete Confirmation</h3>
	</div>
	<div class="modal-body">
		<p class="text-error">Are you sure you want to delete the user?</p>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		<?=Html::anchor('/admin/users/delete/'.$user->id, 'Delete', array('class' => "btn btn-danger"))?>
	</div>
</div>

<?=$pagination?>

<?else:?>
	<p>Нет пользователей</p>
<?endif?>

