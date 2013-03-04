<?php

class Model_User extends \Orm\Model
{
	protected static $_properties = array(
		'id',
		'username' => array(
			'data_type' => 'string',
			'validation' => array('required', 'trim', 'min_length'=>array(3), 'max_length'=>array(30)),
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
}
