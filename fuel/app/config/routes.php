<?php
return array(
	'_root_'   => 'users/index',
	'_404_'    => 'welcome/404',
	'login'    => 'users/login',
	'register' => 'users/register',
	'logout'   => 'users/logout',
	'reset'    => 'users/reset',

	'users/(:num)' => array(array('GET', new Route('users/view/$1'))),
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);
