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


class ZyppyPage extends Contao_Frontend
{

	public function generatePage($objPage, $objLayout, $objPageRegular)
	{
		$strCss = $objPage->cssClass;
		$strCss .= ' ' .$objPage->exclusiveClass;

		$arrCommon = \StringUtil::deserialize($objPage->commonClasses, true);
		if (!empty($arrCommon)) {
			$strCss .= ' ' .implode(' ', $arrCommon);
		}
		$strCss = str_replace('  ', ' ', $strCss);
		$strCss = trim($strCss);

		$arrGlobal = \StringUtil::deserialize($objPage->globalCommonClasses, true);
		if (!empty($arrGlobal)) {
			$strCss .= ' ' .implode(' ', $arrGlobal);
		}
		$strCss = str_replace('  ', ' ', $strCss);
		$strCss = trim($strCss);

		$arrTemp = explode(' ', $strCss);
		$arrClass = array();
		foreach ($arrTemp as $strClass) {
			if (!in_array($strClass, $arrClass) && trim($strClass) != '') {
				$arrClass[] = trim($strClass);
			}
		}
		$strCss = implode(' ', $arrClass);

		$objPage->cssClass = $strCss;
		die($strCss);
	}

}
