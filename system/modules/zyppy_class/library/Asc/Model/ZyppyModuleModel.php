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

class ZyppyModuleModel extends \Contao\ModuleModel
{

	public function __construct(Database\Result $objResult=null)
	{
		parent::__construct($objResult);

		$arrCss = \StringUtil::deserialize($this->cssID, true);
		$arrCss[1] .= ' ' .$this->exclusiveClass;

		$arrCommon = \StringUtil::deserialize($this->commonClasses, true);
		if (!empty($arrCommon)) {
			$arrCss[1] .= ' ' .implode(' ', $arrCommon);
		}
		$arrCss[1] = str_replace('  ', ' ', $arrCss[1]);
		$arrCss[1] = trim($arrCss[1]);

		$arrGlobal = \StringUtil::deserialize($this->globalCommonClasses, true);
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
		
		$this->cssID = $arrCss;
	}

}
