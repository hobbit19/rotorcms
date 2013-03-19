<?php
return array(
	'_root_'  => 'users/index',  // The default route
	'_404_'   => 'welcome/404',    // The main 404 route

	'users/(:num)' => array(array('GET', new Route('users/view/$1'))),
	'hello(/:name)?' => array('welcome/hello', 'name' => 'hello'),
);
