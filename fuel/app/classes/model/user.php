<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username',
		'password',
		'email',
		'last_login',
		'created_at',
		'updated_at',
		'permissions',
		'activated',
		'activation_code',
		'persist_code',
		'reset_password_code',
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => true,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => true,
		),
	);

	//protected static $_has_many = array('guestbook');

	/**
	 * validate
	 */
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_callable('\Rules');

		$val->add('username', 'Username')
			->add_rule('required')
			->add_rule('trim')
			->add_rule('strip_tags')
			->add_rule('min_length', 3)
			->add_rule('max_length', 20)
			->add_rule('unique','users.username');

		$val->add('password','Password')
			->add_rule('required')
			->add_rule('trim')
			->add_rule('strip_tags')
			->add_rule('min_length', 6)
			->add_rule('max_length', 30);

		$val->add('confirm_password','Сonfirm password')
			->add_rule('match_field', 'password');

		$val->add('email', 'Email')
			->add_rule('required')
			->add_rule('trim')
			->add_rule('strip_tags')
			->add_rule('min_length', 5)
			->add_rule('max_length', 50)
			->add_rule('valid_email')
			->add_rule('unique','users.email');

		return $val;
	}
}
