<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username' => array(
			'data_type' => 'string',
			'validation' => array('required', 'trim', 'min_length'=>array(3), 'max_length'=>array(20)),
			'label' => array('label'=>'Username', 'class'=>'control-label', 'for'=>'form_username'),
		),
		'password' => array(
			'data_type' => 'string',
			'validation' => array('required', 'trim', 'min_length'=>array(6), 'max_length'=>array(30)),
			'label' => array('label'=>'Password', 'class'=>'control-label', 'for'=>'form_password'),
		),
		'group'=> array(
            'data_type' => 'int',
            'form' => array('type' => 'select', 'options' => array('-1' => 'Banned', '0' => 'Guests', '1' => 'Users', '50' => 'Moderators', '100' => 'Administrators')),
            'validation' => array('required'),
            'label' => array('label'=>'Group', 'class'=>'control-label', 'for'=>'form_group'),
        ),
		'email' => array(
			'data_type' => 'string',
			'validation' => array('required', 'trim', 'valid_email', 'min_length'=>array(5), 'max_length'=>array(50)),
			'label' => array('label'=>'Email', 'class'=>'control-label', 'for'=>'form_email'),
		),
		'last_login' => array(
			'data_type' => 'string',
			'label' => 'Last login',
			'form' => array(
				'type' => false,
			),
		),
		'login_hash' => array(
			'data_type' => 'string',
			'label' => 'Last hash',
			'form' => array(
				'type' => false,
			),
		),
		'profile_fields' => array(
			'data_type' => 'text',
			'validation' => array('max_length'=>array(65000)),
			'label' => array('label'=>'Profile fields', 'class'=>'control-label', 'for'=>'form_profile_fields'),
		),
		'created_at' => array(
			'data_type' => 'int',
			'label' => 'Created At',
			'form' => array(
				'type' => false,
			),
		),
		'updated_at' => array(
			'data_type' => 'int',
			'label' => 'Updated At',
			'form' => array(
				'type' => false,
			),
		),
	);

	protected static $_observers = array(
		'Orm\Observer_CreatedAt' => array(
			'events' => array('before_insert'),
			'mysql_timestamp' => false,
		),
		'Orm\Observer_UpdatedAt' => array(
			'events' => array('before_save'),
			'mysql_timestamp' => false,
		),
	);

	//protected static $_has_many = array('guestbook');

	/**
	 * validate
	 */
	public static function validate($factory)
	{
		$val = Validation::forge($factory);
		$val->add_callable('CustomRules');

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
