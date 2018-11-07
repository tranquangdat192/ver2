<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            ['templates.quick-cart', 'components.checkout', 'components.thankyou'], 'App\Http\ViewComposers\CartComposer'
        );

        View::composer(
            ['components.header', 'index', 'templates.sidebar'], 'App\Http\ViewComposers\MenuComposer'
        );

        View::composer(
            ['components.footer', 'templates.banner'], 'App\Http\ViewComposers\BannerComposer'
        );

        View::composer(
            ['templates.sidebar'], 'App\Http\ViewComposers\BrandComposer'
        );

        View::composer(
            ['admin.crud.edit.brand', 'admin.crud.edit.product','admin.crud.add.brand', 'admin.crud.add.product'], 'App\Http\ViewComposers\DataEditComposer'
        );

        View::composer(
            ['admin.crud.edit.user', 'admin.crud.add.user'], 'App\Http\ViewComposers\RoleComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
