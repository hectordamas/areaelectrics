<?php

if (!function_exists('getImageUrl')) {
    function getImageUrl($path)
    {
        if (filter_var($path, FILTER_VALIDATE_URL)) {
            return $path;
        } else {
            return asset($path);
        }
    }
}
