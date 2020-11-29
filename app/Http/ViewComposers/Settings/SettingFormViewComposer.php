<?php

namespace Recycle\Http\ViewComposers\Settings;

use Illuminate\Contracts\View\View;
use Recycle\Setting;

class SettingFormViewComposer
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

        if(isset($view['id']))
        {
            $setting = Setting::find( $view['id'] );
            $view->with('setting', $setting);
        }
        
        $view->with('mode', $view['mode']);
        
        return $view;
    }
}