<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

 
/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'Asc\Frontend\ZyppyClass' 					=> 'system/modules/zyppy_class/library/Asc/Frontend/ZyppyClass.php',
	'Asc\Backend\ZyppyClass' 					=> 'system/modules/zyppy_class/library/Asc/Backend/ZyppyClass.php',
	'Asc\Model\ZyppyContentModel' 				=> 'system/modules/zyppy_class/library/Asc/Model/ZyppyContentModel.php',
	'Asc\Model\ZyppyArticleModel' 				=> 'system/modules/zyppy_class/library/Asc/Model/ZyppyArticleModel.php',
	'Asc\Model\ZyppyPageModel' 					=> 'system/modules/zyppy_class/library/Asc/Model/ZyppyPageModel.php',
	'Asc\Model\ZyppyModuleModel' 				=> 'system/modules/zyppy_class/library/Asc/Model/ZyppyModuleModel.php',
	'Contao\Module' 							=> 'system/modules/zyppy_class/library/Contao/ZyppyModule.php',
	'Contao\ContentElement' 					=> 'system/modules/zyppy_class/library/Contao/ZyppyContentElement.php',

));
