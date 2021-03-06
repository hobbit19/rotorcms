<?php

namespace Guestbook;

class Model_Guestbook extends \Orm\Model
{
	protected static $_table_name = 'guestbook';

	protected static $_properties = array(
		'id',
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
		)
	);

	public static function validate($factory)
	{
		$val = \Validation::forge($factory);
		$val->add_field('text', 'Text', 'required|min_length[5]|max_length[1000]');

		return $val;
	}
}
