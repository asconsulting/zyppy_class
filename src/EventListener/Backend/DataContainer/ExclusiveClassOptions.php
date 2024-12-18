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

/**
 * Get news modules and return them as array.
 */
#[AsCallback('tl_article', 'fields.exclusiveClass.options')]
#[AsCallback('tl_content', 'fields.exclusiveClass.options')]
#[AsCallback('tl_form', 'fields.exclusiveClass.options')]
#[AsCallback('tl_form_field', 'fields.exclusiveClass.options')]
#[AsCallback('tl_module', 'fields.exclusiveClass.options')]
#[AsCallback('tl_page', 'fields.exclusiveClass.options')]
class ExclusiveClassOptions
{
    public function __construct(private readonly Connection $db)
    {

    }
    public function __invoke(DataContainer $dc): array
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
