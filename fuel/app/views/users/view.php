<?=\Html::img('http://www.gravatar.com/avatar/'.md5($user->email).'?size=100&amp;d=mm', array('alt' => 'avatar', 'class' => 'img-polaroid pull-right'))?>

<p>ID: <?=$user->get_id()?></p>
<p>Email: <?=$user->email?></p>
<p>Date created: <?=\Date::forge($user->created_at)?></p>
<p>Last login: <?=\Date::forge($user->last_login)?></p>
<p>Group: <?=\Auth::group()->get_name($user->group)?></p>
