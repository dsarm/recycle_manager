<?php

namespace Recycle\Http\ViewComposers\Recycles;

use Illuminate\Contracts\View\View;
use Recycle\Recycle;
use Recycle\Setting;
use Recycle\RecycleType;

class RecycleFormViewComposer
{

    /**
     * Create a new profile composer.
     *
     * @param  RecycleRepository  $Recycles
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

        if(isset($view['id']))
        {
            $recycle = Recycle::find( $view['id'] )->load(['recycle_location', 'recycle_info', 'recycle_type']);
            $view->with('recycle', $recycle);
        }

        $recycle_types = RecycleType::all();
        
        $view->with('recycle_types', $recycle_types);


        $view->with('mode', $view['mode']);

        $google_maps_api_key = Setting::where('code', 'GOOGLE_MAPS_API_KEY')->first();
        $view->with('google_maps_api_key', $google_maps_api_key);

        $google_maps_center_point = Setting::where('code', 'GOOGLE_MAPS_CENTER_POINT')->first();
        $view->with('google_maps_center_point', $google_maps_center_point);

        
        return $view;
    }
}