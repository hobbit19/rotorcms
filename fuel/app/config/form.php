<?php
/**
 * Part of the Fuel framework.
 *
 * @package    Fuel
 * @version    1.5
 * @author     Fuel Development Team
 * @license    MIT License
 * @copyright  2010 - 2013 Fuel Development Team
 * @link       http://fuelphp.com
 */

/**
 * NOTICE:
 *
 * If you need to make modifications to the default configuration, copy
 * this file to your app/config folder, and make them in there.
 *
 * This will allow you to upgrade fuel without losing your custom config.
 */


return array(
	// regular form definitions
	'prep_value'                 => true,
	'auto_id'                    => true,
	'auto_id_prefix'             => 'form_',
	'form_method'                => 'post',
	'form_template'              => "\n\t{open}\t\t\n{fields}\n\t{close}\n",

	//'fieldset_template'          => "\n\t\t<tr><td colspan=\"2\">{open}<table>\n{fields}</table></td></tr>\n\t\t{close}\n",

	'field_template'             => "\t\t<div class=\"control-group{error_class}\">\n\t\t\t{label}{required}\n\t\t\t<div class=\"controls\">\n\t\t\t\t{field}\n\t\t\t\t<span>{description}</span>{error_msg}\n\t\t\t</div>\n\t\t</div>\n",

	//'multi_field_template'       => "\t\t<tr>\n\t\t\t<td class=\"{error_class}\">{group_label}{required}</td>\n\t\t\t<td class=\"{error_class}\">{fields}\n\t\t\t\t{field} {label}<br />\n{fields}<span>{description}</span>\t\t\t{error_msg}\n\t\t\t</td>\n\t\t</tr>\n",

	'error_template'             => '<span class="help-inline">{error_msg}</span>',
	'required_mark'              => '',
	'inline_errors'              => true,
	'error_class'                => ' error',
	'label_class'                => null,

	// tabular form definitions
	'tabular_form_template'      => "<table>{fields}</table>\n",
	'tabular_field_template'     => "{field}",
	'tabular_row_template'       => "<tr>{fields}</tr>\n",
	'tabular_row_field_template' => "\t\t\t<td>{label}{required}&nbsp;{field} {icon} {error_msg}</td>\n",
	'tabular_delete_label'       => "Delete?",
);
