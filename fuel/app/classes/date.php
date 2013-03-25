<?php

class Date extends Fuel\Core\Date
{
	public function format($pattern_key = 'local', $timezone = null)
	{
		$output = parent::format($pattern_key, $timezone);
		return mb_convert_encoding($output, 'utf-8', 'windows-1251');
	}
}
