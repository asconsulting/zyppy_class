<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2022 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */



//
$GLOBALS['TL_HOOKS']['generatePage'][] 		= array('Asc\Frontend\ZyppyPage', 'generatePage');
$GLOBALS['TL_HOOKS']['getArticle'][] 		= array('Asc\Frontend\ZyppyArticle', 'generateArticle');
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('Asc\Frontend\ZyppyContent', 'generateContent');
$GLOBALS['TL_HOOKS']['getForm'][] 			= array('Asc\Frontend\ZyppyContent', 'generateContent');
$GLOBALS['TL_HOOKS']['getFrontendModule'][] = array('Asc\Frontend\ZyppyContent', 'generateContent');
$GLOBALS['TL_HOOKS']['compileFormFields'][] = array('Asc\Frontend\ZyppyForm', 'compileFormFields');



/**
 * Styles
 */
 if (version_compare(VERSION, '4.4', '>=')) {
	$GLOBALS['TL_CSS'][] = 'system/modules/zyppy_class/assets/css/backend-contao4.css|static';
}

