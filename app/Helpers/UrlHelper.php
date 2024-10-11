<?php

namespace App\Helpers;

class UrlHelper
{
    /**
     * URL'deki dil segmentini değiştirir.
     *
     * @param string $locale Hedef dil
     * @param string|null $url URL'yi değiştirmek için isteğe bağlı parametre
     * @return string Yeni URL
     */
    public static function changeLanguageSegment($locale, $url = null)
    {
        if (!$url) {
            $url = url()->current();
        }

        $parsedUrl = parse_url($url);

        $path = isset($parsedUrl['path']) ? $parsedUrl['path'] : '/';

        $segments = explode('/', trim($path, '/'));

        $segments[0] = $locale;

        $newPath = implode('/', $segments);

        $newUrl = url($newPath);

        return $newUrl;
    }
}
