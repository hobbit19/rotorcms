<?php
return array(
	'_root_'   => 'guestbook/index',
	'_404_'    => 'error/404',
	'login'    => 'users/login',
	'register' => 'users/register',
	'logout'   => 'users/logout',
	'reset'    => 'users/reset',
	'account'  => 'users/account',

	'admin/(:segment)' => '$1/admin',
	'admin/(:segment)/(:any)' => '$1/admin/$2',
	'users/(:num)' => array(array('GET', new Route('users/view/$1'))),
);
