<?php

namespace News;

class Model_News extends \Orm\Model
{
	protected static $_table_name = 'news';

	protected static $_properties = array(
		'id',
		'title',
		'user_id',
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

	protected static $_belongs_to = array(
		'user' => array(
			'model_to' => 'Model_User',
		)
	);

	public static function validate($factory)
	{
		$val = \Validation::forge($factory);
		$val->add_field('text', 'Text', 'required|trim|max_length[5000]');
		$val->add_field('title','title','required|trim|max_length[50]');

		return $val;
	}
}
