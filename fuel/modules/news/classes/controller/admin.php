<?php

namespace News;

class Controller_Admin extends \Controller_Admin {
        
    public function before()
	{
		parent::before();
		\Lang::load('news');
	}
        
	/**
	 * action_index
	 */
	public function action_index()
	{
		$total = Model_News::query()->count();

		$config = array(
			'pagination_url' => 'admin/news/index/',
			'total_items' => $total,
			'per_page' => 10,
			'show_first' => true,
			'show_last' => true,
			'uri_segment' => 4,
		);

		$pagination = \Pagination::forge('news', $config);
		$news = Model_News::query()
			->rows_offset($pagination->offset)
			->rows_limit($pagination->per_page)
			->get();

		$pagination = $pagination->render();

		$this->template->title = 'Управление новостями';
		$this->template->content = \View::forge('admin/news/index', array(
			'news' => $news,
			'pagination' => $pagination,
		), false);
	}

	/**
	 * action_edit
	 */
	public function action_edit($id = null)
	{
		is_null($id) and \Response::redirect('admin/news');

		$news = \News\Model_News::query()
			->where(array('id' => $id))
			->get_one();

		if (empty($news))
		{
			\Session::set_flash('error', 'Не верный идентификатор');
			\Response::redirect('admin/news');
		}

		if (\Input::method() == 'POST')
		{
			$val = \News\Model_News::validate('edit');

			if ($val->run(null, true))
			{
				$news->title = $val->validated('title');
				$news->text = $val->validated('text');

				// Update the news
				if ($news->save())
				{
					\Session::set_flash('success', 'Вы успешно изменили новость');
				}
				else
				{
					\Session::set_flash('success', 'Новость не была изменена');
				}

			}
			else
			{
				\Session::set_flash('error', $val->error());
			}

			\Response::redirect('admin/news');
		}

		$this->template->set_global('news', $news, false);
		$this->template->title = 'Управление новостями';
		$this->template->content = \View::forge('admin/news/edit');
	}

	/**
	 * action_delete
	 */
	public function action_delete($id = null)
	{
		is_null($id) and \Response::redirect('admin/news');

		$news = \News\Model_News::query()
			->where(array('id' => $id))
			->get_one();
		if (empty($news))
		{
			\Session::set_flash('error', 'Не верный идентификатор');
			\Response::redirect('admin/news');
		}
		else
		{
			$news->delete();
			\Response::redirect('admin/news');
		}
	}

	/**
	 * action_create
	 */
	public function action_create()
	{
		if (\Input::method() == 'POST')
		{
			$val = Model_News::validate('create');

			if ($val->run())
			{
				$post = Model_News::forge(array(
					'user_id' => $this->current_user->id,
					'title' => \Input::post('title'),
					'text' => \Input::post('text'),
				));

				if ($post and $post->save())
				{
					\Session::set_flash('success', \Lang::get('create.success'));
					\Response::redirect('news/index');
				}

				else
				{
					\Session::set_flash('error', \Lang::get('create.error'));
				}
			}
			else
			{
				\Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = \Lang::get('create.title');
		$this->template->content = \View::forge('news::create');
	}
}

?>
