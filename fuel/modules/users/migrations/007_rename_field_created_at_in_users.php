<?php

namespace Fuel\Migrations;

class Rename_field_created_at_in_users
{
	public function up()
	{
		\DBUtil::modify_fields('users', array(
			'created_at' => array('name' => 'created_at', 'type' => 'timestamp', 'default' => '0000-00-00 00:00:00'),
			'updated_at' => array('name' => 'updated_at', 'type' => 'timestamp', 'default' => '0000-00-00 00:00:00'),
		));
	}

	public function down()
	{
	\DBUtil::modify_fields('users', array(
			'created_at' => array('name' => 'created_at', 'type' => 'int', 'constraint' => 11),
			'updated_at' => array('name' => 'updated_at', 'type' => 'int', 'constraint' => 11),
		));
	}
}
