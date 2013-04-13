<?php

class Date extends Fuel\Core\Date
{
	public function format($pattern_key = 'local', $timezone = null)
	{
		$output = parent::format($pattern_key, $timezone);

		if (mb_detect_encoding(parent::format('%b'), array('UTF-8', 'Windows-1251'), true) == 'Windows-1251')
		{
			return mb_convert_encoding($output, 'UTF-8', 'Windows-1251');
		}

		return $output;
	}
}
