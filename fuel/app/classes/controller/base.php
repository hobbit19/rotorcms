<?php

class Controller_Base extends Controller_Hybrid
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

	/**
	 * action_simplecaptcha
	 */
	public function action_simplecaptcha()
	{
		$captcha = \Captcha::forge('simplecaptcha');

		return $captcha->image();
	}

	/**
	 * action_navlinks
	 */
	public function action_navlinks()
	{
		if (\Request::is_hmvc())
		{
			$navitems = Config::load('navbar');

			$uri = trim(strtok(\Input::uri(), '/'), '/');

			foreach ($navitems as $key=>$navitem)
			{
				if ($uri == $navitem['link'])
				{
					$navitems[$key]['active'] = true;
				}
			}

			return \View::forge('base/navlinks', array(
				'navitems' => $navitems,
			));

		}
		else
		{
			return new \Response(\View::forge('404'), 404);
		}
	}
}
