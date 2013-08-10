<?php

namespace Users;

class Controller_Admin extends \Controller_Admin
{

	public function action_index()
	{
		$total = Model_User::query()->count();

		$config = array(
			'pagination_url' => 'admin/users/index/',
			'total_items' => $total,
			'per_page'    => 10,
			'show_first'  => true,
			'show_last'   => true,
			'uri_segment' => 4,
		);

		$pagination = \Pagination::forge('users', $config);

		$users = Model_User::query()
			->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$users = Model_User::status($users);

		$pagination = $pagination->render();

		$this->template->title = 'Управление пользователями';
		$this->template->content = \View::forge('admin/users/index', array(
			'users' => $users,
			'pagination' => $pagination,
			'total' => $total,
		), false);
	}

	public function action_edit($id = null)
	{

		is_null($id) and \Response::redirect('admin/users');

		try
		{
			$user = \Sentry::getUserProvider()->findById($id);
		}
		catch (\Cartalyst\Sentry\Users\UserNotFoundException $e)
		{
			\Session::set_flash('success', e('Не найден пользователь #' . $id));
			\Response::redirect('admin/users');
		}

		$val = Model_User::validate('edit');

			Arr::delete($_POST, "password");
			Arr::delete($_DELETE, "password");
			var_dump($val->input());

		if (\Input::method() == 'POST')
		{
			if ($user->email == \Input::post('email'))
			{
				$val->field('email')->delete_rule('unique');
			}

/*			if (\Input::post('password') == "")
			{
				unset($val->validated('password'));
			}*/


			if ($val->run(null, true))
			{
/*				// Update the user details
				$user->email = $val->validated('email');*/

			}
			else
			{
				\Session::set_flash('error', $val->error());
			}
		}


/*		if ($val->run())
		{
			$post->title = Input::post('title');
			$post->slug = Input::post('slug');
			$post->summary = Input::post('summary');
			$post->body = Input::post('body');
			$post->user_id = Input::post('user_id');

			if ($post->save())
			{
				Session::set_flash('success', e('Updated post #' . $id));

				Response::redirect('admin/posts');
			}

			else
			{
				Session::set_flash('error', e('Could not update post #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$post->title = $val->validated('title');
				$post->slug = $val->validated('slug');
				$post->summary = $val->validated('summary');
				$post->body = $val->validated('body');
				$post->user_id = $val->validated('user_id');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('post', $post, false);
		}*/

		$this->template->set_global('user', $user, false);
		$this->template->title = "Edit user ".$user->username;
		$this->template->content = \View::forge('admin/users/edit');


	}

/*
	public function action_delete($id = null)
	{
		if ($post = Model_Post::find($id))
		{
			$post->delete();

			Session::set_flash('success', e('Deleted post #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete post #'.$id));
		}

		Response::redirect('admin/posts');

	}*/


}
