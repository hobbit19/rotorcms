<?php

class Controller_Admin_News extends Controller_Admin {

      public function action_index()
      {
	    Module::load('news');
	    $total = \News\Model_News::query()->count();

	    $config = array(
		'pagination_url' => 'admin/news/index/',
		'total_items' => $total,
		'per_page' => 10,
		'show_first' => true,
		'show_last' => true,
		'uri_segment' => 4,
	    );
	    $pagination = \Pagination::forge('news', $config);
	    $news = \News\Model_News::query()
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

      public function action_edit($id = null)
      {
	    is_null($id) and \Response::redirect('admin/news');
	    Module::load('news');
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

			// Update the user
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

      public function action_delete($id = null)
      {
	    is_null($id) and \Response::redirect('admin/news');
	    Module::load('news');
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

}

?>
