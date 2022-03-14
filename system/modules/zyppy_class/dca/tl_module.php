<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2018-2022 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */



$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('ZyppyClass\Backend\ZyppyClass', 'setupRequiredFields');
$GLOBALS['TL_DCA']['tl_module']['config']['onload_callback'][] = array('ZyppyClass\Backend\ZyppyClass', 'hideUnconfigured');

foreach ($GLOBALS['TL_DCA']['tl_module']['palettes'] as $key => $value) {
	$GLOBALS['TL_DCA']['tl_module']['palettes'][$key] = str_replace(';{expert_legend', ';{class_legend},commonClasses,globalCommonClasses,exclusiveClass;{expert_legend', $value);
}

$GLOBALS['TL_DCA']['tl_module']['fields']['exclusiveClass'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['exclusiveClass'],
	'inputType'               => 'select',
	'options_callback'        => array('ZyppyClass\Backend\ZyppyClass', 'getExclusiveClassOptions'),
	'eval'					  => array('tl_class'=>'w50'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['commonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['commonClasses'],
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('ZyppyClass\Backend\ZyppyClass', 'getCommonClassOptions'),
	'eval'                    => array('multiple'=>true, 'tl_class'=>'w50 wizard50'),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['globalCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['globalCommonClasses'],
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('ZyppyClass\Backend\ZyppyClass', 'getGlobalCommonClassOptions'),
	'eval'                    => array('multiple'=>true, 'tl_class'=>'w50 wizard50'),
	'sql'                     => "blob NULL"
);
