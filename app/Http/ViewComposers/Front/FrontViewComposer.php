<?php

namespace Recycle\Http\ViewComposers\Front;


use Illuminate\Contracts\View\View;
use Recycle\Setting;

class FrontViewComposer
{


    /**
     * Create a new profile composer.
     *
     * @param  scrapperRepository  $scrappers
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

    	$google_maps_api_key = Setting::where('code', 'GOOGLE_MAPS_API_KEY')->first();
    	$view->with('google_maps_api_key', $google_maps_api_key);

        $google_maps_center_point = Setting::where('code', 'GOOGLE_MAPS_CENTER_POINT')->first();
        $view->with('google_maps_center_point', $google_maps_center_point);

        return $view;
    }
    
}