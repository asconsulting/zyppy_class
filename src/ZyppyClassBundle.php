<?php

/**
 * Zyppy Class
 *
 * Copyright (C) 2018-2024 Andrew Stevens Consulting
 *
 * @package    asconsulting/zyppy_class
 * @link       https://andrewstevens.consulting
 */


namespace ZyppyClass\ZyppyClassBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;


class ZyppyClassBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
