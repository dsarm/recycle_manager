<?php

namespace Recycle\Http\ViewComposers\Recycles;

use Illuminate\Contracts\View\View;
use Recycle\Recycle;

class RecycleIndexViewComposer
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
        // $recycles = Recycle::all()->load(['recycle_location', 'recycle_info', 'recycle_type'])->each(function ($recycle, $key) {
            
        //     $recycle->recycle_location->with(['country', 'city']);
        
        // });

        $recycles = Recycle::all()->load(['recycle_location', 'recycle_info', 'recycle_type']);

        return $view->with('recycles', $recycles);
    }
}