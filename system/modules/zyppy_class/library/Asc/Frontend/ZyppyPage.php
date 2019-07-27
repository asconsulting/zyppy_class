<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

 
namespace Asc\Frontend;

class ZyppyPage extends \Frontend
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
		
		
		var_dump($objPage);
		exit();
	}

}
