<?=\Html::img('http://www.gravatar.com/avatar/'.md5($user->email).'?size=100&amp;d=mm', array('alt' => 'avatar', 'class' => 'img-polaroid pull-right'))?>

<p>ID: <?=$user->get_id()?></p>
<p>Email: <?=$user->email?></p>
<p>Date created: <?=mb_convert_encoding(\Date::forge($user->created_at), 'utf-8', 'windows-1251')?></p>
<p>Last login: <?=mb_convert_encoding(\Date::forge($user->last_login), 'utf-8', 'windows-1251')?></p>
<p>Group: <?=\Auth::group()->get_name($user->group)?></p>
