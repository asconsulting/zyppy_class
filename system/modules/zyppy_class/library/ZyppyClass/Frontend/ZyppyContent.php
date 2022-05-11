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

use Contao\ContentElement;
use Contao\Frontend as Contao_Frontend;
use Contao\ModuleModel;
use Contao\StringUtil;


class ZyppyContent extends Contao_Frontend
{

	public function generateContent($objRow, $strBuffer, $objElement)
	{
		echo get_class($objElement) ."<hr>"; 
		
		if (is_a($objElement, 'Isotope\Model\ProductCollection') || is_a($objElement, 'Isotope\Model\ProductCollection\Order') || is_a($objElement, 'Isotope\Model\ProductCollection\Cart') || is_a($objElement, 'Contao\ContentModule')) {
			return $strBuffer;
		}

		if (is_a($objElement, 'Contao\ContentModule')) {
			$objRow = ModuleModel::findByPk($objRow->module);
		}

		$arrCss = StringUtil::deserialize($objElement->cssID, true);
		if (!is_array($arrCss)) {
			$arrCss = array('', '');
		}
		if (!array_key_exists(1, $arrCss)) {
			$arrCss[1] = '';
		}
		
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
		if (!is_array($arrRow)) {
			$arrRow = array('', '');
		}
		if (!array_key_exists(1, $arrRow)) {
			$arrRow[1] = '';
		}
		
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
		
		if (is_a($objElement, 'Contao\ContentImage')) {
			$strClass = ContentElement::findClass($objRow->type);
			$objRow->typePrefix = 'ce_';
			$objRow->cssID = $arrCss;
			$objElement = new $strClass($objRow, null);
		} else if (is_a($objElement, 'Contao\ContentDownload')) {
			$strClass = ContentElement::findClass($objRow->type);
			$objRow->typePrefix = 'ce_';
			$objRow->cssID = $arrCss;
			$objElement = new $strClass($objRow, null);
		} else {
			$objElement->cssID = $arrCss;
		}
		return $objElement->generate();
	}

}
