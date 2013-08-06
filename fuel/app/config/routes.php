<?php
return array(
	'_root_'   => 'guestbook/index',
	'_404_'    => 'error/404',
	'login'    => 'users/login',
	'register' => 'users/register',
	'logout'   => 'users/logout',
	'reset'    => 'users/reset',
	'account'  => 'users/account',

	//'admin/(:segment)'                      => '$1/admin/$1',
	//'admin/(:segment)/(:any)'               => '$1/admin/$1/$2',
	//'admin/(:segment)/(:any)/(:any)'        => '$1/admin/$1/$2/$3',
	//'admin/(:segment)/(:any)/(:any)/(:any)' => '$1/admin/$1/$2/$3/$4',

	'users/(:num)' => array(array('GET', new Route('users/view/$1'))),
);
