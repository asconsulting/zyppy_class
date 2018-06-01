<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

namespace Asc;

use \Contao\ContentElement as ContaoContentElement;


abstract class ContentElement extends ContaoContentElement
{

	public function __construct($objElement, $strColumn='main')
	{
		parent::__construct($objElement, $strColumn='main');

		$arrCss = deserialize($objElement->cssID, true);
		switch (get_class($objElement)) {
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
