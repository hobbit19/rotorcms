<?php

class Controller_Contact extends Controller_Base
{

	public function action_index()
	{
		$this->template->title = 'Contact';
		$this->template->content = View::forge('contact/index');
	}

}
