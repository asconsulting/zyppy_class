<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2018-2024 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */
 
 
namespace ZyppyClass\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\ArticleModel;
use Contao\StringUtil;

#[AsHook('getArticle')]
class GetArticleListener
{
    public function __invoke(ArticleModel $objArticle): void
	{

		$arrCss = StringUtil::deserialize($objArticle->cssID, true);
		if (!is_array($arrCss)) {
			$arrCss = array('', '');
		}
		if (!array_key_exists(1, $arrCss)) {
			$arrCss[1] = '';
		}
		
		$arrCss[1] .= ' ' .$objArticle->exclusiveClass;

		$arrCommon = StringUtil::deserialize($objArticle->commonClasses, true);
		if (!empty($arrCommon)) {
			$arrCss[1] .= ' ' .implode(' ', $arrCommon);
		}
		$arrCss[1] = str_replace('  ', ' ', $arrCss[1]);
		$arrCss[1] = trim($arrCss[1]);

		$arrGlobal = StringUtil::deserialize($objArticle->globalCommonClasses, true);
		if (!empty($arrGlobal)) {
			$arrCss[1] .= ' ' .implode(' ', $arrGlobal);
		}
		$arrCss[1] = str_replace('  ', ' ', $arrCss[1]);
		$arrCss[1] = trim($arrCss[1]);

		$arrTemp = explode(' ', $arrCss[1]);
		$arrClass = array();
		foreach ($arrTemp as $strClass) {
			if (!in_array($strClass, $arrClass) && trim($strClass) != '') {
				$arrClass[] = trim($strClass);
			}
		}
		$arrCss[1] = implode(' ', $arrClass);

		$objArticle->cssID = $arrCss;
	}
	
}
