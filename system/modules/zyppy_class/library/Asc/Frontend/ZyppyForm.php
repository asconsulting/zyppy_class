<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2022 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */



namespace Asc\Frontend;

use Contao\Frontend as Contao_Frontend;
use Contao\StringUtil;


class ZyppyForm extends Contao_Frontend
{

	public function compileFormFields(array $arrFields, $intFormId, $objForm)
	{

		foreach($arrFields as $intIndex => $objFormField) {
			$arrCss = StringUtil::deserialize($objFormField->cssID, true);
			$arrCss[1] .= ' ' .$objFormField->exclusiveClass;

			$arrCommon = StringUtil::deserialize($objFormField->commonClasses, true);
			if (!empty($arrCommon)) {
				$arrCss[1] .= ' ' .implode(' ', $arrCommon);
			}
			$arrCss[1] = str_replace('  ', ' ', $arrCss[1]);
			$arrCss[1] = trim($arrCss[1]);

			$arrGlobal = StringUtil::deserialize($objFormField->globalCommonClasses, true);
			if (!empty($arrGlobal)) {
				$arrCss[1] .= ' ' .implode(' ', $arrGlobal);
			}
			$arrCss[1] = str_replace('  ', ' ', $arrCss[1]);
			$arrCss[1] = trim($arrCss[1]);

			$arrTemp = explode(' ', $arrCss[1]);
			$arrClass = array();
			foreach ($arrTemp as $strClass) {
				if (!in_array($strClass, $arrClass) && trim($strClass) != '') {
					$arrClass[] = trim($strClass);
				}
			}
			$arrCss[1] = implode(' ', $arrClass);

			$objFormField->cssID = $arrCss;
			$arrFields[$intIndex] = $objFormField;
		
		}
		
		return $arrFields;
	}

}
