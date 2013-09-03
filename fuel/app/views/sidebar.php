<div class="col-lg-3">

	<div class="list-group">
		<?=Html::anchor('/', 'Главная', array('class' => 'list-group-item active'))?>
		<?if (Uri::segment(1) == 'admin'):?>
			<?=Html::anchor('admin/users', 'Пользователи', array('class' => 'list-group-item'))?>
			<?=Html::anchor('admin/news', 'Новости', array('class' => 'list-group-item'))?>
			<?=Html::anchor('admin/groups', 'Группы', array('class' => 'list-group-item'))?>
		<?else:?>
			<?=Html::anchor('#', 'Ссылка 1 <span class="badge">8</span>', array('class' => 'list-group-item'))?>
			<?=Html::anchor('#', 'Ссылка 2 <span class="badge">15</span>', array('class' => 'list-group-item'))?>
		<?endif;?>
	</div>

	<div class="panel panel-default">
		<div class="panel-heading">Рекламный блок</div>
		<div class="panel-body">Текст рекламы</div>
	</div>

</div>
