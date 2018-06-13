<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

namespace Asc\Model;

use Contao\Database;

class ZyppyFormFieldModel extends \Contao\FormFieldModel
{

	public function __construct(Database\Result $objResult=null)
	{
		parent::__construct($objResult);
		
		$strCss = $this->class;
		$strCss .= ' ' .$this->primarClass;

		$arrCommon = \StringUtil::deserialize($this->commonClasses, true);
		if (!empty($arrCommon)) {
			$strCss .= ' ' .implode(' ', $arrCommon);
		}
		$strCss = str_replace('  ', ' ', $strCss);
		$strCss = trim($strCss);

		$arrGlobal = \StringUtil::deserialize($this->globalCommonClasses, true);
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
		
		$this->class = $strCss;
	}

}
