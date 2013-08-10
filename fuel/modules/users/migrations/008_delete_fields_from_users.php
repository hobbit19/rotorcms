<?php

namespace Fuel\Migrations;

class Delete_fields_from_users
{
	public function up()
	{
		\DBUtil::drop_fields('users', array(
			'group',
			'login_hash',
			'profile_fields',

		));
	}

	public function down()
	{
		\DBUtil::add_fields('users', array(
			'group' => array('constraint' => 11, 'type' => 'int'),
			'login_hash' => array('constraint' => 255, 'type' => 'varchar'),
			'profile_fields' => array('type' => 'text'),

		));
	}
}
