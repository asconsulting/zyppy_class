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
				$strClassField 		= 'articleClasses';
				$strClassRequired 	= 'articleClassesRequired';
			break;
			
			case "tl_content":
				$strClassField 		= 'contentClasses';
				$strClassRequired 	= 'contentClassesRequired';
			break;
			
			case "tl_form_field":
				$strClassField 		= 'formFieldClasses';
				$strClassRequired 	= 'formFieldClassesRequired';
			break;
			
			case "tl_form":
				$strClassField 		= 'formClasses';
				$strClassRequired 	= 'formClassesRequired';
			break;
			
			case "tl_module":
				$strClassField 		= 'moduleClasses';
				$strClassRequired 	= 'moduleClassesRequired';
			break;
			
			case "tl_page":
				$strClassField 		= 'pageClasses';
				$strClassRequired 	= 'pageClassesRequired';
			break;
		}
		
		if ($GLOBALS['TL_CONFIG'][$strClassRequired]) {
			$GLOBALS['TL_DCA'][$dc->table]['fields'][$strClassField]['eval']['mandatory'] = true;
		}
		
		//echo "loadPrimaryClassField()<br>";
		//echo "<br>";
		//var_dump($dc->table);
		//exit();
	}
	
	public function loadPrimaryClassField($varValue, \Contao\DataContainer $dc)
	{
		switch($dc->table) {
			case "tl_article":
				$strClassField 		= 'articleClasses';
				$strClassRequired 	= 'articleClassesRequired';
			break;
			
			case "tl_content":
				$strClassField 		= 'contentClasses';
				$strClassRequired 	= 'contentClassesRequired';
			break;
			
			case "tl_form_field":
				$strClassField 		= 'formFieldClasses';
				$strClassRequired 	= 'formFieldClassesRequired';
			break;
			
			case "tl_form":
				$strClassField 		= 'formClasses';
				$strClassRequired 	= 'formClassesRequired';
			break;
			
			case "tl_module":
				$strClassField 		= 'moduleClasses';
				$strClassRequired 	= 'moduleClassesRequired';
			break;
			
			case "tl_page":
				$strClassField 		= 'pageClasses';
				$strClassRequired 	= 'pageClassesRequired';
			break;
		}
		
		if ($GLOBALS['TL_CONFIG'][$strClassRequired]) {
			$GLOBALS['TL_DCA'][$dc->table]['fields'][$strClassField]['eval']['mandatory'] = true;
		}
		
		//echo "loadPrimaryClassField()<br>";
		//echo "<br>";
		//var_dump($dc->table);
		//exit();
	}
	
	public function loadCommonClassField($varValue, \Contao\DataContainer $dc)
	{
		switch($dc->table) {
			case "tl_article":
				$strClassField 		= 'articleClasses';
				$strClassRequired 	= 'articleClassesRequired';
			break;
			
			case "tl_content":
				$strClassField 		= 'contentClasses';
				$strClassRequired 	= 'contentClassesRequired';
			break;
			
			case "tl_form_field":
				$strClassField 		= 'formFieldClasses';
				$strClassRequired 	= 'formFieldClassesRequired';
			break;
			
			case "tl_form":
				$strClassField 		= 'formClasses';
				$strClassRequired 	= 'formClassesRequired';
			break;
			
			case "tl_module":
				$strClassField 		= 'moduleClasses';
				$strClassRequired 	= 'moduleClassesRequired';
			break;
			
			case "tl_page":
				$strClassField 		= 'pageClasses';
				$strClassRequired 	= 'pageClassesRequired';
			break;
		}
		
		echo "loadCommonClassField()<br>";
		echo "<br>";
		var_dump($dc->table);
		exit();
	}
	
	public function loadGlobalCommonClassField($varValue, \Contao\DataContainer $dc)
	{
		switch($dc->table) {
			case "tl_article":
				$strClassField 		= 'articleClasses';
				$strClassRequired 	= 'articleClassesRequired';
			break;
			
			case "tl_content":
				$strClassField 		= 'contentClasses';
				$strClassRequired 	= 'contentClassesRequired';
			break;
			
			case "tl_form_field":
				$strClassField 		= 'formFieldClasses';
				$strClassRequired 	= 'formFieldClassesRequired';
			break;
			
			case "tl_form":
				$strClassField 		= 'formClasses';
				$strClassRequired 	= 'formClassesRequired';
			break;
			
			case "tl_module":
				$strClassField 		= 'moduleClasses';
				$strClassRequired 	= 'moduleClassesRequired';
			break;
			
			case "tl_page":
				$strClassField 		= 'pageClasses';
				$strClassRequired 	= 'pageClassesRequired';
			break;
		}
		
		
		echo "loadGlobalCommonClassField()<br>";
		echo "<br>";
		var_dump($dc->table);
		exit();
	}
	
	public function loadDca(\Contao\DataContainer $dc) {
		echo "Load DCA<br>";
		echo "<br>";
		var_dump($dc->table);
		exit();
	}
	
}
