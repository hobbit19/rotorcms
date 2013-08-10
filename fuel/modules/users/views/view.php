<?=\Html::img('http://www.gravatar.com/avatar/'.md5($user->email).'?size=100&amp;d=mm', array('alt' => 'avatar', 'class' => 'img-polaroid pull-right'))?>

<?if (empty($user->activated)):?>
	<span class="label label-important"><?=__('view.not_activated')?></span>
<?endif?>

<p><?=__('view.email')?>: <?=$user->email?></p>
<p><?=__('view.created_at')?>: <?=\Date::forge(strtotime($user->created_at))?></p>

<?if (!empty($user->last_login)):?>
	<p><?=__('view.last_login')?>: <?=\Date::forge(strtotime($user->last_login))?></p>
<?endif?>

<?if (count($groups) > 0):?>
	<p><?=__('view.groups')?>:</p>
	<ul>
	<?foreach($groups as $group):?>
		<li><?=$group->name?></li>
	<?endforeach?>
	</ul>
<?endif?>
