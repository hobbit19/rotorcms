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

		$this->template->title = 'Member List';
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

		if ( ! $user = Model_User::find($id))
		{
			\Session::set_flash('error', 'Could not find user: '.$id);
			\Response::redirect('users');
		}
		\Breadcrumb::set($user->username);
		$this->template->title = 'Profile: '.$user->username;
		$this->template->content = \View::forge('users/view', array(
			'user' => $user,
		));
	}

	/**
	 * action_register
	 */
	public function action_register()
	{
		\Sentry::check() and \Response::redirect('/');

		$auth = \Auth::instance();
		$captcha = \Captcha::forge('simplecaptcha');
		$val = Model_User::validate('register');

		if (\Input::method() == 'POST')
		{
			if ($val->run())
			{
				if ($captcha->check())
				{

/*					try
					{
						$auth->create_user(
							$val->validated('username'),
							$val->validated('password'),
							\Str::lower($val->validated('email'))
						);

						$auth->login($val->validated('username'), $val->validated('password'));
						\Session::set_flash('success', sentence('register.success'));
						\Response::redirect('/');

					}
					catch (Exception $e)
					{
						\Session::set_flash('error', $e->getMessage());
					}
*/
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
						$email->subject('Подтверждение регистрации');
						$email->body('Здравствуйте '.$val->validated('username').'!'.PHP_EOL.
							'Для подтверждения регистрации пожалуйста пройдите по следующей ссылке:'.PHP_EOL.
							\Uri::base(false).'users/activation/'.$activationCode);
						$email->send();

						//$credentials = array(
						//	'email' => $val->validated('email'),
						//	'password' => $val->validated('password'),
						//);

						// Try to authenticate the user
						//$user = Sentry::authenticateAndRemember($credentials);
						//\Session::set_flash('success', Lang::get('login.success'));
						//\Response::redirect('/');
					}

					catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
					{
						\Session::set_flash('success', Lang::get('login.success'));
						\Response::redirect('users/activation');
					}

					catch (Exception $e)
					{
						\Session::set_flash('error', $e->getMessage());
					}


				}
				else
				{
					\Session::set_flash('error', Lang::get('register.captcha'));
				}
			}
			else
			{
				\Session::set_flash('error', $val->error());
			}

		}

		$this->template->title = Lang::get('register.title');
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
			// Set login credentials
			$credentials = array(
				'email' => \Input::post('username'),
				'password' => \Input::post('password'),
			);

			// Try to authenticate the user
			$user = Sentry::authenticate($credentials, \Input::post('remember'));

			\Session::set_flash('success', Lang::get('login.success'));
			\Response::redirect('/');
		}
		catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
		{
			\Session::set_flash('error', 'Login field is required.');
		}
		catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
		{
			\Session::set_flash('error', 'Password field is required.');
		}
		catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			\Session::set_flash('error', 'User was not found.');
		}
		catch (Cartalyst\Sentry\Users\UserNotActivatedException $e)
		{
			\Session::set_flash('error', 'User is not activated.');
		}

		// The following is only required if throttle is enabled
		catch (Cartalyst\Sentry\Throttling\UserSuspendedException $e)
		{
			\Session::set_flash('error', 'User is suspended.');
		}
		catch (Cartalyst\Sentry\Throttling\UserBannedException $e)
		{
			\Session::set_flash('error', 'User is banned.');
		}

/*			if (\Auth::login(\Input::post('username'), \Input::post('password')))
			{
				\Session::set_flash('success', Lang::get('login.success'));
				\Response::redirect('/');
			}
			else
			{
				\Session::set_flash('error', Lang::get('login.error'));
			}*/
		}

		$this->template->title = Lang::get('login.title');
		$this->template->content = \View::forge('users/login');
	}

	/**
	 * action_logout
	 */
	public function action_logout()
	{
		\Sentry::logout();
		\Session::set_flash('success', Lang::get('logout.exit'));
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
			$user = Model_User::find()
				->where('email', '=', \Input::post('email'))
				->get_one();

			if ( ! empty($user))
			{
				$email = \Email::forge();
				$email->from('rotorcms@visavi.net', 'rotor');
				$email->to($user->email, $user->username);
				$email->subject('Восстановление пароля');
				$email->body('Здравствуйте '.$user->username.'!'.PHP_EOL.
					'Для восстановления пароля пожалуйста пройдите по следующей ссылке:'.PHP_EOL.
					\Uri::base(false).'users/recovery/'.$user->login_hash);
				$email->send();

				\Session::set_flash('success', 'На ваш эл. адрес отправлена инструкция по восстановлению пароля');
				\Response::redirect('login');
			}
			else
			{
				\Session::set_flash('error', 'Неверный адрес эл.почты');
			}
		}

		$this->template->title = 'Забыли пароль?';
		$this->template->content = \View::forge('users/reset');
	}

	/**
	 * action_recovery
	 */
	public function action_recovery($key = null)
	{
		(\Auth::check() or is_null($key)) and \Response::redirect('/');

		$user = Model_User::find()
			->where('login_hash', '=', $key)
			->get_one();

		if ( ! empty($user))
		{
			$password = \Auth::reset_password($user->username);
			\Session::set_flash('success','Вы успешно прошли процедуру восстановления пароля, ваш новый пароль: '.$password);
			\Response::redirect('login');
		}
		else
		{
			\Session::set_flash('error','Неверный проверочный код');
			\Response::redirect('reset');
		}
	}

	/**
	 * action_activation
	 */
	public function action_activation($key = null)
	{
		\Sentry::check() and \Response::redirect('/');

/*		try
		{
		    $user = Sentry::getUserProvider()->findByActivationCode($key);

		    if ( ! $user->isActivated())
		    {

		    }


		}
		catch (Exception $e)
		{
			\Session::set_flash('error', $e->getMessage());
		}*/

try
{
    // Find the user using the user ActivationCode
    $user = Sentry::getUserProvider()->findByActivationCode($key);

    // Attempt to activate the user
    if ($user->attemptActivation($key))
    {
        die('User activation passed');
    }
    else
    {
        die('User activation failed');
    }
}
catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
{
    die('User was not found.');
}
catch (Cartalyst\SEntry\Users\UserAlreadyActivatedException $e)
{
    die('User is already activated.');
}
		catch (Exception $e)
		{
			\Session::set_flash('error', $e->getMessage());
		}

	}
}
