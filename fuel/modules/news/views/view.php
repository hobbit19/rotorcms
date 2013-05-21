<div class="media">
	<span class="muted"><small><?=\Date::forge($news->created_at)?></small></span>
	<h4 class="media-heading"><?=\Html::anchor('news/view/'.$news->id, $news->title)?></h4>
	<p>
		<?=$news->text?>
	</p>
	<?=\Html::anchor('users/'.$news->user->id, '<i class="icon-user"></i> '.$news->user->username, array("rel" => "tooltip", "title" => __('view.author')))?>
</div>


<h3 class="muted"><i class="icon-comment"></i> <?=__('view.comments')?> <small>(<?=count($news->comments)?>)</small></h3>
<? foreach ($news->comments as $comment): ?>

	<div class="media">
		<?=\Html::anchor('users/'.$comment->user->id, \Html::img('http://www.gravatar.com/avatar/'.md5($comment->user->email).'?size=48&amp;d=mm', array('alt' => 'avatar')), array('class' => 'pull-left'))?>

		<div class="media-body">
			<span class="pull-right muted"><small><?=\Date::forge($comment->created_at)?></small></span>
			<h4 class="media-heading"><?=\Html::anchor('users/'.$comment->user->id, $comment->user->username)?></h4>

			<?=$comment->text?>

		</div>
	</div>
	<hr />

<? endforeach ?>
