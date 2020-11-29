<?php

namespace Recycle\Http\ViewComposers\Users;

use Illuminate\Contracts\View\View;
use Recycle\User;

class UserIndexViewComposer
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
        $users = User::all('id', 'name', 'email', 'created_at');
        return $view->with('users', $users);
    }
}