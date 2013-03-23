<ul class="breadcrumb">
  <li><?=Html::anchor('/', 'Home')?> <span class="divider">/</span></li>
  <li class="active">User list</li>
</ul>


<?if ($users):?>
<?foreach ($users as $user):?>

	<div class="media">

		<?=Html::anchor('users/'.$user->id, Html::img('http://www.gravatar.com/avatar/'.md5($user->email).'?size=48&amp;d=mm', array('alt' => 'avatar')), array('class' => 'pull-left'))?>

		<div class="media-body">
			<h4 class="media-heading"><?=Html::anchor('users/'.$user->id, $user->username)?></h4>
   			<?=$user->email?>
		</div>

	</div>

<?endforeach?>

<?=$pagination?>

<?else:?>
	<p>No Users</p>
<?endif?>
