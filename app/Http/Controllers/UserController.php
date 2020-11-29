<?php

namespace Recycle\Http\Controllers;

use Illuminate\Http\Request;

use Recycle\User;

use Recycle\Http\Requests;
use Recycle\Http\Controllers\Controller;

use Recycle\Http\Requests\CreateUserRequest;
use Recycle\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mode = 'create';

        return view('home.users.form', compact('mode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUserRequest $request)
    {
        $data = $request->all();

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'activation_code' => str_random(30)
        ]);

        return redirect('home/users'
            )->with('message', 'user created'
            )->with('result', 'success');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mode = 'edit';

        return view('home.users.form', compact('id', 'mode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->all();

        $userData = array_only( $data, array(
            'name',
            'email',
            'password'
        ));

        $userData['password'] = bcrypt($userData['password']);

        $user = User::find($id);

        $user->update($userData);

        return redirect('home/users'
            )->with('message', 'user updated'
            )->with('result', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect('home/users'
            )->with('message', 'user deleted'
            )->with('result', 'success');
    }
}
