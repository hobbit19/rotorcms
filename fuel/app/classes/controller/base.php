<?php

class Controller_Base extends Controller_Template
{

	public function before()
	{
		parent::before();

		if (\Auth::check())
		{
			list($driver, $user_id) = Auth::get_user_id();

			$this->current_user = Model_user::find($user_id);
		}
		else
		{
			$this->current_user = null;
		}

		\View::set_global('current_user', $this->current_user);
	}

	public function action_simplecaptcha()
	{
		$captcha = \Captcha::forge('simplecaptcha');

		return $captcha->image();
	}
}
