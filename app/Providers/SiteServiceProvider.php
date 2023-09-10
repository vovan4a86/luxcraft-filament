<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Page;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class SiteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer(['template'], function (\Illuminate\View\View $view){
//            $topMenu = Cache::get('top_menu', collect());
//            if (!count($topMenu)) {
            $headerMenu = Page::query()
                ->public()
                ->where('on_header', 1)
                ->orderBy('order')
                ->get();
//                Cache::add('top_menu', $topMenu, now()->addMinutes(60));
//            }

            $footerMenu = Page::query()
                ->public()
                ->where('on_footer', 1)
                ->orderBy('order')
                ->get();
            $view->with(compact('headerMenu', 'footerMenu'));
        });
    }
}
