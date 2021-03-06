<?php
/**
 * Breadcrumb solution
 *
 * @version    0.2
 * @author     Daniel Polito - @dbpolito
 */

return array(

	/**
	 * Auto Populate Breadcrumb based on routes
	 */
	'auto_populate' => true,
	'ignore_segments' => array(),

	/**
	 * If true the class will call ONLY ON AUTO POPULATING Lang::get() to each item
	 * of breadcrumb and WILL NOT ucwords and replace underscores to spaces
	 */
	'use_lang' => true,
	'lang_file' => null,
	'lang_prefix' => 'breadcrumb',

	/**
	 * Home Link
	 */
	'home' => array('name' => 'Главная', 'link' => '/'),

	/**
	 * Template Structure
	 */
	'template' => array(
		'wrapper_start' => '<ul class="breadcrumb">',
		'wrapper_end' => '</ul>',
		'item_start' => '<li>',
		'item_start_active' => '<li class="active">',
		'item_end' => '</li>'
	),

	'display_always' => false

);

/* End of file breadcrumb.php */
