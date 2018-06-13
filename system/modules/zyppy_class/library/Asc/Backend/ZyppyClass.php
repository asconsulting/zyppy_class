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
	public function getPrimaryClassOptions(\Contao\DataContainer $dc) {
		$arrOptions = array();
		$strClassRequired = false;
		$strClasses = false;
		
		switch($dc->table) {
			case "tl_article":
				$strClassRequired = 'articleClassesRequired';
				$strClasses = 'articleClasses';
			break;
			
			case "tl_content":
				$strClassRequired = 'contentClassesRequired';
				$strClasses = 'contentClasses';
			break;
			
			case "tl_form_field":
				$strClassRequired = 'formFieldClassesRequired';
				$strClasses = 'formFieldClasses';
			break;
			
			case "tl_form":
				$strClassRequired = 'formClassesRequired';
				$strClasses = 'formClasses';
			break;
			
			case "tl_module":
				$strClassRequired = 'moduleClassesRequired';
				$strClasses = 'moduleClasses';
			break;
			
			case "tl_page":
				$strClassRequired = 'pageClassesRequired';
				$strClasses = 'pageClasses';
			break;
		}
		
		$arrOptions = array();
		if (!$GLOBALS['TL_CONFIG'][$strClassRequired]) {
			$arrOptions[''] = '-';
		}

		if ($GLOBALS['TL_CONFIG'][$strClasses] != '') {
			$arrTemp = \StringUtil::deserialize($GLOBALS['TL_CONFIG'][$strClasses], true);
			foreach ($arrTemp as $arrOption) {
				$arrOptions[$arrOption['key']] = $arrOption['value'];
			}
		}
		return $arrOptions;
	}
	
	public function getCommonClassOptions(\Contao\DataContainer $dc) {
		$strCommonClasses = false;
		
		switch($dc->table) {
			case "tl_article":
				$strCommonClasses = 'articleCommonClasses';
			break;
			
			case "tl_content":
				$strCommonClasses = 'contentCommonClasses';
			break;
			
			case "tl_form_field":
				$strCommonClasses = 'formFieldCommonClasses';
			break;
			
			case "tl_form":
				$strCommonClasses = 'formCommonClasses';
			break;
			
			case "tl_module":
				$strCommonClasses = 'moduleCommonClasses';
			break;
			
			case "tl_page":
				$strCommonClasses = 'pageCommonClasses';
			break;
		}

		$arrOptions = array();
		if ($GLOBALS['TL_CONFIG'][$strCommonClasses] != '') {
			$arrTemp = \StringUtil::deserialize($GLOBALS['TL_CONFIG'][$strCommonClasses], true);
			foreach ($arrTemp as $arrOption) {
				$arrOptions[$arrOption['key']] = $arrOption['value'];
			}
		}
		return $arrOptions;
	}
	
	public function getGlobalCommonClassOptions(\Contao\DataContainer $dc) {
		$arrOptions = array();
		
		if ($GLOBALS['TL_CONFIG']['globalCommonClasses'] != '') {
			$arrTemp = \StringUtil::deserialize($GLOBALS['TL_CONFIG']['globalCommonClasses'], true);
			foreach ($arrTemp as $arrOption) {
				$arrOptions[$arrOption['key']] = $arrOption['value'];
			}
		}
		return $arrOptions;
	}
	
	public function setupRequiredFields(\Contao\DataContainer $dc)
	{
		
		switch($dc->table) {
			case "tl_article":
				$strClassRequired 	= 'articleClassesRequired';
				$strCommonRequired	= 'articleCommonRequired';
			break;
			
			case "tl_content":
				$strClassRequired 	= 'contentClassesRequired';
				$strCommonRequired	= 'contentCommonRequired';
			break;
			
			case "tl_form_field":
				$strClassRequired 	= 'formFieldClassesRequired';
				$strCommonRequired	= 'formFieldCommonRequired';
			break;
			
			case "tl_form":
				$strClassRequired 	= 'formClassesRequired';
				$strCommonRequired	= 'formCommonRequired';
			break;
			
			case "tl_module":
				$strClassRequired 	= 'moduleClassesRequired';
				$strCommonRequired	= 'moduleCommonRequired';
			break;
			
			case "tl_page":
				$strClassRequired 	= 'pageClassesRequired';
				$strCommonRequired	= 'pageCommonRequired';
			break;
		}
		
		if ($GLOBALS['TL_CONFIG'][$strClassRequired]) {
			$GLOBALS['TL_DCA'][$dc->table]['fields']['primaryClass']['eval']['mandatory'] = true;
		}
		
		if ($GLOBALS['TL_CONFIG'][$strCommonRequired]) {
			$GLOBALS['TL_DCA'][$dc->table]['fields']['commonClasses']['eval']['mandatory'] = true;
		}
		
		if ($GLOBALS['TL_CONFIG']['globalCommonRequired']) {
			$GLOBALS['TL_DCA'][$dc->table]['fields']['globalCommonClasses']['eval']['mandatory'] = true;
		}
	}
	
	public function hideUnconfigured(\Contao\DataContainer $dc)
	{
		switch($dc->table) {
			case "tl_article":
				$strPrimaryClasses = 'articleClasses';
				$strCommonClasses = 'articleCommonClasses';
			break;
			
			case "tl_content":
				$strPrimaryClasses = 'contentClasses';
				$strCommonClasses = 'contentCommonClasses';
			break;
			
			case "tl_form_field":
				$strPrimaryClasses = 'formFieldClasses';
				$strCommonClasses = 'formFieldCommonClasses';
			break;
			
			case "tl_form":
				$strPrimaryClasses = 'formClasses';
				$strCommonClasses = 'formCommonClasses';
			break;
			
			case "tl_module":
				$strPrimaryClasses = 'moduleClasses';
				$strCommonClasses = 'moduleCommonClasses';
			break;
			
			case "tl_page":
				$strPrimaryClasses = 'pageClasses';
				$strCommonClasses = 'pageCommonClasses';
			break;
		}
		
		$arrPrimaryClassOptions = \StringUtil::deserialize($GLOBALS['TL_CONFIG'][$strPrimaryClasses], true);
		$arrCommonClassOptions = \StringUtil::deserialize($GLOBALS['TL_CONFIG'][$strCommonClasses], true);
		$arrGlobalCommonClassOptions = \StringUtil::deserialize($GLOBALS['TL_CONFIG']['globalCommonClasses'], true);
		
		var_dump($arrCommonClassOptions);
		echo "<br><br>";
		var_dump($GLOBALS['TL_CONFIG'][$strCommonClasses]);
		exit();
		
		
		if (!$GLOBALS['TL_CONFIG'][$strPrimaryClasses]) {
			$GLOBALS['TL_DCA'][$dc->table]['fields']['primaryClass']['inputType'] = false;
		}
				
		if (!$GLOBALS['TL_CONFIG'][$strCommonClasses]) {
			$GLOBALS['TL_DCA'][$dc->table]['fields']['commonClasses']['inputType'] = false;
		}
		
		if (!$GLOBALS['TL_CONFIG']['globalCommonClasses']) {
			$GLOBALS['TL_DCA'][$dc->table]['fields']['globalCommonClasses']['inputType'] = false;
		}
	}
}
