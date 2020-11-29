<?php

namespace Recycle\Http\ViewComposers\Home\Dashboard;

use Carbon\Carbon;
use Illuminate\Contracts\View\View;

use Recycle\User;
use Recycle\Recycle;
use Recycle\RecycleType;


class DashboardViewComposer
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

        $totalRecycleNb = Recycle::count();

        $totalUsersNb = User::count();
        
        $morrisDonutData = $this->generateMorrisDonutData();

        return $view->with(
            'totalUsersNb', $totalUsersNb)->with(
            'totalRecycleNb', $totalRecycleNb)->with(
            'morrisDonutData', $morrisDonutData);
    }

    private function generateMorrisDonutData()
    {

        $recyclesTypes = RecycleType::all();

        $collection = collect();
        
        try {

            foreach ($recyclesTypes as $key => $recyclesType) {

                $obj = new \stdClass();            
                $obj->label = $recyclesType->name;
                $obj->value = $recyclesType->recycles->count();

                $collection->push($obj);
            }

        } catch ( \Exception $e ) {

            \Log::error('generateMorrisDonutData - : '.$e->getMessage());

        }

        return $collection;
    }

}
