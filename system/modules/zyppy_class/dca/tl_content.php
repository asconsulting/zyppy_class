<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

  
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('\Asc\Backend\ZyppyClass', 'setupRequiredFields');
$GLOBALS['TL_DCA']['tl_content']['config']['onload_callback'][] = array('\Asc\Backend\ZyppyClass', 'hideUnconfigured');
 
foreach ($GLOBALS['TL_DCA']['tl_content']['palettes'] as $key => $value) {
	$GLOBALS['TL_DCA']['tl_content']['palettes'][$key] = str_replace(';{expert_legend', ';{class_legend},primaryClass,commonClasses,globalCommonClasses;{expert_legend', $value);	
}

$GLOBALS['TL_DCA']['tl_content']['fields']['primaryClass'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['primaryClass'],
	'inputType'               => 'select',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getPrimaryClassOptions'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['commonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['commonClasses'],
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getCommonClassOptions'),
	'eval'                    => array('multiple'=>true),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_content']['fields']['globalCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['globalCommonClasses'],
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getGlobalCommonClassOptions'),
	'eval'                    => array('multiple'=>true),
	'sql'                     => "blob NULL"
);
