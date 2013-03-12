<?php

class Controller_Users extends Controller_Base
{
	/**
	 * action_index
	 */
	public function action_index()
	{

		$config = array(
			'pagination_url' => 'users/index/',
			'total_items' => Model_User::find()->count(),
			'per_page'    => 10,
		);

		// Create a pagination instance named 'mypagination'
		$pagination = Pagination::forge('mypagination', $config);

		$users = Model_User::find()
		    ->rows_offset($pagination->offset)
		    ->rows_limit($pagination->per_page)
		    ->get();

		$pagination = $pagination->render();
		
		$this->template->title = 'Member List';
		$this->template->content = View::forge('users/index', array(
			'users' => $users, 'pagination' => $pagination
		), false);
	}

	/**
	 * action_view
	 */
	public function action_view($id)
	{
		$user = Model_User::find($id);

		$this->template->title = 'Profile: '.$user->username;
		$this->template->content = View::forge('users/view', array(
			'user' => $user,
		));
	}

	/**
	 * action_create
	 */
	public function action_create()
	{
		$auth = Auth::instance();
		$view = View::forge('users/create');
		$val = Model_User::validate('create');

		if (Input::method() == 'POST')
		{
			if ($val->run())
			{
				try
				{
					$auth->create_user(
						$val->validated('username'),
						$val->validated('password'),
						Str::lower($val->validated('email'))
					);

					$auth->login($val->validated('username'), $val->validated('password'));
					Session::set_flash('success', 'Пользователь успешно создан!');
					Response::redirect('/');

				}
				catch (Exception $e)
				{
					Session::set_flash('error', $e->getMessage());
				}

			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$view->val = $val;
		$this->template->title = 'Registration';
		$this->template->content = $view;

	}

	/**
	 * action_login
	 */
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
				Session::set_flash('error', 'Неверная пара логин-пароль!');
			}
		}

		$this->template->title = 'Login';
		$this->template->content = View::forge('users/login');
	}

	/**
	 * action_logout
	 */
	public function action_logout()
	{
		Auth::logout();

		Session::set_flash('success', 'Вы успешно вышли!');

		Response::redirect('/');
	}
}
