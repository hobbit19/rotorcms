<?php

class Controller_Admin extends Controller_Base
{
	public function before()
	{
		parent::before();

		if (Auth::check())
		{
			if ( ! Auth::member(100))
			{
				Session::set_flash('error', e('You don\'t have access to the admin panel'));
				Response::redirect('/');
			}
		}
		else
		{
			Response::redirect('/login');
		}
	}

	/**
	 * The index action.
	 */
	public function action_index()
	{
		$data['count_users'] = Model_User::find()->count();
		$data['users'] = Model_User::query()
			->order_by('created_at', 'desc')
			->rows_limit(5)
			->get();

		$this->template->title = 'Dashboard';
		$this->template->content = \View::forge('admin/dashboard', $data);
	}

}
