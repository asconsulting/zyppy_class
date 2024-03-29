<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2018-2022 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */



namespace ZyppyClass\Backend;

use Contao\Backend as Contao_Backend;
use Contao\Config;
use Contao\DataContainer;
use Contao\StringUtil;


class ZyppyClass extends Contao_Backend
{
	public function getExclusiveClassOptions(DataContainer $dc) {
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
		if (!Config::get($strClassRequired)) {
			$arrOptions[''] = '-';
		}

		if (Config::get($strClasses) != '') {
			$arrTemp = StringUtil::deserialize(Config::get($strClasses), true);
			foreach ($arrTemp as $arrOption) {
				$arrOptions[$arrOption['key']] = $arrOption['value'];
			}
		}
		return $arrOptions;
	}

	public function getCommonClassOptions(DataContainer $dc) {
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
		if (Config::get($strCommonClasses) != '') {
			$arrTemp = StringUtil::deserialize(Config::get($strCommonClasses), true);
			foreach ($arrTemp as $arrOption) {
				$arrOptions[$arrOption['key']] = $arrOption['value'];
			}
		}
		return $arrOptions;
	}

	public function getGlobalCommonClassOptions(DataContainer $dc) {
		$arrOptions = array();

		if (Config::get('globalCommonClasses') != '') {
			$arrTemp = StringUtil::deserialize(Config::get('globalCommonClasses'), true);
			foreach ($arrTemp as $arrOption) {
				$arrOptions[$arrOption['key']] = $arrOption['value'];
			}
		}
		return $arrOptions;
	}

	public function setupRequiredFields(DataContainer $dc)
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

		if (Config::get($strClassRequired)) {
			$GLOBALS['TL_DCA'][$dc->table]['fields']['exclusiveClass']['eval']['mandatory'] = true;
		}

		if (Config::get($strCommonRequired)) {
			$GLOBALS['TL_DCA'][$dc->table]['fields']['commonClasses']['eval']['mandatory'] = true;
		}

		if (Config::get('globalCommonRequired')) {
			$GLOBALS['TL_DCA'][$dc->table]['fields']['globalCommonClasses']['eval']['mandatory'] = true;
		}
	}

	public function hideUnconfigured(DataContainer $dc)
	{
		switch($dc->table) {
			case "tl_article":
				$strExclusiveClasses = 'articleClasses';
				$strCommonClasses = 'articleCommonClasses';
			break;

			case "tl_content":
				$strExclusiveClasses = 'contentClasses';
				$strCommonClasses = 'contentCommonClasses';
			break;

			case "tl_form_field":
				$strExclusiveClasses = 'formFieldClasses';
				$strCommonClasses = 'formFieldCommonClasses';
			break;

			case "tl_form":
				$strExclusiveClasses = 'formClasses';
				$strCommonClasses = 'formCommonClasses';
			break;

			case "tl_module":
				$strExclusiveClasses = 'moduleClasses';
				$strCommonClasses = 'moduleCommonClasses';
			break;

			case "tl_page":
				$strExclusiveClasses = 'pageClasses';
				$strCommonClasses = 'pageCommonClasses';
			break;
		}

		$arrExclusiveClassOptions = StringUtil::deserialize(Config::get($strExclusiveClasses), true);
		$arrCommonClassOptions = StringUtil::deserialize(Config::get($strCommonClasses), true);
		$arrGlobalCommonClassOptions = StringUtil::deserialize(Config::get('globalCommonClasses'), true);

		if (!$arrExclusiveClassOptions) {
			$GLOBALS['TL_DCA'][$dc->table]['fields']['exclusiveClass']['inputType'] = false;
		}

		if (!$arrCommonClassOptions) {
			$GLOBALS['TL_DCA'][$dc->table]['fields']['commonClasses']['inputType'] = false;
		}

		if (!$arrGlobalCommonClassOptions) {
			$GLOBALS['TL_DCA'][$dc->table]['fields']['globalCommonClasses']['inputType'] = false;
		}
	}

}
