<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2018-2024 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */
 

namespace ZyppyClass\EventListener\DataContainer;

use Contao\Config;
use Contao\DataContainer;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\StringUtil;

use Doctrine\DBAL\Connection;

/**
 * Get news modules and return them as array.
 */
#[AsCallback('tl_article', 'fields.commonClasses.options')]
#[AsCallback('tl_content', 'fields.commonClasses.options')]
#[AsCallback('tl_form', 'fields.commonClasses.options')]
#[AsCallback('tl_form_field', 'fields.commonClasses.options')]
#[AsCallback('tl_module', 'fields.commonClasses.options')]
#[AsCallback('tl_page', 'fields.commonClasses.options')]
class CommonClassOptions
{
    public function __construct(private readonly Connection $db)
    {

    }
	
	#[AsCallback('tl_article', 'fields.commonClasses.options')]
	#[AsCallback('tl_content', 'fields.commonClasses.options')]
	#[AsCallback('tl_form', 'fields.commonClasses.options')]
	#[AsCallback('tl_form_field', 'fields.commonClasses.options')]
	#[AsCallback('tl_module', 'fields.commonClasses.options')]
	#[AsCallback('tl_page', 'fields.commonClasses.options')]
    public function getCommonClassOptions(DataContainer $dc): array
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

		$arrOptions = array();
		if (Config::get($strCommonClasses) != '') {
			$arrTemp = StringUtil::deserialize(Config::get($strCommonClasses), true);
			foreach ($arrTemp as $arrOption) {
				$arrOptions[$arrOption['key']] = $arrOption['value'];
			}
		} else {
			$arrOptions[''] = 'No Classes Configured';
		}
		return $arrOptions;
    }
	
}
