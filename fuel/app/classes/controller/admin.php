<?php

class Controller_Admin extends Controller_Base
{
	public function before()
	{
		parent::before();

		\Lang::load('admin');

		if (\Sentry::check())
		{
			if ( ! \Sentry::getUser()->hasAccess('admin'))
			{
				\Session::set_flash('error', e('You don\'t have access to the admin panel'));
				\Response::redirect('/');
			}
		}
		else
		{
			\Response::redirect('/login');
		}
	}

	/**
	 * The index action.
	 */
	public function action_index()
	{
		$data['count_users'] = \Users\Model_User::query()->count();
		$data['users'] = \Users\Model_User::query()
			->order_by('created_at', 'desc')
			->rows_limit(5)
			->get();

		Module::load('news');
		$data['count_news'] = \News\Model_News::query()->count();
		$data['news'] = \News\Model_News::query()
			->order_by('created_at', 'desc')
			->rows_limit(5)
			->get();


		$this->template->title = 'Dashboard';
		$this->template->content = \View::forge('admin/dashboard', $data);
	}

}
