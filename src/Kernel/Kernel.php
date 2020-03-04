<?php
namespace Kernel;

class Kernel
{
    public static function serve()
    {
        include_once __DIR__.'/../config/routes.php';
        Router::run();
    }
}
