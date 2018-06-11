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

class ZyppyArticleModel extends \Contao\ArticleModel
{

	public function __construct(Database\Result $objResult=null)
	{
		parent::__construct($objResult);
		
		$arrCss = deserialize($this->cssID, true);
		$arrCss[1] .= ' ' .$this->cssChoser;

		$arrCommon = deserialize($this->commonClasses);
		if (!empty($arrCommon)) {
			$arrCss[1] .= ' ' .implode(' ', $arrCommon);
		}
		$arrCss[1] = str_replace('  ', ' ', $arrCss[1]);
		$arrCss[1] = trim($arrCss[1]);
		
		$this->cssID = $arrCss;
	}

}
