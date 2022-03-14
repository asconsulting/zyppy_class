<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2022 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */



/*
$GLOBALS['TL_MODELS']['tl_content'] 	= 'Asc\Model\ZyppyContentModel';
$GLOBALS['TL_MODELS']['tl_form_field'] 	= 'Asc\Model\ZyppyFormFieldModel';
$GLOBALS['TL_MODELS']['tl_form'] 		= 'Asc\Model\ZyppyFormModel';
$GLOBALS['TL_MODELS']['tl_module'] 		= 'Asc\Model\ZyppyModuleModel';
//$GLOBALS['TL_MODELS']['tl_page'] 		= 'Asc\Model\ZyppyPageModel';
*/


//$GLOBALS['TL_HOOKS']['generatePage'][] = array('Asc\Frontend\ZyppyPage', 'generatePage');

$GLOBALS['TL_HOOKS']['getArticle'][] 		= array('Asc\Frontend\ZyppyArticle', 'generateArticle');
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('Asc\Frontend\ZyppyContent', 'generateContent');




/**
 * Styles
 */
 if (version_compare(VERSION, '4.4', '>=')) {
	$GLOBALS['TL_CSS'][] = 'system/modules/zyppy_class/assets/css/backend-contao4.css|static';
}

