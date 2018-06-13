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
use Contao\FormModel;
use Contao\ModuleModel;

class ZyppyContentModel extends \Contao\ContentModel
{

	public function __construct(Database\Result $objResult=null)
	{
		parent::__construct($objResult);
		
		$arrCss = \StringUtil::deserialize($this->cssID, true);
		if ($this->type == 'module') {
			$objModule = ModuleModel::findByPk($this->module);
			if ($objModule) {
				$arrModuleCss = \StringUtil::deserialize($objModule->cssID, true);
				$arrModuleCss[1] .= ' ' .$objModule->primaryClass;

				$arrCommon = \StringUtil::deserialize($objModule->commonClasses, true);
				if (!empty($arrCommon)) {
					$arrModuleCss[1] .= ' ' .implode(' ', $arrCommon);
				}
				$arrModuleCss[1] = str_replace('  ', ' ', $arrModuleCss[1]);
				$arrModuleCss[1] .= trim($arrModuleCss[1]);
				
				$arrCommon = \StringUtil::deserialize($objModule->globalCommonClasses, true);
				if (!empty($arrCommon)) {
					$arrModuleCss[1] .= ' ' .implode(' ', $arrCommon);
				}
				$arrModuleCss[1] = str_replace('  ', ' ', $arrModuleCss[1]);
				$arrCss[1] .= trim($arrModuleCss[1]);
			}
		}

		if ($this->type == 'form') {
			$objForm = FormModel::findByPk($this->form);
			if ($objForm) {
				$arrFormCss = \StringUtil::deserialize($objForm->cssID, true);
				$arrFormCss[1] .= ' ' .$objForm->primaryClass;

				$arrCommon = \StringUtil::deserialize($objForm->commonClasses, true);
				if (!empty($arrCommon)) {
					$arrFormCss[1] .= ' ' .implode(' ', $arrCommon);
				}
				$arrFormCss[1] = str_replace('  ', ' ', $arrFormCss[1]);
				$arrFormCss[1] .= trim($arrFormCss[1]);
				
				$arrCommon = \StringUtil::deserialize($objForm->globalCommonClasses, true);
				if (!empty($arrCommon)) {
					$arrFormCss[1] .= ' ' .implode(' ', $arrCommon);
				}
				$arrFormCss[1] = str_replace('  ', ' ', $arrFormCss[1]);
				$arrCss[1] .= trim($arrFormCss[1]);
			}
		}
		
		$arrCss[1] .= ' ' .$this->primaryClass;

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
