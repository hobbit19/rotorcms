<?php
class Controller_Admin_Users extends Controller_Admin
{

	public function action_index()
	{
		$total = Model_User::find()->count();

		$config = array(
			'pagination_url' => 'admin/users/index/',
			'total_items' => $total,
			'per_page'    => 10,
			'show_first'  => true,
			'show_last'   => true,
			'uri_segment' => 4,
		);

		$pagination = \Pagination::forge('users', $config);

		$users = Model_User::find()
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
/*
	public function action_view($id = null)
	{
		$data['post'] = Model_Post::find($id);

		$this->template->title = "Post";
		$this->template->content = View::forge('admin\posts/view', $data);

	}

	public function action_edit($id = null)
	{
		$post = Model_Post::find($id);
		$val = Model_Post::validate('edit');

		if ($val->run())
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
		}

		$this->template->title = "Posts";
		$this->template->content = View::forge('admin\posts/edit');

	}

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
