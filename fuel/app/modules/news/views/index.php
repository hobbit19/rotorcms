<ul class="breadcrumb">
  <li><?=Html::anchor('/', 'Home')?> <span class="divider">/</span></li>
 <? if(Auth::member(100)): ?>
 <li><?=Html::anchor('news/create', 'Create')?> <span class="divider">/</span></li>
 <? endif;?>
 <li class="active">News</li>
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