<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

 
namespace Asc\Backend;

class ZyppyClass extends \Backend
{
	public function getCssOptions(\Contao\DataContainer $dc) {
		$arrOptions = array();
		$strDefaultClasses = false;
		$strClasses = false;
		
		switch($dc->table) {
			case "tl_article":
				$strDefaultClasses = 'articleClassesDefault';
				$strClasses = 'articleClasses';
			break;
			
			case "tl_content":
				$strDefaultClasses = 'contentClassesDefault';
				$strClasses = 'contentClasses';
			break;
			
			case "tl_form_field":
				$strDefaultClasses = 'formFieldClassesDefault';
				$strClasses = 'formFieldClassesClasses';
			break;
			
			case "tl_form":
				$strDefaultClasses = 'formClassesDefault';
				$strClasses = 'formClasses';
			break;
			
			case "tl_module":
				$strDefaultClasses = 'moduleClassesDefault';
				$strClasses = 'moduleClasses';
			break;
			
			case "tl_page":
				$strDefaultClasses = 'moduleClassesDefault';
				$strClasses = 'moduleClasses';
			break;
		}
		
		if ($GLOBALS['TL_CONFIG'][$strDefaultClasses]) {
			$arrOptions[''] = '-';
		}
		if ($GLOBALS['TL_CONFIG'][$strClasses] != '') {
			foreach (explode(',', $GLOBALS['TL_CONFIG'][$strClasses]) as $key) {
				$arrOptions[$key] = $key;
			}
		}
		return $arrOptions;
	}
	
	public function getCommonClassOptions(\Contao\DataContainer $dc) {
		$arrOptions = array();
		if ($GLOBALS['TL_CONFIG']['commonClasses'] != '') {
			foreach (explode(',', $GLOBALS['TL_CONFIG']['commonClasses']) as $key) {
				$arrOptions[$key] = $key;
			}
		}
		return $arrOptions;
	}
}
