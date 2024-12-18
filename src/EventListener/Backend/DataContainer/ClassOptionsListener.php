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
}
