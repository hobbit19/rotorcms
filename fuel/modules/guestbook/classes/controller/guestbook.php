<?php

namespace Guestbook;

class Controller_Guestbook extends \Controller_Base
{

	public function before()
	{
		parent::before();
		\Lang::load('guestbook');
	}

	/**
	 * action_index
	 */
	public function action_index()
	{
		$config = array(
			'pagination_url' => 'guestbook/index/',
			'total_items' => Model_Guestbook::query()->count(),
			'per_page'    => 10,
			'show_first'  => true,
			'show_last'   => true,
		);

		$pagination = \Pagination::forge('guestbook', $config);

		$messages = Model_Guestbook::query()
		    ->rows_offset($pagination->offset)
		    ->rows_limit($pagination->per_page)
		    ->order_by('created_at', 'desc')
		    ->get();

		$pagination = $pagination->render();

		$view = \View::forge('guestbook::index');
		$view->set('messages', $messages);
		$view->set_safe('pagination', $pagination);

		$this->template->title = \Lang::get('index.title');
		$this->template->content = $view;
	}

	/**
	 * action_create
	 */
	public function action_create()
	{
		if ( ! \Sentry::check())
		{
			\Session::set_flash('error', \Lang::get('create.access'));
			\Response::redirect('guestbook/index');
		}

		if (\Input::method() == 'POST')
		{
			$val = Model_Guestbook::validate('create');

			if ($val->run())
			{
				$post = Model_Guestbook::forge(array(
					'user_id' => \Sentry::getUser()->id,
					'text'    => \Input::post('text'),
				));

				if ($post and $post->save())
				{
					\Session::set_flash('success', \Lang::get('create.success'));

					\Response::redirect('guestbook/index');
				}

				else
				{
					\Session::set_flash('error', \Lnag::get('create.error'));
				}
			}
			else
			{
				\Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = \Lang::get('create.title');
		$this->template->content = \View::forge('guestbook::create');

	}
}
