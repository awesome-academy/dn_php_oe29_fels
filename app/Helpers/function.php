<?php

if (!function_exists('getFileName')) {
    function getFileName($slug, $extension)
    {
        $fileName = $slug . '-' . time() . '.' . $extension;

        return $fileName;
    }
}
