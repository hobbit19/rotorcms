<?php

namespace Fuel\Migrations;

class Add_activated_at_to_users
{
	public function up()
	{
		\DBUtil::add_fields('users', array(
			'activated_at' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('users', array(
			'activated_at'

		));
	}
}
