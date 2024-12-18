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
 * Common Class Options
 */
#[AsCallback(table: 'tl_article', target: 'fields.commonClasses.options')]
#[AsCallback(table: 'tl_content', target: 'fields.commonClasses.options')]
#[AsCallback(table: 'tl_form', target: 'fields.commonClasses.options')]
#[AsCallback(table: 'tl_form_field', target: 'fields.commonClasses.options')]
#[AsCallback(table: 'tl_module', target: 'fields.commonClasses.options')]
#[AsCallback(table: 'tl_page', target: 'fields.commonClasses.options')]
class CommonClassOptions
{
    public function __construct(private readonly Connection $db)
    {

    }
    public function __invoke(DataContainer $dc): array
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

		$this->options = [];
		if (Config::get($strCommonClasses) != '') {
			$arrTemp = StringUtil::deserialize(Config::get($strCommonClasses), true);
			foreach ($arrTemp as $arrOption) {
				$this->options[$arrOption['key']] = $arrOption['value'];
			}
		} else {
			$this->options[] = 'No Classes Configured';
		}
		die('Load Options Listener');
		return $this->options;
    }

    public function reset(): void
    {
        $this->options = null;
    }
	
}
