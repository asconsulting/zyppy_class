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
	'Asc\Backend\ZyppyClass' 					=> 'system/modules/zyppy_class/library/Asc/Backend/ZyppyClass.php',

	'Asc\Model\ZyppyArticleModel' 				=> 'system/modules/zyppy_class/library/Asc/Model/ZyppyArticleModel.php',
	'Asc\Model\ZyppyContentModel' 				=> 'system/modules/zyppy_class/library/Asc/Model/ZyppyContentModel.php',
	'Asc\Model\ZyppyFormFieldModel' 			=> 'system/modules/zyppy_class/library/Asc/Model/ZyppyFormFieldModel.php',
	'Asc\Model\ZyppyFormModel' 					=> 'system/modules/zyppy_class/library/Asc/Model/ZyppyFormModel.php',
	'Asc\Model\ZyppyModuleModel' 				=> 'system/modules/zyppy_class/library/Asc/Model/ZyppyModuleModel.php',
	'Asc\Model\ZyppyPageModel' 					=> 'system/modules/zyppy_class/library/Asc/Model/ZyppyPageModel.php',
));
