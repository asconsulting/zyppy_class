<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

 
foreach ($GLOBALS['TL_DCA']['tl_article']['palettes'] as $key => $value) {
	$GLOBALS['TL_DCA']['tl_article']['palettes'][$key] = str_replace(';{expert_legend', ';{css_chooser_legend},cssChooser,commonClasses;{expert_legend', $value);	
}

$GLOBALS['TL_DCA']['tl_article']['fields']['cssChooser'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['cssChooser'],
	'inputType'               => 'select',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getCssOptions'),
	'sql'                     => "varchar(64) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_article']['fields']['commonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_article']['commonClasses'],
	'inputType'               => 'checkboxWizard',
	'options_callback'        => array('\Asc\Backend\ZyppyClass', 'getCommonClassOptions'),
	'eval'                    => array('multiple'=>true),
	'sql'                     => "blob NULL"
);
