<?php

namespace Guestbook;
use \Fuel\Core\Controller_Template;
use \Fuel\Core\View;

class Controller_Guestbook extends Controller_Template
{
	/**
	 * action_index
	 */
	public function action_index()
	{

		
		$this->template->title = 'Guestbook';
		$this->template->content = View::forge('index');
	}
}
