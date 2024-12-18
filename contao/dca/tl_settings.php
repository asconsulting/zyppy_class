<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2018-2024 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */


use Contao\CoreBundle\DataContainer\PaletteManipulator;

/**
 * Global Fields
 */
$GLOBALS['TL_DCA']['tl_settings']['fields']['globalCommonClasses'] = [
    'inputType' => 'keyValueWizard',
    'eval' => ['tl_class' => 'clr w50 wizard50'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['globalCommonRequired'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr w50 m12'],
];


/**
 * Article Fields
 */ 
$GLOBALS['TL_DCA']['tl_settings']['fields']['articleClasses'] = [
    'inputType' => 'keyValueWizard',
    'eval' => ['tl_class' => 'clr w50 wizard50'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['articleClassesRequired'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr w50 m12'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['articleCommonClasses'] = [
    'inputType' => 'keyValueWizard',
    'eval' => ['tl_class' => 'w50 wizard50'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['articleCommonRequired'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50 m12'],
];


/**
 * Content Fields
 */ 
$GLOBALS['TL_DCA']['tl_settings']['fields']['contentClasses'] = [
    'inputType' => 'keyValueWizard',
    'eval' => ['tl_class' => 'clr w50 wizard50'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['contentClassesRequired'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr w50 m12'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['contentCommonClasses'] = [
    'inputType' => 'keyValueWizard',
    'eval' => ['tl_class' => 'w50 wizard50'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['contentCommonRequired'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50 m12'],
];


/**
 *  Form Fields
 */ 
$GLOBALS['TL_DCA']['tl_settings']['fields']['formClasses'] = [
    'inputType' => 'keyValueWizard',
    'eval' => ['tl_class' => 'clr w50 wizard50'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['formClassesRequired'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr w50 m12'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['formCommonClasses'] = [
    'inputType' => 'keyValueWizard',
    'eval' => ['tl_class' => 'w50 wizard50'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['formCommonRequired'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50 m12'],
];


/**
 *  Form Field Fields
 */ 
$GLOBALS['TL_DCA']['tl_settings']['fields']['formFieldClasses'] = [
    'inputType' => 'keyValueWizard',
    'eval' => ['tl_class' => 'clr w50 wizard50'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['formFieldClassesRequired'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr w50 m12'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['formFieldCommonClasses'] = [
    'inputType' => 'keyValueWizard',
    'eval' => ['tl_class' => 'w50 wizard50'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['formFieldCommonRequired'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50 m12'],
];


/**
 *  Module Fields
 */ 
$GLOBALS['TL_DCA']['tl_settings']['fields']['moduleClasses'] = [
    'inputType' => 'keyValueWizard',
    'eval' => ['tl_class' => 'clr w50 wizard50'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['moduleClassesRequired'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr w50 m12'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['moduleCommonClasses'] = [
    'inputType' => 'keyValueWizard',
    'eval' => ['tl_class' => 'w50 wizard50'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['moduleCommonRequired'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50 m12'],
];


/**
 *  Page Fields
 */ 
$GLOBALS['TL_DCA']['tl_settings']['fields']['pageClasses'] = [
    'inputType' => 'keyValueWizard',
    'eval' => ['tl_class' => 'clr w50 wizard50'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['pageClassesRequired'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'clr w50 m12'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['pageCommonClasses'] = [
    'inputType' => 'keyValueWizard',
    'eval' => ['tl_class' => 'w50 wizard50'],
];

$GLOBALS['TL_DCA']['tl_settings']['fields']['pageCommonRequired'] = [
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w50 m12'],
];

/*
PaletteManipulator::create()
    ->addLegend('zyppy_global_class_legend', null, PaletteManipulator::POSITION_AFTER, true)
    ->addField('globalCommonClasses', 'zyppy_global_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('globalCommonRequired', 'zyppy_global_class_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('zyppy_page_class_legend', null, PaletteManipulator::POSITION_AFTER, true)
    ->addField('pageClasses', 'zyppy_page_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('pageCommonClasses', 'zyppy_page_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('pageClassesRequired', 'zyppy_page_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('pageCommonRequired', 'zyppy_page_class_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('zyppy_article_class_legend', null, PaletteManipulator::POSITION_AFTER, true)
    ->addField('articleClasses', 'zyppy_article_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('articleCommonClasses', 'zyppy_article_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('articleClassesRequired', 'zyppy_article_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('articleCommonRequired', 'zyppy_article_class_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('zyppy_content_class_legend', null, PaletteManipulator::POSITION_AFTER, true)
    ->addField('contentClasses', 'zyppy_content_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('contentCommonClasses', 'zyppy_content_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('contentClassesRequired', 'zyppy_content_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('contentCommonRequired', 'zyppy_content_class_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('zyppy_module_class_legend', null, PaletteManipulator::POSITION_AFTER, true)
    ->addField('moduleClasses', 'zyppy_module_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('moduleCommonClasses', 'zyppy_module_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('moduleClassesRequired', 'zyppy_module_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('moduleCommonRequired', 'zyppy_module_class_legend', PaletteManipulator::POSITION_APPEND)

    ->addLegend('zyppy_form_class_legend', null, PaletteManipulator::POSITION_AFTER, true)
    ->addField('formClasses', 'zyppy_form_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('formCommonClasses', 'zyppy_form_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('formClassesRequired', 'zyppy_form_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('formCommonRequired', 'zyppy_form_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('formFieldClasses', 'zyppy_form_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('formFieldCommonClasses', 'zyppy_form_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('formFieldClassesRequired', 'zyppy_form_class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('formFieldCommonRequired', 'zyppy_form_class_legend', PaletteManipulator::POSITION_APPEND)

	->applyToPalette('default', 'tl_settings')
;
*/