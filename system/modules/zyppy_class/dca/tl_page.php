<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

 
$GLOBALS['TL_DCA']['tl_page']['config']['onload_callback'][] = array('\Asc\Backend\ZyppyClass', 'setupRequiredFields');
$GLOBALS['TL_DCA']['tl_page']['config']['onload_callback'][] = array('\Asc\Backend\ZyppyClass', 'hideUnconfigured');

foreach ($GLOBALS['TL_DCA']['tl_page']['palettes'] as $key => $value) {
	$GLOBALS['TL_DCA']['tl_page']['palettes'][$key] = str_replace(';{expert_legend', ';{class_legend},commonClasses,globalCommonClasse,exclusiveClass;{expert_legend', $value);	
}

$GLOBALS['TL_DCA']['tl_page']['fields']['exclusiveClass'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['exclusiveClass'],
	'inputType'               => 'select',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getExclusiveClassOptions'),
	'eval'					  => array('tl_class'=>'w50 wizard50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['commonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['commonClasses'],
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getCommonClassOptions'),
	'eval'                    => array('multiple'=>true, 'tl_class'=>'w50 wizard50'),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_page']['fields']['globalCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_page']['globalCommonClasses'],
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getGlobalCommonClassOptions'),
	'eval'                    => array('multiple'=>true),
	'sql'                     => "blob NULL"
);
