<ul class="breadcrumb">
	<?foreach ($navitems as $key=>$nav):?>
		<?$divider = ( ! empty($key)) ? '<span class="divider">/</span>' : '';?>
		<?if (isset($nav['active'])):?>
			<li class="active"><?=$divider?><?=$nav['name']?></li>
		<?else:?>
			<li><?=$divider?><?=\Html::anchor($nav['link'], $nav['name'])?></li>
		<?endif;?>
	<?endforeach;?>
</ul>



<!-- 	<?if(\Auth::member(100)):?>
	<li class="pull-right"><?=\Html::anchor('news/create', 'Create')?></li>
	<?endif;?> -->
