<?php

namespace Recycle\Providers;

use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function boot()
    {
        // Using class based composers...
        

        //topbar
        view()->composer(
            'home/partials/topbar', 
            'Recycle\Http\ViewComposers\Home\Common\TopbarViewComposer'
        );

        //home
        view()->composer(
            'home/index', 
            'Recycle\Http\ViewComposers\Home\Dashboard\DashboardViewComposer'
        );

        //users
        view()->composer(
            'home/users/index', 
            'Recycle\Http\ViewComposers\Users\UserIndexViewComposer'
        );

        view()->composer(
            'home/users/form', 
            'Recycle\Http\ViewComposers\Users\UserFormViewComposer'
        );

        //recycles
        view()->composer(
            'home/recycles/index', 
            'Recycle\Http\ViewComposers\Recycles\RecycleIndexViewComposer'
        );

        view()->composer(
            'home/recycles/form', 
            'Recycle\Http\ViewComposers\Recycles\RecycleFormViewComposer'
        );

        view()->composer(
            'home/recycles/map', 
            'Recycle\Http\ViewComposers\Recycles\RecycleMapViewComposer'
        );

        //settings
        view()->composer(
            'home/settings/index', 
            'Recycle\Http\ViewComposers\Settings\SettingIndexViewComposer'
        );

        view()->composer(
            'home/settings/form', 
            'Recycle\Http\ViewComposers\Settings\SettingFormViewComposer'
        );

        // front
        view()->composer(
            'front/index', 
            'Recycle\Http\ViewComposers\Front\FrontViewComposer'
        );

    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}