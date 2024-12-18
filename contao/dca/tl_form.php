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

$GLOBALS['TL_DCA']['tl_form']['fields']['exclusiveClass'] = [
    'inputType' => 'select',
    'eval' => ['tl_class' => 'w50'],
	'sql' => ['type' => 'string', 'length' => 64, 'default' => ''],
];

$GLOBALS['TL_DCA']['tl_form']['fields']['commonClasses'] = [
    'inputType' => 'checkboxWizard',
    'eval' => ['multiple' => true, 'tl_class' => 'w50 wizard50'],
    'sql' => ['type' => 'blob', 'notnull' => false],
];

$GLOBALS['TL_DCA']['tl_form']['fields']['globalCommonClasses'] = [
    'inputType' => 'checkboxWizard',
    'eval' => ['multiple' => true, 'tl_class' => 'w50 wizard50'],
    'sql' => ['type' => 'blob', 'notnull' => false],
];

$objPalette = PaletteManipulator::create()
    ->addLegend('class_legend', 'expert_legend', PaletteManipulator::POSITION_BEFORE, true)
    ->addField('commonClasses', 'class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('globalCommonClasses', 'class_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('exclusiveClass', 'class_legend', PaletteManipulator::POSITION_APPEND)
;
	
foreach ($GLOBALS['TL_DCA']['tl_form']['palettes'] as $key => $value) {
	if (!is_array($value)) {
		$objPalette->applyToPalette($key, 'tl_form');
	}
}
