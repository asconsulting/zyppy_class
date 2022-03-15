<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2018-2022 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */



namespace ZyppyClass\Frontend;

use Contao\Frontend as Contao_Frontend;
use Contao\StringUtil;


class ZyppyContent extends Contao_Frontend
{

	public function generateContent($objRow, $strBuffer, $objElement)
	{

		if (is_a($objElement, 'Contao\ContentModule')) {
			var_dump($objElement->commonClasses);
			echo "<hr>";
			var_dump($objElement->globalCommonClasses);
			echo "<hr>";
			var_dump($objRow->commonClasses);
			echo "<hr>";
			var_dump($objRow->globalCommonClasses);
			echo "<hr>";
			var_dump($objRow);
			echo "<hr>";
		}

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

		$arrRow = StringUtil::deserialize($objRow->cssID, true);
		$arrRow[1] .= ' ' .$objRow->exclusiveClass;

		$arrCommon = StringUtil::deserialize($objRow->commonClasses, true);
		if (!empty($arrCommon)) {
			$arrRow[1] .= ' ' .implode(' ', $arrCommon);
		}
		$arrRow[1] = str_replace('  ', ' ', $arrRow[1]);
		$arrRow[1] = trim($arrRow[1]);

		$arrGlobal = StringUtil::deserialize($objRow->globalCommonClasses, true);
		if (!empty($arrGlobal)) {
			$arrRow[1] .= ' ' .implode(' ', $arrGlobal);
		}
		$arrRow[1] = str_replace('  ', ' ', $arrRow[1]);
		$arrRow[1] = trim($arrRow[1]);	
		
		$arrTemp = explode(' ', $arrCss[1]);
		$arrClass = array();
		foreach ($arrTemp as $strClass) {
			if (!in_array($strClass, $arrClass) && trim($strClass) != '') {
				$arrClass[] = trim($strClass);
			}
		}
		
		$arrTemp = explode(' ', $arrRow[1]);
		foreach ($arrRow as $strClass) {
			if (!in_array($strClass, $arrClass) && trim($strClass) != '') {
				$arrClass[] = trim($strClass);
			}
		}
		$arrCss[1] = implode(' ', $arrClass);

		$objElement->cssID = $arrCss;

		return $objElement->generate();
	}

}
