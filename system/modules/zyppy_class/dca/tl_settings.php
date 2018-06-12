<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

 
$GLOBALS['TL_DCA']['tl_settings']['palettes']['default'] = str_replace(';{global_legend', ';{css_chooser_legend},articleClasses,articleClassesDefault,articleCommonClasses,contentClasses,contentClassesDefault,contentCommonClasses,formFieldClasses,formFieldClassesDefault,formFieldCommonClasses,formClasses,formClassesDefault,formCommonClasses,moduleClasses,moduleClassesDefault,moduleCommonClasses,pageClasses,pageClassesDefault,pageCommonClasses,commonClasses;{global_legend', $GLOBALS['TL_DCA']['tl_settings']['palettes']['default']);


/**
 * Article Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['articleClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['articleClasses'],
	'inputType'               => 'listWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "meduimtext NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['articleClassesRequired'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['articleClassesRequired'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['articleCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['articleCommonClasses'],
	'inputType'               => 'listWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "meduimtext NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['articleCommonRequired'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['articleCommonRequired'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);


/**
 * Content Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['contentClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['contentClasses'],
	'inputType'               => 'listWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "meduimtext NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['contentClassesRequired'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['contentClassesRequired'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['contentCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['contentCommonClasses'],
	'inputType'               => 'listWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "meduimtext NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['contentCommonRequired'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['contentCommonRequired'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);


/**
 * Form Field Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['formFieldClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['formFieldClasses'],
	'inputType'               => 'listWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "meduimtext NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['formFieldClassesRequired'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['formFieldClassesRequired'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['formFieldCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['formFieldCommonClasses'],
	'inputType'               => 'listWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "meduimtext NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['formFieldCommonRequired'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['formFieldCommonRequired'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);


/**
 * Form Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['formClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['formClasses'],
	'inputType'               => 'listWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "meduimtext NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['formClassesRequired'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['formClassesRequired'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['formCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['formCommonClasses'],
	'inputType'               => 'listWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "meduimtext NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['formCommonRequired'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['formCommonRequired'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);


/**
 * Module Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['moduleClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['moduleClasses'],
	'inputType'               => 'listWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "meduimtext NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['moduleClassesRequired'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['moduleClassesRequired'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['moduleCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['moduleCommonClasses'],
	'inputType'               => 'listWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "meduimtext NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['moduleCommonRequired'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['moduleCommonRequired'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);


/**
 * Page Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['pageClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['pageClasses'],
	'inputType'               => 'listWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "meduimtext NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['pageClassesRequired'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['pageClassesRequired'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['pageCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['pageCommonClasses'],
	'inputType'               => 'listWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "meduimtext NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['pageCommonRequired'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['pageCommonRequired'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);


/**
 * Global Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['globalCommonClasses'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['globalCommonClasses'],
	'inputType'               => 'listWizard',
	'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50'),
	'sql'                     => "varchar(255) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_settings']['fields']['globalCommonRequired'] = array(
	'label'                   => &$GLOBALS['TL_LANG']['tl_settings']['globalCommonRequired'],
	'inputType'               => 'checkbox',
	'eval'                    => array('tl_class'=>'w50 m12'),
	'sql'                     => "char(1) NOT NULL default ''"
);