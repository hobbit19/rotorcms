<ul class="nav">
	<? foreach($navitems as $nav):?>
	<?if (isset($nav['active'])):?>
	<li class="active"><?=Html::anchor($nav['link'], $nav['name'])?></li>
	<?else:?>
	<li><?=Html::anchor($nav['link'], $nav['name'])?></li>
	<?endif?>
	<?endforeach?>
</ul>
