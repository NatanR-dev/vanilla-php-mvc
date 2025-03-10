<?php

namespace Utils;

class SlashUrl
{
    public static function normalizeUrl()
    {
        $url = '/';

        if (isset($_GET['url'])) {
            $url .= trim($_GET['url']); // Strip whitespace (or other characters) from the beginning and end of a string
        }
        
        return rtrim($url, '/'); 
    }
}