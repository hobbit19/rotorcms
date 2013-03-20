<?php

class CustomRules
{
	/**
	 * _validation_unique
	 */
	public static function _validation_unique($val, $options)
	{
		list($table, $field) = explode('.', $options);

		$result = \DB::select("LOWER (\"$field\")")
		->where($field, '=', Str::lower($val))
		->from($table)->execute();

		\Validation::active()->set_message('unique', 'The field :label must be unique, but :value has already been used');

		return ! ($result->count() > 0);
	}
}
