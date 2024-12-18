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
#[AsCallback('tl_article', 'fields.globalCommonClasses.options')]
#[AsCallback('tl_content', 'fields.globalCommonClasses.options')]
#[AsCallback('tl_form', 'fields.globalCommonClasses.options')]
#[AsCallback('tl_form_field', 'fields.globalCommonClasses.options')]
#[AsCallback('tl_module', 'fields.globalCommonClasses.options')]
#[AsCallback('tl_page', 'fields.globalCommonClasses.options')]
class GlobalCommonClassOptions
{
    public function __construct(private readonly Connection $db)
    {

    }
    public function __invoke(DataContainer $dc): array
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
	
}
