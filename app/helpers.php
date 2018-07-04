<?php

if (!function_exists('ci')) {
    function ci()
    {
        return \App\System\ContainerSingleton::getContainer();
    }
}

if (!function_exists('decline')) {
    function decline(string $str, array $words = [])
    {
        return $str;
    }
}
