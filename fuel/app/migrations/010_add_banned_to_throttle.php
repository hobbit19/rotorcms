<?php

namespace Fuel\Migrations;

class Add_banned_to_throttle
{
	public function up()
	{
		\DBUtil::add_fields('throttle', array(
			'banned_at' => array('type' => 'timestamp', 'null' => true),

		));
	}

	public function down()
	{
		\DBUtil::drop_fields('throttle', array(
			'banned_at'

		));
	}
}
