<?php

class Controller_Error extends \Controller_Base
{
	public function action_404()
	{
		$messages = array('Aw, crap!', 'Bloody Hell!', 'Uh Oh!', 'Nope, not here.', 'Huh?');
		$title = $messages[array_rand($messages)];

		\Breadcrumb::remove(1);
		$this->template->fullpage = true;
		$this->template->title = $title;
		$this->template->subtitle = 'We can\'t find that!';
		$this->template->content = View::forge('error/404', array('title' => $title));
	}
}
