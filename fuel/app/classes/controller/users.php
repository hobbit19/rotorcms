<?php

class Controller_Users extends \Controller_Base
{

	public function before()
	{
		parent::before();
		Lang::load('user');
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
		is_null($id) and Response::redirect('users');

		if ( ! $user = Model_User::find($id))
		{
			Session::set_flash('error', 'Could not find user '.$id);
			Response::redirect('users');
		}

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
		Auth::check() and Response::redirect('/');

		$auth = \Auth::instance();
		$captcha = \Captcha::forge('simplecaptcha');
		$val = Model_User::validate('register');

		if (\Input::method() == 'POST')
		{

			if ($val->run())
			{
				if($captcha->check()) {
					try
					{
						$auth->create_user(
							$val->validated('username'),
							$val->validated('password'),
							\Str::lower($val->validated('email'))
						);

						$auth->login($val->validated('username'), $val->validated('password'));
						\Session::set_flash('success', __('register.success'));
						\Response::redirect('/');

					}
					catch (Exception $e)
					{
						\Session::set_flash('error', $e->getMessage());
					}
				}
				else
				{
					\Session::set_flash('error', __('register.captcha'));
				}
			}
			else
			{
				\Session::set_flash('error', $val->error());
			}

		}

		$this->template->title = __('register.title');
		$this->template->content = \View::forge('users/register');

	}

	/**
	 * action_login
	 */
	public function action_login()
	{
		Auth::check() and Response::redirect('/');

		if (\Input::method() == 'POST')
		{
			if (\Auth::login(\Input::post('username'), \Input::post('password')))
			{
				\Session::set_flash('success', __('login.success'));
				\Response::redirect('/');
			}
			else
			{
				\Session::set_flash('error', __('login.error'));
			}
		}

		$this->template->title = __('login.title');
		$this->template->content = \View::forge('users/login');
	}

	/**
	 * action_logout
	 */
	public function action_logout()
	{
		\Auth::logout();
		\Session::set_flash('success', __('logout.exit'));
		\Response::redirect('/');
	}
}
