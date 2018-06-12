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
use Contao\ModuleModel;

class ZyppyContentModel extends \Contao\ContentModel
{

	public function __construct(Database\Result $objResult=null)
	{
		parent::__construct($objResult);
		
		if ($this->type == 'module') {
			$objModule = ModuleModel::findByPk($this->module);
			if ($objModule) {
				$arrCss = \StringUtil::deserialize($objModule->cssID, true);
				$arrCss[1] .= ' zyppy_module ' .$objModule->cssChooser;

				$arrCommon = \StringUtil::deserialize($objModule->commonClasses, true);
				if (!empty($arrCommon)) {
					$arrCss[1] .= ' ' .implode(' ', $arrCommon);
				}
				$arrCss[1] = str_replace('  ', ' ', $arrCss[1]);
				$arrCss[1] = trim($arrCss[1]);
			}
			var_dump($this);
			echo "<br><hr><br><br>";
			var_dump($objModule);
			echo "<br><hr><br><br>";
		}
		
		$arrCss = \StringUtil::deserialize($this->cssID, true);
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
