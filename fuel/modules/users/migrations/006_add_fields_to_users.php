<?php

namespace Fuel\Migrations;

class Add_fields_to_users
{
	public function up()
	{
		\DBUtil::add_fields('users', array(
			'permissions' => array('type' => 'text'),
			'activated' => array('constraint' => 4, 'type' => 'tinyint', 'default' => 0),
			'activation_code' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'persist_code' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'reset_password_code' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
		));
	}

	public function down()
	{
		\DBUtil::drop_fields('users', array(
			'permissions',
			'activated',
			'activation_code',
			'persist_code',
			'reset_password_code'
		));
	}
}
