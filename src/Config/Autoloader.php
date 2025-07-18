<?php

namespace Config;

class Autoloader 
{
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $file = __DIR__ . "/../" . str_replace('\\', '/', $class) . ".php";
            
            if (file_exists($file)) {
                require_once $file;
                return true;
            }
            
            return false;
        });
    }
} 