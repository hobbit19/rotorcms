<?php
return array(
	'_root_'   => 'guestbook/index',
	'_404_'    => 'error/404',
	'login'    => 'users/login',
	'register' => 'users/register',
	'logout'   => 'users/logout',
	'reset'    => 'users/reset',

	'users/(:num)' => array(array('GET', new Route('users/view/$1'))),
);
