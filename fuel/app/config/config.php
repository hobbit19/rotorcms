<?php
/**
 * Fuel is a fast, lightweight, community driven PHP5 framework.
 *
 * @package    Fuel
 * @version    1.5
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * If you want to override the default configuration, add the keys you
 * want to change here, and assign new values to them.
 */

return array(

	/**
	 * Localization & internationalization settings
	 */
	'language'           => 'ru', // Default language
	'language_fallback'  => 'en', // Fallback language when file isn't available for default language
	'locale'             => null, // PHP set_locale() setting, null to not set

	/**
	 * DateTime settings
	 * default_timezone		optional, if you want to change the server's default timezone
	 */
	'default_timezone'   => 'Europe/Moscow',

	/**
	 * Security settings
	 */
	'security' => array(
		'whitelisted_classes' => array(
			//'Fuel\\Core\\Validation'
		),
	),

	/**
	* Always Load 
	*/
	'always_load'  => array(
		'packages'  => array(
			'orm',
			'auth',
		),
	),
);