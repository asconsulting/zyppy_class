<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

 
$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('\Asc\Backend\ZyppyClass', 'setupRequiredFields');
$GLOBALS['TL_DCA']['tl_form_field']['config']['onload_callback'][] = array('\Asc\Backend\ZyppyClass', 'hideUnconfigured');

foreach ($GLOBALS['TL_DCA']['tl_form_field']['palettes'] as $key => $value) {
	$GLOBALS['TL_DCA']['tl_form_field']['palettes'][$key] = str_replace(';{expert_legend', ';{class_legend},commonClasses,globalCommonClasses,exclusiveClass;{expert_legend', $value);	
}

$GLOBALS['TL_DCA']['tl_form_field']['fields']['exclusiveClass'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['exclusiveClass'],
	'inputType'               => 'select',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getExclusiveClassOptions'),
	'eval'					  => array('tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['commonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['commonClasses'],
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getCommonClassOptions'),
	'eval'                    => array('multiple'=>true, 'tl_class'=>'w50 wizard50'),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_form_field']['fields']['globalCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_form_field']['globalCommonClasses'],
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getGlobalCommonClassOptions'),
	'eval'                    => array('multiple'=>true, 'tl_class'=>'w50 wizard50'),
	'sql'                     => "blob NULL"
);
