<?php

namespace Fuel\Tasks;

class Create_groups
{

	public static function run()
	{
		/**
		 * create group Users
		 */
		try
		{
			$group = \Sentry::getGroupProvider()->create(array(
				'name'        => 'Users',
				'permissions' => array(
					'admin' => 1,
					'users' => 1,
				),
			));

			\Cli::write('Success! Groups Users added!');

			\Cli::beep(1);

		}
		catch (\Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
			\Cli::error('Error! Group Users already exists');
		}

		/**
		 * create group Admins
		 */
		try
		{
			$group = \Sentry::getGroupProvider()->create(array(
				'name'        => 'Admins',
				'permissions' => array(
					'admin' => 1,
					'users' => 0,
				),
			));

			\Cli::write('Success! Groups Admins added');
			\Cli::beep(1);

		}
		catch (\Cartalyst\Sentry\Groups\GroupExistsException $e)
		{
			\Cli::error('Error! Group Admins already exists');
		}
	}
}
