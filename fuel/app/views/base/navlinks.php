<ul class="nav">
	<? foreach ($navitems as $nav): ?>
		<? if (isset($nav['rights'])): ?>
			<? if (empty($current_user) || !$current_user->hasAccess($nav['rights'])): ?>
				<? continue; ?>
			<? endif; ?>
		<? endif; ?>
		<? if (isset($nav['active'])): ?>
			<li class="active"><?= Html::anchor($nav['link'], $nav['name']) ?></li>
			<? else: ?>
			<li><?= Html::anchor($nav['link'], $nav['name']) ?></li>
		<? endif ?>
	<? endforeach ?>
</ul>
