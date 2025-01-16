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

use Contao\ArticleModel;
use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\CoreBundle\Monolog\ContaoContext;
use Contao\ContentElement;
use Contao\ContentModel;
use Contao\ModuleModel;
use Contao\StringUtil;
use Contao\System;
use Psr\Log\LogLevel;

#[AsHook('getContentElement')]
class GetContentElementListener
{
    public function __invoke(ContentModel $objModel, string $strBuffer, $objElement): string
    {
		System::getContainer()->get('monolog.logger.contao.cron')->info('getContentElement Hook Fired');
		
		$strColumn = 'main';
		$objArticle = ArticleModel::findByPk($objModel->pid);
		if ($objArticle) {
			$strColumn = $objArticle->inColumn;
		}
		
		if (is_a($objElement, 'Contao\ContentModule')) {
			$objModel = ModuleModel::findByPk($objModel->module);
			if ($objModel && $objModel->type == 'iso_checkout') {
				return $strBuffer;
			}			
		}

		$arrCss = StringUtil::deserialize($objElement->cssID, true);
		if (!is_array($arrCss)) {
			$arrCss = array('', '');
		}
		if (!array_key_exists(1, $arrCss)) {
			$arrCss[1] = '';
		}
		
		$arrCss[1] .= ' ' .$objElement->exclusiveClass;

		$arrCommon = StringUtil::deserialize($objElement->commonClasses, true);
		if (!empty($arrCommon)) {
			$arrCss[1] .= ' ' .implode(' ', $arrCommon);
		}
		$arrCss[1] = str_replace('  ', ' ', $arrCss[1]);
		$arrCss[1] = trim($arrCss[1]);

		$arrGlobal = StringUtil::deserialize($objElement->globalCommonClasses, true);
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

		if (!is_null($objModel)) {
			System::getContainer()->get('monolog.logger.contao.cron')->info('getContentElement Model Found');
			$arrRow = StringUtil::deserialize($objModel->cssID, true);
			if (!is_array($arrRow)) {
				$arrRow = array('', '');
			}
			if (!array_key_exists(1, $arrRow)) {
				$arrRow[1] = '';
			}
			
			$arrRow[1] .= ' ' .$objModel->exclusiveClass;

			$arrCommon = StringUtil::deserialize($objModel->commonClasses, true);
			if (!empty($arrCommon)) {
				$arrRow[1] .= ' ' .implode(' ', $arrCommon);
			}
			$arrRow[1] = str_replace('  ', ' ', $arrRow[1]);
			$arrRow[1] = trim($arrRow[1]);

			$arrGlobal = StringUtil::deserialize($objModel->globalCommonClasses, true);
			if (!empty($arrGlobal)) {
				$arrRow[1] .= ' ' .implode(' ', $arrGlobal);
			}
			$arrRow[1] = str_replace('  ', ' ', $arrRow[1]);
			$arrRow[1] = trim($arrRow[1]);	
		
			$arrTemp = explode(' ', $arrRow[1]);
			foreach ($arrRow as $strClass) {
				if (!in_array($strClass, $arrClass) && trim($strClass) != '') {
					$arrClass[] = trim($strClass);
				}
			}
			$arrCss[1] = implode(' ', $arrClass);
		}
		
		if (is_object($objModel) && (
			is_a($objElement, 'Contao\ContentImage') || 
			is_a($objElement, 'Contao\ContentDownload') || 
			is_a($objElement, 'Contao\ContentText') || 
			is_a($objElement, 'Contao\ContentProxy')
		)) {
			$strClass = ContentElement::findClass($objModel->type);
			$objModel->typePrefix = 'ce_';
			$objModel->cssID = $arrCss;
			$objElement = new $strClass($objModel, $strColumn);
		} else {
			$objElement->cssID = $arrCss;
		}
		return $objElement->generate();
	}
	
}
