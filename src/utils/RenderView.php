<?php

namespace Utils;

class RenderView
{
    public static function render($view, $args = [])
    {
        extract($args);
        include __DIR__ . "/../views/{$view}.php";
    }
}