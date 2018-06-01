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
	'Contao\Module\ZyppyModule' 				=> 'system/modules/zyppy_class/library/Contao/Module.php',
	'Contao\ContentElement\ZyppyContentElement' => 'system/modules/zyppy_class/library/Contao/ContentElement.php',
));
