<form action="news/create">
<div class="btn-toolbar">
      <button class="btn btn-primary">New News</button>
</div>
</form>
<? if ($news): ?>
      <table class="table table-hover">
            <thead>
      	    <tr>
      		  <th>Title</th>
      		  <th>Created</th>
      		  <th>Date created</th>
      		  <th>Action</th>
      	    </tr>
            </thead>
            <tbody>

		  <? foreach ($news as $item): ?>
	    	    <tr>
	    		  <td><?= $item->title ?></td>
	    		  <td><?= Html::anchor('users/' . $item->user_id, $item->user->username) ?></td>
	    		  <td><?= \Date::forge($item->created_at) ?></td>
	    		  <td>
	    			<a href="/admin/news/edit/<?= $item->id ?>"><i class="icon-pencil"></i></a>
	    			<a href="#delete"  role="button" data-toggle="modal"><i class="icon-remove"></i></a>
	    		  </td>
	    	    </tr>
		  <? endforeach ?>

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
		<?=Html::anchor('/admin/news/delete/'.$item->id, 'Delete', array('class' => "btn btn-danger"))?>
	</div>
</div>
      <?= $pagination ?>
<? else: ?>
      Новостей нет
<? endif; ?>
