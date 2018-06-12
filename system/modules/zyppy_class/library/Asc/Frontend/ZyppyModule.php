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

class ZyppyModule extends \Frontend
{
	public function getFrontendModule($objRow, $strBuffer)
	{
		var_dump($objRow);
		echo "<br><hr><br><br>";
	}
}