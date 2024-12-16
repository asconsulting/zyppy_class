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
use Symfony\Component\HttpFoundation\RequestStack;

#[AsCallback(table: 'tl_article', target: 'config.onload')]
#[AsCallback(table: 'tl_content', target: 'config.onload')]
#[AsCallback(table: 'tl_form', target: 'config.onload')]
#[AsCallback(table: 'tl_form_field', target: 'config.onload')]
#[AsCallback(table: 'tl_module', target: 'config.onload')]
#[AsCallback(table: 'tl_page', target: 'config.onload')]
class RequiredFieldCallback
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
	
}
