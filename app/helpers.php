<?php

if (!function_exists('ci')) {
    function ci()
    {
        return \App\System\ContainerSingleton::getContainer();
    }
}

if (!function_exists('decline')) {
    function decline(string $number, array $words = [])
    {
        $number = intval($number) % 100;

        if ($number >= 5 && $number <= 20) {
            return $words[2];
        }

        $number %= 10;
        
        if ($number == 1) {
            return $words[0];
        } elseif ($number >= 2 && $number <= 4) {
            return $words[1];
        }

        return $words[2];
    }
}
