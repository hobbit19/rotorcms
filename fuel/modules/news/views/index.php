<ul class="breadcrumb">
	<li><?=\Html::anchor('/', 'Home')?> <span class="divider">/</span></li>
	<li class="active">News</li>

	<?if(\Auth::member(100)):?>
	<li class="pull-right"><?=\Html::anchor('news/create', 'Create')?></li>
	<?endif;?>
</ul>

<? foreach ($text as $news): ?>

	<div class="media">
		<span class="pull-right muted"><small><?=\Date::forge($news->created_at)?></small></span>
		<h4 class="media-heading"><?=\Html::anchor('news/view/'.$news->id, $news->title)?></h4>
		<p>
			<?=$news->text?>
		</p>
		<?=\Html::anchor('users/'.$news->user->id, '<i class="icon-user"></i> '.$news->user->username, array("rel" => "tooltip", "title" => "Автор"))?> /

		<?=\Html::anchor('news/comment/'.$news->id, '<i class="icon-comment"></i> Комментарии', array("rel" => "tooltip", "title" => "Комментарии"))?>

	</div>
	<hr />

<? endforeach ?>

<?=$pagination?>
