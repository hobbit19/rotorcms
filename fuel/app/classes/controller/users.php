<?php

class Controller_Users extends Controller_Template
{

	public function before()
	{
		parent::before();

		if (Auth::check())
		{
			list($driver, $user_id) = Auth::get_user_id();

			$this->current_user = Model_user::find($user_id);
		}
		else
		{
			$this->current_user = null;
		}

		View::set_global('current_user', $this->current_user);
	}

	public function action_index()
	{
		$this->template->title = 'Users &raquo; Index';
		$this->template->content = View::forge('users/index');
	}

	public function action_view($id)
	{
		$user = Model_User::find($id);

		$this->template->title = 'Profile: '.$user->username;
		$this->template->content = View::forge('users/view', array(
			'user' => $user,
		));
	}

	public function action_login()
	{
		if (Input::method() == 'POST')
		{
			if (Auth::login(Input::post('username'), Input::post('password')))
			{
				Session::set_flash('success', 'Вы успешно авторизованы!');

				Response::redirect('/');
			}
			else
			{
				exit('Invalid login');
			}
		}

		$this->template->title = 'Login';
		$this->template->content = View::forge('users/login');
	}

	public function action_logout()
	{
		Auth::logout();

		Session::set_flash('success', 'Вы успешно вышли!');

		Response::redirect('/');
	}

}
