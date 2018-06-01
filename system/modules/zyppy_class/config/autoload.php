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
	'Contao\Module'                    => 'system/modules/zyppy_class/library/Asc/Module/ZyppyModule.php',
	'Contao\ContentElement'            => 'system/modules/zyppy_class/library/Asc/Element/ZyppyContentElement.php',
));
