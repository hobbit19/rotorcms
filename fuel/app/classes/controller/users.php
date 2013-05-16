<?php

class Controller_Users extends \Controller_Base
{

	public function before()
	{
		parent::before();
		\Lang::load('user');
	}

	/**
	 * action_index
	 */
	public function action_index()
	{
		$config = array(
			'pagination_url' => 'users/index/',
			'total_items' => Model_User::find()->count(),
			'per_page'    => 10,
			'show_first'  => true,
			'show_last'   => true,
		);

		$pagination = \Pagination::forge('users', $config);

		$users = Model_User::find()
			->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$pagination = $pagination->render();

		$this->template->title = \Lang::get('index.member_list');
		$this->template->content = \View::forge('users/index', array(
			'users' => $users, 'pagination' => $pagination
		), false);
	}

	/**
	 * action_view
	 */
	public function action_view($id = null)
	{
		is_null($id) and \Response::redirect('users');

		try
		{
			$user = \Sentry::getUserProvider()->findById($id);
			$groups = $user->getGroups();
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			\Session::set_flash('error', \Lang::get('view.not_find', array('id' => $id)));
			\Response::redirect('users');
		}

		\Breadcrumb::set($user->username);
		$this->template->title = \Lang::get('view.title', array('user' => $user->username));
		$this->template->content = \View::forge('users/view', array(
			'user' => $user,
			'groups' => $groups,
		), false);
	}

	/**
	 * action_register
	 */
	public function action_register()
	{
		\Sentry::check() and \Response::redirect('/');

		$captcha = \Captcha::forge('simplecaptcha');
		$val = Model_User::validate('register');

		if (\Input::method() == 'POST')
		{
			if ($val->run())
			{
				if ($captcha->check())
				{
					try
					{
						// Let's register a user.
						$user = Sentry::register(array(
							'username' => $val->validated('username'),
							'password' => $val->validated('password'),
							'email'    => \Str::lower($val->validated('email')),
						));

						// Let's get the activation code
						$activationCode = $user->getActivationCode();

						// Send activation code to the user so he can activate the account
						$email = \Email::forge();
						$email->from('rotorcms@visavi.net', 'rotor');
						$email->to($val->validated('email'), $val->validated('username'));
						$email->subject(\Lang::get('register.subject'));
						$email->body(\Lang::get('register.body', array('name' => $val->validated('username'), 'url' => \Uri::base(false).'users/activation/'.$activationCode)));
						$email->send();

						\Session::set_flash('success', \Lang::get('register.success'));
						\Response::redirect('users/activation');
					}
					catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
					{
						\Session::set_flash('error', \Lang::get('register.required_login'));
					}
					catch (Cartalyst\Sentry\Users\UserExistsException $e)
					{
						\Session::set_flash('error', \Lang::get('register.exists'));
					}

				}
				else
				{
					\Session::set_flash('error', \Lang::get('register.captcha'));
				}
			}
			else
			{
				\Session::set_flash('error', $val->error());
			}

		}

		$this->template->title = \Lang::get('register.title');
		$this->template->content = \View::forge('users/register');

	}

	/**
	 * action_login
	 */
	public function action_login()
	{
		\Sentry::check() and \Response::redirect('/');

		if (\Input::method() == 'POST')
		{
			try
			{
				$user = Model_User::find()
					->where('email', '=', \Input::post('username'))
					->get_one();

				$login = (isset($user)) ? $user->username : \Input::post('username');

				// Set login credentials
				$credentials = array(
					'username' => $login,
					'password' => \Input::post('password'),
				);

				// Try to authenticate the user
				$user = \Sentry::authenticate($credentials, \Input::post('remember'));

				\Session::set_flash('success', \Lang::get('login.success'));
				\Response::redirect('/');
			}

			catch (\Cartalyst\Sentry\Users\LoginRequiredException $e)
			{
				\Session::set_flash('error', \Lang::get('login.required_login'));
			}
			catch (\Cartalyst\Sentry\Users\PasswordRequiredException $e)
			{
				\Session::set_flash('error', \Lang::get('login.required_password'));
			}
			catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
				\Session::set_flash('error', \Lang::get('login.not_found'));
			}
			catch (\Cartalyst\Sentry\Users\UserNotActivatedException $e)
			{
				\Session::set_flash('error', \Lang::get('login.activated'));
			}

			// The following is only required if throttle is enabled
			catch (\Cartalyst\Sentry\Throttling\UserSuspendedException $e)
			{
				\Session::set_flash('error', \Lang::get('login.suspended'));
			}
			catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
			{
				\Session::set_flash('error', \Lang::get('login.banned'));
			}

		}

		$this->template->title = \Lang::get('login.title');
		$this->template->content = \View::forge('users/login');
	}

	/**
	 * action_logout
	 */
	public function action_logout()
	{
		\Sentry::logout();
		\Session::set_flash('success', \Lang::get('logout.exit'));
		\Response::redirect('/');
	}

		/**
	 * action_reset
	 */
	public function action_reset()
	{
		\Sentry::check() and \Response::redirect('/');

		if (\Input::method() == 'POST')
		{
			try
			{
				$user = Sentry::getUserProvider()->findByLogin(\Input::post('email'));

				$resetCode = $user->getResetPasswordCode();

				$email = \Email::forge();
				$email->from('rotorcms@visavi.net', 'rotor');
				$email->to($user->email, $user->username);
				$email->subject(\Lang::get('reset.subject'));
				$email->body(\Lang::get('reset.body'), array('name' => $user->username, 'url' => \Uri::base(false).'users/recovery/'.$resetCode));
				$email->send();

				\Session::set_flash('success', \Lang::get('reset.success'));
				\Response::redirect('/users/recovery');

			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
				\Session::set_flash('error', \Lang::get('reset.error'));
			}
		}

		$this->template->title = \Lang::get('reset.title');
		$this->template->content = \View::forge('users/reset');
	}

	/**
	 * action_recovery
	 */
	public function action_recovery($key = null)
	{
		\Sentry::check() and \Response::redirect('/');
		$key = \Input::post('key') ?: $key;

		if ( ! is_null($key))
		{
			try
			{
				$user = Sentry::getUserProvider()->findByResetPasswordCode($key);

				$new_password = \Str::random('alnum', mt_rand(8, 10));

				// Attempt to reset the user password
				if ($user->attemptResetPassword($key, $new_password))
				{
					\Session::set_flash('success', \Lang::get('recovery.success', array('password' => $new_password)));
					\Response::redirect('login');
				}
				else
				{
					\Session::set_flash('error', \Lang::get('recovery.failed'));
				}
			}
			catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
				\Session::set_flash('error', \Lang::get('recovery.invalid'));
			}
		}

		\Breadcrumb::remove(3);
		$this->template->title = \Lang::get('recovery.title');
		$this->template->content = \View::forge('users/recovery');
	}

	/**
	 * action_activation
	 */
	public function action_activation($key = null)
	{
		\Sentry::check() and \Response::redirect('/');

		$key = \Input::post('key') ?: $key;

		if ( ! is_null($key))
		{
			try
			{
				// Find the user using the user ActivationCode
				$user = \Sentry::getUserProvider()->findByActivationCode($key);

				// Attempt to activate the user
				if ($user->attemptActivation($key))
				{
					\Session::set_flash('success', \Lang::get('activation.passed'));
					\Response::redirect('/');
				}
				else
				{
					\Session::set_flash('error', \Lang::get('activation.failed'));
				}
			}
			catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
			{
				\Session::set_flash('error', \Lang::get('activation.not_found'));
			}
			catch (\Cartalyst\SEntry\Users\UserAlreadyActivatedException $e)
			{
				\Session::set_flash('error', \Lang::get('activation.activated'));
			}

		}

		\Breadcrumb::remove(3);
		$this->template->title = \Lang::get('activation.title');
		$this->template->content = \View::forge('users/activation');
	}

	/**
	 * action_account
	 */
	public function action_account()
	{
		\Sentry::check() or \Response::redirect('/');

		try
		{
			$user = \Sentry::getUser();
			$val = Model_User::validate('edit');

			if ($user->username == \Input::post('username'))
			{
				$val->field('username')->delete_rule('unique');
			}

			if ($user->email == \Input::post('email'))
			{
				$val->field('email')->delete_rule('unique');
			}


			if (\Input::method() == 'POST')
			{
				if($user->checkPassword(\Input::post('password')))
				{
					if ($val->run(null, true))
					{

						// Update the user details
						$user->username = $val->validated('username');
						$user->email    = $val->validated('email');

						// Update the user
						if ($user->save())
						{
							\Session::set_flash('success', \Lang::get('account.updated'));
						}
						else
						{
							\Session::set_flash('success', \Lang::get('account.not_updated'));
						}

						\Response::redirect('account');
					}
					else
					{
						\Session::set_flash('error', $val->error());
					}
				}
				else
				{
					\Session::set_flash('error', \Lang::get('account.password_error'));
				}
			}

			$this->template->title = \Lang::get('account.settings');
			$this->template->content = \View::forge('users/account', array(
				'user' => $user,
			), false);

		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			\Session::set_flash('success', \Lang::get('account.denied'));
			\Response::redirect('/');
		}
	}
}
