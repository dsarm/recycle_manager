<?php

namespace Recycle\Http\ViewComposers\Settings;

use Illuminate\Contracts\View\View;
use Recycle\Setting;

class SettingIndexViewComposer
{

    /**
     * Create a new profile composer.
     *
     * @return void
     */
    public function __construct()
    {
        // Dependencies automatically resolved by service container...
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        // $settings = Recycle::all()->load(['recycle_location', 'recycle_info', 'recycle_type'])->each(function ($recycle, $key) {
            
        //     $recycle->recycle_location->with(['country', 'city']);
        
        // });

        $settings = Setting::all();

        return $view->with('settings', $settings);
    }
}