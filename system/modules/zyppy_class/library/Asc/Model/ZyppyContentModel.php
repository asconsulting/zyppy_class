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
				$arrModuleCss[1] .= ' zyppy_module ' .$objModule->cssChooser;

				$arrCommon = \StringUtil::deserialize($objModule->commonClasses, true);
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
				$arrFormCss[1] .= ' zyppy_module ' .$objForm->cssChooser;

				$arrCommon = \StringUtil::deserialize($objForm->commonClasses, true);
				if (!empty($arrCommon)) {
					$arrFormCss[1] .= ' ' .implode(' ', $arrCommon);
				}
				$arrFormCss[1] = str_replace('  ', ' ', $arrFormCss[1]);
				$arrCss[1] .= trim($arrFormCss[1]);
			}
		}
		
		$arrCss[1] .= ' zyppy zyppy_content ' .$this->cssChooser;

		$arrCommon = \StringUtil::deserialize($this->commonClasses, true);
		if (!empty($arrCommon)) {
			$arrCss[1] .= ' ' .implode(' ', $arrCommon);
		}
		$arrCss[1] = str_replace('  ', ' ', $arrCss[1]);
		$arrCss[1] = trim($arrCss[1]);
		
		$this->cssID = $arrCss;
	}

}
