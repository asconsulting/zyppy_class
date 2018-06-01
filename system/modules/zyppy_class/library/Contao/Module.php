<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

namespace Contao\Module;

abstract class ZyppyModule extends \Contao\Module
{
	/**
	 * Initialize the object
	 * @param object
	 * @param string
	 */
	public function __construct($objModule, $strColumn='main')
	{
		parent::__construct($objModule, $strColumn='main');

		$arrCss = deserialize($objModule->cssID, true);
		switch (get_class($objModule)) {
			case 'Contao\ArticleModel':
				$arrCss[1] .= ' zyppy_article ' .$this->cssChoser;
			break;
			
			default:
				$arrCss[1] .= ' ' .$this->cssChoser;
		 	break;
			
		}
		$arrCommon = deserialize($this->commonClasses);
		if (!empty($arrCommon)) {
			$arrCss[1] .= ' ' .implode(' ', $arrCommon);
		}
		$arrCss[1] = str_replace('  ', ' ', $arrCss[1]);
		$arrCss[1] = trim($arrCss[1]);
		
		$this->cssID = $arrCss;
	}
}
