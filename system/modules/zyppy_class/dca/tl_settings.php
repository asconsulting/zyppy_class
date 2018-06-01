<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

 
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = str_replace(';{global_legend', ';{css_chooser_legend},articleClasses,articleClassesDefault,contentClasses,contentClassesDefault,moduleClasses,moduleClassesDefault,commonClasses;{global_legend', $GLOBALS['TL_DCA']['tl_settings']['palettes']['default']);

$GLOBALS['TL_DCA']['tl_settings']['fields']['articleClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['articleClasses'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['articleClassesDefault'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['articleClassesDefault'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['contentClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['contentClasses'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['contentClassesDefault'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['contentClassesDefault'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['moduleClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['moduleClasses'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['moduleClassesDefault'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['moduleClassesDefault'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['commonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['commonClasses'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);
