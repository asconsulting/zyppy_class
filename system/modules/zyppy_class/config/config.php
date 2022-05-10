<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2018-2022 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */



/**
 * Hooks
 */
$GLOBALS['TL_HOOKS']['generatePage'][] 		= array('ZyppyClass\Frontend\ZyppyPage', 'generatePage');
$GLOBALS['TL_HOOKS']['getArticle'][] 		= array('ZyppyClass\Frontend\ZyppyArticle', 'generateArticle');
$GLOBALS['TL_HOOKS']['getContentElement'][] = array('ZyppyClass\Frontend\ZyppyContent', 'generateContent');
//$GLOBALS['TL_HOOKS']['getForm'][] 			= array('ZyppyClass\Frontend\ZyppyContent', 'generateContent');
//$GLOBALS['TL_HOOKS']['getFrontendModule'][] = array('ZyppyClass\Frontend\ZyppyContent', 'generateContent');
//$GLOBALS['TL_HOOKS']['compileFormFields'][] = array('ZyppyClass\Frontend\ZyppyForm', 'compileFormFields');



/**
 * Styles
 */
 if (version_compare(VERSION, '4.4', '>=')) {
	$GLOBALS['TL_CSS'][] = 'system/modules/zyppy_class/assets/css/backend-contao4.css|static';
}
