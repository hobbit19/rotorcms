<?php

namespace Fuel\Migrations;

class Create_users_groups
{
	public function up()
	{
		\DBUtil::create_table('users_groups', array(
			'id' => array('constraint' => 11, 'type' => 'int', 'auto_increment' => true, 'unsigned' => true),
			'user_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),
			'group_id' => array('constraint' => 11, 'type' => 'int', 'unsigned' => true),

		), array('id'));
	}

	public function down()
	{
		\DBUtil::drop_table('users_groups');
	}
}
