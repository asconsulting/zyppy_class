<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

 
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = str_replace(';{global_legend', ';{css_chooser_legend},articleClasses,articleClassesDefault,contentClasses,contentClassesDefault,formFieldClasses,formFieldClassesDefault,formClasses,formClassesDefault,moduleClasses,moduleClassesDefault,pageClasses,pageClassesDefault,commonClasses;{global_legend', $GLOBALS['TL_DCA']['tl_settings']['palettes']['default']);

$GLOBALS['TL_DCA']['tl_settings']['fields']['articleClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['articleClasses'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['articleClassesDefault'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['articleClassesDefault'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['articleCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['articleCommonClasses'],
	'inputType'               => 'optionWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr long'),
	'sql'                     => "meduimtext NOT NULL default ''"
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
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['contentCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['contentCommonClasses'],
	'inputType'               => 'optionWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr long'),
	'sql'                     => "meduimtext NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['formFieldClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['formFieldClasses'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['formFieldClassesDefault'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['formFieldClassesDefault'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['formFieldCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['formFieldCommonClasses'],
	'inputType'               => 'optionWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr long'),
	'sql'                     => "meduimtext NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['formClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['formClasses'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['formClassesDefault'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['formClassesDefault'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['formCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['formCommonClasses'],
	'inputType'               => 'optionWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr long'),
	'sql'                     => "meduimtext NOT NULL default ''"
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
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['moduleCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['moduleCommonClasses'],
	'inputType'               => 'optionWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr long'),
	'sql'                     => "meduimtext NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['pageClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['pageClasses'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['pageClassesDefault'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['pageClassesDefault'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['pageCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['pageCommonClasses'],
	'inputType'               => 'optionWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr long'),
	'sql'                     => "meduimtext NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_settings']['fields']['commonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['commonClasses'],
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);
