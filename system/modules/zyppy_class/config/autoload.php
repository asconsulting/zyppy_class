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
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'ZyppyClass\Backend\ZyppyClass' 		=> 'system/modules/zyppy_class/library/ZyppyClass/Backend/ZyppyClass.php',
	'ZyppyClass\Frontend\ZyppyArticle' 		=> 'system/modules/zyppy_class/library/ZyppyClass/Frontend/ZyppyArticle.php',
	'ZyppyClass\Frontend\ZyppyContent' 		=> 'system/modules/zyppy_class/library/ZyppyClass/Frontend/ZyppyContent.php',
	'ZyppyClass\Frontend\ZyppyForm' 		=> 'system/modules/zyppy_class/library/ZyppyClass/Frontend/ZyppyForm.php',
	'ZyppyClass\Frontend\ZyppyPage' 		=> 'system/modules/zyppy_class/library/ZyppyClass/Frontend/ZyppyPage.php',
));
