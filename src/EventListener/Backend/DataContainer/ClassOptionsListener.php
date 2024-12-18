<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2018-2024 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */
 

namespace ZyppyClass\EventListener\Backend\DataContainer;

use Contao\Config;
use Contao\DataContainer;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\StringUtil;

use Doctrine\DBAL\Connection;


class ClassOptionsListener
{
	
	/**
     * @return array<string>
	 */
	#[AsCallback(table: 'tl_article', target: 'fields.commonClasses.options')]
	#[AsCallback(table: 'tl_content', target: 'fields.commonClasses.options')]
	#[AsCallback(table: 'tl_form', target: 'fields.commonClasses.options')]
	#[AsCallback(table: 'tl_form_field', target: 'fields.commonClasses.options')]
	#[AsCallback(table: 'tl_module', target: 'fields.commonClasses.options')]
	#[AsCallback(table: 'tl_page', target: 'fields.commonClasses.options')]
    public function getCommonOptions(DataContainer $dc): array
    {
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

		$arrOptions = [];
		$arrOptions[] = 'No Classes Configured';
		if (Config::get($strCommonClasses) != '') {
			$arrTemp = StringUtil::deserialize(Config::get($strCommonClasses), true);
			if (!empty($arrTemp)) {
				$arrOptions = [];
			}
			foreach ($arrTemp as $arrOption) {
				$arrOptions[$arrOption['key']] = $arrOption['value'];
			}
		}
		return $arrOptions;
    }
	
	
	#[AsCallback(table: 'tl_article', target: 'fields.globalCommonClasses.options')]
	#[AsCallback(table: 'tl_content', target: 'fields.globalCommonClasses.options')]
	#[AsCallback(table: 'tl_form', target: 'fields.globalCommonClasses.options')]
	#[AsCallback(table: 'tl_form_field', target: 'fields.globalCommonClasses.options')]
	#[AsCallback(table: 'tl_module', target: 'fields.globalCommonClasses.options')]
	#[AsCallback(table: 'tl_page', target: 'fields.globalCommonClasses.options')]
    public function getGlobalCommonOptions(DataContainer $dc): array
    {
		$arrOptions = array();

		if (Config::get('globalCommonClasses') != '') {
			$arrTemp = StringUtil::deserialize(Config::get('globalCommonClasses'), true);
			foreach ($arrTemp as $arrOption) {
				$arrOptions[$arrOption['key']] = $arrOption['value'];
			}
		}
		return $arrOptions;
    }
	
	
	#[AsCallback(table: 'tl_article', target: 'fields.exclusiveClass.options')]
	#[AsCallback(table: 'tl_content', target: 'fields.exclusiveClass.options')]
	#[AsCallback(table: 'tl_form', target: 'fields.exclusiveClass.options')]
	#[AsCallback(table: 'tl_form_field', target: 'fields.exclusiveClass.options')]
	#[AsCallback(table: 'tl_module', target: 'fields.exclusiveClass.options')]
	#[AsCallback(table: 'tl_page', target: 'fields.exclusiveClass.options')]
    public function getExclusiveClassOptions(DataContainer $dc): array
    {
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
	
}
