<?php

namespace Guestbook;

class Controller_Guestbook extends \Controller_Base
{
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
		    ->get();

		$pagination = $pagination->render();

		$this->template->title = 'Guestbook';
		$this->template->content = \View::forge('guestbook::index', array(
			'messages' => $messages, 'pagination' => $pagination
		), false);
	}
}
