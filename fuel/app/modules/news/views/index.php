<ul class="breadcrumb">
	<li><?=\Html::anchor('/', 'Home')?> <span class="divider">/</span></li>
	<li class="active">News</li>

	<?if(\Auth::member(100)):?>
	<li class="pull-right"><?=\Html::anchor('news/create', 'Create')?></li>
	<?endif;?>
</ul>

<? foreach ($text as $news): ?>
	<div class="media">
		<span class="pull-right muted"><small><?=Date::forge($news->created_at)?></small><br />
		<small><?=Html::anchor('users/'.$news->user->id, $news->user->username)?></small><br />
		<small><?=Html::anchor('news/comment/'.$news->id, 'Комментарии')?></small></span>
		<div class="nav-header"><?=$news->title ?></div><br />

			<?=$news->text?>
		</div>
	<hr />
<? endforeach ?>

<?=$pagination?>
