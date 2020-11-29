<?php

namespace Recycle\Http\ViewComposers\Users;

use Illuminate\Contracts\View\View;
use Recycle\User;

class UserFormViewComposer
{

    /**
     * Create a new profile composer.
     *
     * @param  UserRepository  $users
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
            $user = User::find( $view['id'], ['id', 'name', 'email'] );
            $view->with('user', $user);
        }

        $view->with('mode', $view['mode']);
        
        return $view;
    }
}