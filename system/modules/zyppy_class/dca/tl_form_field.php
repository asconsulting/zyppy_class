<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

 
foreach ($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as $key => $value) {
	$GLOBALS['TL_DCA']['tl_form_field']['palettes'][$key] = str_replace(';{expert_legend', ';{css_chooser_legend},cssChooser,commonClasses;{expert_legend', $value);	
}

$GLOBALS['TL_DCA']['tl_form_field']['fields']['cssChooser'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['cssChooser'],
	'inputType'               => 'select',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getCssOptions'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['commonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['commonClasses'],
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getCommonClassOptions'),
	'eval'                    => array('multiple'=>true),
	'sql'                     => "blob NULL"
);
