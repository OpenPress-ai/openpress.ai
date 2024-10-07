<?php

namespace App\Helpers;

class ThemeHelper
{
    public static function processStyle(array $style, array $theme): string
    {
        $processedStyle = '';
        foreach ($style as $property => $value) {
            $processedValue = preg_replace_callback('/\{\{theme\.([a-zA-Z0-9._]+)\}\}/', function($matches) use ($theme) {
                return self::getNestedValue($theme, explode('.', $matches[1])) ?? '';
            }, $value);
            $processedStyle .= "{$property}:{$processedValue};";
        }
        return $processedStyle;
    }

    private static function getNestedValue(array $array, array $keys)
    {
        foreach ($keys as $key) {
            if (!isset($array[$key])) {
                return null;
            }
            $array = $array[$key];
        }
        return $array;
    }
}