<? foreach ($text as $news): ?>

	<div class="media">
		<span class="pull-right muted"><small><?=\Date::forge($news->created_at)?></small></span>
		<h4 class="media-heading"><?=\Html::anchor('news/view/'.$news->id, $news->title)?></h4>
		<p>
			<?=$news->text?>
		</p>
		<?=\Html::anchor('users/'.$news->user->id, '<i class="icon-user"></i> '.$news->user->username, array("rel" => "tooltip", "title" => __('index.author')))?> /

		<?=\Html::anchor('news/view/'.$news->id.'#comments', '<i class="icon-comment"></i> '.__('index.comments'), array("rel" => "tooltip", "title" => __('index.comments')))?>

	</div>
	<hr />

<? endforeach ?>

<?=$pagination?>

<? if (\Sentry::check() && \Sentry::getUser()->hasAccess('admin')): ?>
	<?= Html::anchor('news/create', '<i class="icon-edit"></i> '.__('index.create_news')) ?>
<? endif ?>
