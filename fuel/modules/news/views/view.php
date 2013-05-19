<div class="media">
	<span class="pull-right muted"><small><?=\Date::forge($news->created_at)?></small></span>
	<h4 class="media-heading"><?=\Html::anchor('news/view/'.$news->id, $news->title)?></h4>
	<p>
		<?=$news->text?>
	</p>
	<?=\Html::anchor('users/'.$news->user->id, '<i class="icon-user"></i> '.$news->user->username, array("rel" => "tooltip", "title" => __('view.author')))?> /

	<?=\Html::anchor('news/comment/'.$news->id, '<i class="icon-comment"></i> '.__('view.comments'), array("rel" => "tooltip", "title" => __('view.comments')))?>

</div>
