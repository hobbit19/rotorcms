<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="brand" href="/">RotorCMS</a>
			<div class="nav-collapse collapse">
				<ul class="nav">
					<li><a href="guestbook">Guestbook</a></li>
					<li class="active"><a href="#about">About</a></li>
					<li><a href="#projects">Projects</a></li>
					<li><a href="#photos">Photos</a></li>
					<li><a href="#contact">Contacts</a></li>
				</ul>

<?if ($current_user):?>
				<ul class="nav pull-right">
					<li class="dropdown">
						<?=Html::anchor('users/view/'.$current_user->id, $current_user->username.' <b class="caret"></b>', array('class' => 'dropdown-toggle', 'data-toggle' => 'dropdown'))?>

						<ul class="dropdown-menu">
							<li><?=Html::anchor('users/logout', 'Log out')?></li>
						</ul>
					</li>
				</ul>
<?else:?>
				<ul class="nav pull-right">
					<li><?=Html::anchor('users/login', 'Sign in')?></li>
					<li><?=Html::anchor('users/register', 'Sign up')?></li>
				</ul>
<?endif?>

			</div>
		</div>
	</div>
</div>
