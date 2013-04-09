<?php

namespace Fuel\Migrations;

class Create_throttle
{
	public function up()
	{
		\DBUtil::create_table('throttle', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'user_id' => array('constraint' => 11, 'type' => 'int'),
			'ip_address' => array('constraint' => 255, 'type' => 'varchar', 'null' => true),
			'attempts' => array('constraint' => 11, 'type' => 'int', 'default' => 0),
			'suspended' => array('constraint' => 4, 'type' => 'tinyint', 'default' => 0),
			'banned' => array('constraint' => 4, 'type' => 'tinyint', 'default' => 0),
			'last_attempt_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),
			'suspended_at' => array('constraint' => 11, 'type' => 'int', 'null' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('throttle');
	}
}
