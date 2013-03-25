<ul class="breadcrumb">
	<li><?=\Html::anchor('/', 'Home')?> <span class="divider">/</span></li>
	<li><?=\Html::anchor('news', 'News')?> <span class="divider">/</span></li>
	<li class="active">Create</li>
</ul>
<?=render('news::_form')?>
