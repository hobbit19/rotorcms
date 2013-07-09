<?if (Uri::segment(1) == 'admin'):?>
	<div class="span3 well">
		<div class="sidebar-nav">
			<ul class="nav nav-list">
			  <li class="nav-header">Админ-панель</li>
			  <li><?=Html::anchor('admin/users', 'Пользователи')?></li>
			  <li><?=Html::anchor('admin/groups', 'Группы')?></li>
			  <li><?=Html::anchor('admin/news', 'Новости')?></li>
			</ul>
		</div>
	</div>
<?else:?>
	<div class="span3 well">
		<div class="sidebar-nav">
			<ul class="nav nav-list">
			  <li class="nav-header">List header</li>
			  <li class="active"><a href="#">Home</a></li>
			  <li><a href="#">Library</a></li>
			</ul>
		</div>
	</div>
<?endif;?>
