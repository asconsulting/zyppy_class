<?php
 
/**
 * Zyppy Class
 *
 * Copyright (C) 2018 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */

 
namespace Asc\Frontend;

class ZyppyClass extends \Frontend
{
	public function compileArticle($objTemplate, $arrData, $objModule) {
		var_dump($objTemplate);
		echo "<br><br>";
		
		var_dump($arrData);
		echo "<br><br>";
		
		var_dump($objModule);
		echo "<br><br>";
	}
}
