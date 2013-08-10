<?php

namespace Fuel\Migrations;

class Add_updated_at_to_users
{
	public function up()
	{
		\DBUtil::add_fields('users', array(
			'updated_at' => array('constraint' => 11, 'type' => 'int', 'default' => 0),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('users', array(
			'updated_at'

		));
	}
}