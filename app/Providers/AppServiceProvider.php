<?php
namespace App\Providers;

use App\Helpers\CmsSidebar;
use App\Models\Entities\Category;
use App\Models\Entities\Language;
use App\Models\Entities\MainSetting;
use App\Models\Entities\Menu;
use App\Models\Entities\SocialLink;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\URL;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        view()->composer('gopanel.blocks.left_sidebar', function () {
            $this->generateCmsSidebar();
            view()->share('sidebarItems', CmsSidebar::getInstance()->getItems());
        });

        if (Schema::hasTable('languages')) {
            $languages = Language::whereStatus(1)->get();
            view()->composer('gopanel.*', function () use ($languages) {
                if ($languages) {
                    view()->share('languages', $languages);
                }
            });
        }



        $categories          = Schema::hasTable('categories') ? Category::whereStatus(1)->orderBy('order')->get() : collect([]);
        $menus               = Schema::hasTable('menus') ? Menu::status(1)->orderBy('order')->where('header', 1)->get() : collect([]);
        $footer_menus        = Schema::hasTable('menus') ? Menu::status(1)->orderBy('order')->where('footer', 1)->get() : collect([]);
        $header_top_menus    = Schema::hasTable('menus') ? Menu::status(1)->orderBy('order')->where('header_top', 1)->get() : collect([]);
        $mainsetting         = Schema::hasTable('main_settings') ? MainSetting::first() : null;
        $languages           = Schema::hasTable('languages') ? Language::whereStatus(1)->orderBy('order')->get() : collect([]);
        $sociallinks         = Schema::hasTable('social_links') ? SocialLink::status(1)->orderBy('order')->get() : collect([]);

        view()->composer('site.*', function () use ($categories, $menus, $header_top_menus, $mainsetting, $languages, $sociallinks, $footer_menus) {
            view()->share('categories', $categories);
            view()->share('menus', $menus);
            view()->share('footer_menus', $footer_menus);
            view()->share('header_top_menus', $header_top_menus);
            view()->share('mainsetting', $mainsetting);

            if ($languages) {
                view()->share('languages', $languages);
            }
            if ($sociallinks) {
                view()->share('sociallinks', $sociallinks);
            }
        });
    }

    public function generateCmsSidebar(): void
    {
        $adminSidebarMenu = CmsSidebar::getInstance();
        $adminSidebarMenu->addItems(config('cms_sidebar_menu'));
    }
}
