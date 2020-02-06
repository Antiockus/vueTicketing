<?php

namespace Antiockus;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Router
{
    public static function get($path, $functionToRun = null, $args = null)
    {
        $loader = new FilesystemLoader('views/');
        $twig = new Environment($loader);

        if ($path == '/' || '') {
            $path = 'index';
        }

        if ($functionToRun) {
            $controller = explode('@', $functionToRun);
        }
        $classToLoad = 'Antiockus\\controllers\\' . $controller[0];
        $test1 = new $classToLoad($twig);
        $functionToCall = $controller[1];
        return $test1->$functionToCall();
    }

    public static function post($path, $controllerMethod)
    {
    }
}
