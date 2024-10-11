<?php

namespace App\Http\Middleware;

use App\Models\Entities\Language;
use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;

class LanguageMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @param string|null $language
     * @return mixed
     */
    public function handle($request, Closure $next, $language = null)
    {
        $language = $request->segment(1);
        $defaultLanguage = 'az';
        $lang = $language ?? $defaultLanguage;
        $languages  = Language::whereStatus(1)->get()->pluck('locale')->toArray();

        if (in_array($lang, $languages)) {
            App::setLocale($lang);
        } else {
            App::setLocale($defaultLanguage);
        }
        $currentLanguage     = Schema::hasTable('languages') ? Language::whereStatus(1)->whereLocale(app()->getLocale())->first() ?? Language::whereStatus(1)->first() : null;

        if ($currentLanguage) {
            view()->share('currentLanguage', $currentLanguage);
        }
        return $next($request);
    }
}
