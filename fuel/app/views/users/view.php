<?=\Html::img('http://www.gravatar.com/avatar/'.md5($user->email).'?size=100&amp;d=mm', array('alt' => 'avatar', 'class' => 'img-polaroid pull-right'))?>

<p>Email: <?=$user->email?></p>
<p>Date created: <?=\Date::forge(strtotime($user->created_at))?></p>
<p>Last login: <?=\Date::forge(strtotime($user->last_login))?></p>

<?if (count($groups) > 0):?>
	<p>Состоит в группах:</p>
	<ul>
	<?foreach($groups as $group):?>
		<li><?=$group->name?></li>
	<?endforeach?>
	</ul>
<?endif?>
