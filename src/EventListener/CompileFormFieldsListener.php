<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2018-2024 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */
 
 
namespace ZyppyClass\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\Form;
use Contao\StringUtil;

#[AsHook('compileFormFields')]
class CompileFormFieldsListener
{
    public function __invoke(array $arrFields, string $intFormId, Form $objForm): array
    {

		foreach($arrFields as $intIndex => $objFormField) {
			$strCssClass = $objFormField->class;
			$strCssClass .= ' ' .$objFormField->exclusiveClass;

			$arrCommon = StringUtil::deserialize($objFormField->commonClasses, true);
			if (!empty($arrCommon)) {
				$strCssClass .= ' ' .implode(' ', $arrCommon);
			}
			$strCssClass = str_replace('  ', ' ', $strCssClass);
			$strCssClass = trim($strCssClass);

			$arrGlobal = StringUtil::deserialize($objFormField->globalCommonClasses, true);
			if (!empty($arrGlobal)) {
				$strCssClass .= ' ' .implode(' ', $arrGlobal);
			}
			$strCssClass = str_replace('  ', ' ', $strCssClass);
			$strCssClass = trim($strCssClass);

			$arrTemp = explode(' ', $strCssClass);
			$arrClass = array();
			foreach ($arrTemp as $strClass) {
				if (!in_array($strClass, $arrClass) && trim($strClass) != '') {
					$arrClass[] = trim($strClass);
				}
			}
			$strCssClass = implode(' ', $arrClass);

			$objFormField->class .= ' ' .$strCssClass;
			$arrFields[$intIndex] = $objFormField;

		}

		return $arrFields;
	}
	
}
