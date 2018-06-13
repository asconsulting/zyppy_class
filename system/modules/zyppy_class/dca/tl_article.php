<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

  
$GLOBALS['TL_DCA']['tl_article']['config']['onload_callback'][] = array('\Asc\Backend\ZyppyClass', 'setupRequiredFields');
$GLOBALS['TL_DCA']['tl_article']['config']['onload_callback'][] = array('\Asc\Backend\ZyppyClass', 'hideUnconfigured');

foreach ($GLOBALS['TL_DCA']['tl_article']['palettes'] as $key => $value) {
	$GLOBALS['TL_DCA']['tl_article']['palettes'][$key] = str_replace(';{expert_legend', ';{class_legend},commonClasses,globalCommonClasses,exclusiveClass;{expert_legend', $value);	
}

$GLOBALS['TL_DCA']['tl_article']['fields']['exclusiveClass'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['exclusiveClass'],
	'inputType'               => 'select',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getExclusiveClassOptions'),
	'eval'					  => array('tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['commonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['commonClasses'],
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getCommonClassOptions'),
	'eval'                    => array('multiple'=>true, 'tl_class'=>'w50 wizard50'),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['globalCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['globalCommonClasses'],
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getGlobalCommonClassOptions'),
	'eval'                    => array('multiple'=>true, 'tl_class'=>'w50 wizard50'),
	'sql'                     => "blob NULL"
);
