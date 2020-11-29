<?php

namespace Recycle\Http\ViewComposers\Home\Common;


use Illuminate\Contracts\View\View;


class TopbarViewComposer
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

        $currentUser = \Auth::user();

        return $view->with(
            'currentUser', $currentUser);
    }
    
}