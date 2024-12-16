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
use Contao\ContentModel;
use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\DataContainer;
use Contao\StringUtil;
use Symfony\Component\HttpFoundation\RequestStack;

#[AsCallback(table: 'tl_article', target: 'config.onload')]
#[AsCallback(table: 'tl_content', target: 'config.onload')]
#[AsCallback(table: 'tl_form', target: 'config.onload')]
#[AsCallback(table: 'tl_form_field', target: 'config.onload')]
#[AsCallback(table: 'tl_module', target: 'config.onload')]
#[AsCallback(table: 'tl_page', target: 'config.onload')]
class HideUnconfiguredCallback
{
    private $requestStack;

    public function __construct(RequestStack $requestStack)
    {
        $this->requestStack = $requestStack;
    }

    public function __invoke(DataContainer|null $dc = null): void
    {
        if (null === $dc || !$dc->id || 'edit' !== $this->requestStack->getCurrentRequest()->query->get('act')) {
            return;
        }
		
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
