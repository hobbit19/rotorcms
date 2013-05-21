<?php

namespace News;

class Model_News extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'user_id',
		'title',
		'text',
		'created_at',
		'updated_at',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_update'),
			'mysql_timestamp' => false,
		),
	);

	protected static $_has_many = array(
		'comments' => array(
			'model_to' => '\News\Model_Comment',
		)
	);

	protected static $_belongs_to = array(
		'user' => array(
			'model_to' => 'Model_User',
		)
	);


	public static function validate($factory)
	{
		$val = \Validation::forge($factory);
		$val->add_field('title', 'Title', 'required|trim|max_length[50]');
		$val->add_field('text', 'Text', 'required|trim|max_length[5000]');

		return $val;
	}
}
