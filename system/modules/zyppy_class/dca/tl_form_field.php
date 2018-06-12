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
	$GLOBALS['TL_DCA']['tl_form_field']['palettes'][$key] = str_replace(';{expert_legend', ';{css_chooser_legend},cssPrimaryClass,cssCommonClasses,globalCommonClasses;{expert_legend', $value);	
}

$GLOBALS['TL_DCA']['tl_form_field']['fields']['cssPrimaryClass'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['cssPrimaryClass'],
	'inputType'               => 'select',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getPrimaryCssOptions'),
	'load_callback'			  => array('\Asc\Backend\ZyppyClass', 'loadPrimaryClassField'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['cssCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['cssCommonClasses'],
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getCommonClassOptions'),
	'load_callback'			  => array('\Asc\Backend\ZyppyClass', 'loadCommonClassField'),
	'eval'                    => array('multiple'=>true),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['globalCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['globalCommonClasses'],
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getGlobalCommonClassOptions'),
	'load_callback'			  => array('\Asc\Backend\ZyppyClass', 'loadGlobalCommonClassField'),
	'eval'                    => array('multiple'=>true),
	'sql'                     => "blob NULL"
);
