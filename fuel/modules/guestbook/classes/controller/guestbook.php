<?php

namespace Guestbook;

class Controller_Guestbook extends \Controller_Base
{

	public function before()
	{
		parent::before();
		//\Lang::load('guestbook');
	}

	/**
	 * action_index
	 */
	public function action_index()
	{
		$config = array(
			'pagination_url' => 'guestbook/index/',
			'total_items' => Model_Guestbook::find()->count(),
			'per_page'    => 10,
			'show_first'  => true,
			'show_last'   => true,
		);

		$pagination = \Pagination::forge('guestbook', $config);

		$messages = Model_Guestbook::find()
		    ->rows_offset($pagination->offset)
		    ->rows_limit($pagination->per_page)
		    ->order_by('created_at', 'desc')
		    ->get();

		$pagination = $pagination->render();

		$this->template->title = 'Guestbook';
		$this->template->content = \View::forge('guestbook::index', array(
			'messages' => $messages, 'pagination' => $pagination
		), false);
	}

	public function action_create()
	{
		if (\Input::method() == 'POST')
		{
			$val = Model_Guestbook::validate('create');

			if ($val->run())
			{
				$post = Model_Guestbook::forge(array(
					'user_id' => 1,
					'text' => \Input::post('text'),
				));

				if ($post and $post->save())
				{
					\Session::set_flash('success', 'Сообщение успешно добавлено!');

					\Response::redirect('guestbook/index');
				}

				else
				{
					\Session::set_flash('error', 'Could not save message.');
				}
			}
			else
			{
				\Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "New message";
		$this->template->content = \View::forge('guestbook::create');

	}
}
