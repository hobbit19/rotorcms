<ul class="nav navbar-nav">
	<? foreach ($navitems as $nav): ?>
		<? if (isset($nav['access'])): ?>
			<? if (empty($current_user) || !$current_user->hasAccess($nav['access'])): ?>
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
