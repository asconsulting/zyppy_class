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

class ZyppyFormModel extends \Contao\FormModel
{

	public function __construct(Database\Result $objResult=null)
	{
		parent::__construct($objResult);

		var_dump($this->attributes);
		
		$arrCss = \StringUtil::deserialize($this->attributes, true);
		//$arrCss[1] .= ' zyppy zyppy_form ' .$this->cssChooser;

		exit();
		
		$arrCommon = \StringUtil::deserialize($this->commonClasses, true);
		if (!empty($arrCommon)) {
			$arrCss[1] .= ' ' .implode(' ', $arrCommon);
		}
		$arrCss[1] = str_replace('  ', ' ', $arrCss[1]);
		$arrCss[1] = trim($arrCss[1]);
		
		$this->attributes = $arrCss;
	}

}
