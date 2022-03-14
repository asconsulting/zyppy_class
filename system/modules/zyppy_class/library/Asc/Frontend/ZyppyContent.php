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


class ZyppyContent extends Contao_Frontend
{

	public function generateContent($objRow, $strBuffer, $objElement)
	{

		$arrCss = StringUtil::deserialize($objElement->cssID, true);
		$arrCss[1] .= ' ' .$objElement->exclusiveClass;

		$arrCommon = StringUtil::deserialize($objElement->commonClasses, true);
		if (!empty($arrCommon)) {
			$arrCss[1] .= ' ' .implode(' ', $arrCommon);
		}
		$arrCss[1] = str_replace('  ', ' ', $arrCss[1]);
		$arrCss[1] = trim($arrCss[1]);

		$arrGlobal = StringUtil::deserialize($objElement->globalCommonClasses, true);
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

		$objElement->cssID = $arrCss;
		
		return $objElement->generate();
	}

}
