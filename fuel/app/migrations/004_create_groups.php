<?php

namespace Fuel\Migrations;

class Create_groups
{
	public function up()
	{
		\DBUtil::create_table('groups', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'name' => array('constraint' => 255, 'type' => 'varchar'),
			'permissions' => array('type' => 'text'),
			'created_at' => array('type' => 'timestamp', 'default' => '0000-00-00 00:00:00', 'unsigned' => true),
			'updated_at' => array('type' => 'timestamp', 'default' => '0000-00-00 00:00:00', 'unsigned' => true),

		), array('id'));

		\DBUtil::create_index('groups', 'name', 'name', 'UNIQUE');
	}

	public function down()
	{
		\DBUtil::drop_table('groups');
	}
}
