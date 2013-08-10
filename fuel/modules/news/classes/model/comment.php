<?php

namespace News;

class Model_Comment extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'news_id',
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
			'model_to' => '\Users\Model_User',
		),
	);
	public static function validate($factory)
	{
		$val = \Validation::forge($factory);
		$val->add_field('text', 'Text', 'trim|required|min_length[3]|max_length[700]');

		return $val;
	}
	
	protected static $_table_name = 'news_comments';
}
