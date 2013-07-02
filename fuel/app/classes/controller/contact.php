<?php

class Controller_Contact extends Controller_Base
{
	public function before()
	{
		parent::before();
		\Lang::load('contact');
	}

	public function action_index()
	{
		$this->template->title = \Lang::get('index.page_title');
		$this->template->content = View::forge('contact/index');
	}

}
