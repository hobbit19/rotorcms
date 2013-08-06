<?php

namespace Fuel\Tasks;

class Create_admin
{

	public static function run($username = null)
	{
		/**
		 * Add user to admin group
		 */
		try
		{
			// Find the user using the user id
			\Cartalyst\Sentry\Users\Eloquent\User::setLoginAttributeName('username');
			$user = \Sentry::getUserProvider()->findByLogin($username);

			// Find the group using the group id
			$adminGroup = \Sentry::getGroupProvider()->findByName('Admins');

			// Assign the group to the user
			if ($user->addGroup($adminGroup))
			{
				\Cli::write('The Group has successfully assigned to the user '.$username);
				\Cli::beep(1);
			}
			else
			{
				\Cli::error('Error! Group was not assigned!');
			}
		}
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			\Cli::error('Error! User was not found!');
		}
		catch (\Cartalyst\Sentry\Groups\GroupNotFoundException $e)
		{
			\Cli::error('Error! Group was not found!');
		}
	}
}
