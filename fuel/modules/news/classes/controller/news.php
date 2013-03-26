<?php

namespace News;

class Controller_News extends \Controller_Base
{
	/**
	 * action_index
	 */
	public function action_index()
	{
		$config = array(
			'pagination_url' => 'news/index/',
			'total_items' => Model_News::find()->count(),
			'per_page'    => 10,
			'show_first'  => true,
			'show_last'   => true,
		);

		$pagination = \Pagination::forge('news', $config);

		$text = Model_News::find()
			->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->order_by('created_at', 'desc')
			->get();

		$pagination = $pagination->render();

		$this->template->title = 'News';
		$this->template->content = \View::forge('news::index', array(
			'text' => $text, 'pagination' => $pagination
		), false);
	}

	/**
	 * action_create
	 */
	public function action_create()
	{
		if ( ! \Auth::member(100))
		{
			\Session::set_flash('error', e('You don\'t have access'));
			\Response::redirect('/');
		}

		if (\Input::method() == 'POST')
		{
			$val = Model_News::validate('create');

			if ($val->run())
			{
				$post = Model_News::forge(array(
					'user_id' => $this->current_user->id,
					'title' => \Input::post('title'),
					'text' => \Input::post('text'),
				));

				if ($post and $post->save())
				{
					\Session::set_flash('success', 'Новость успешно добавлена!');
					\Response::redirect('news/index');
				}

				else
				{
					\Session::set_flash('error', 'Could not save news.');
				}
			}
			else
			{
				\Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Create News";
		$this->template->content = \View::forge('news::create');
	}

	/**
	 * action_menu
	 */
	public function action_menu()
	{
		if(\Request::is_hmvc())
		{
			$navitems = array(
				array ('link' => '/', 'name' => 'Home'),
				array ('link' => 'news', 'name' => 'News'),
				array ('link' => 'news/create', 'name' => 'Create'),
			);

			return \Request::forge('base/prepare_menu')->execute(array($navitems));
			}
		else
		{
			return new \Response(\View::forge('404'), 404);
		}
	}
}
