<?php

namespace Recycle\Http\Controllers;

use Illuminate\Http\Request;

use Recycle\Setting;

use Recycle\Http\Requests;
use Recycle\Http\Controllers\Controller;

use Recycle\Http\Requests\Setting\CreateSettingRequest;
use Recycle\Http\Requests\Setting\UpdateSettingRequest;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.settings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mode = 'create';

        return view('home.settings.form', compact('mode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSettingRequest $request)
    {
        $data = $request->all();

        Setting::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'code' => $data['code'],
            'value' => $data['value']
        ]);

        return redirect('home/settings'
            )->with('message', 'setting created'
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

        return view('home.settings.form', compact('id', 'mode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSettingRequest $request, $id)
    {
        $data = $request->all();

        $settingData = array_only( $data, array(
            'name',
            'description',
            'code',
            'value'
        ));

        $setting = Setting::find($id);

        $setting->update($settingData);

        return redirect('home/settings'
            )->with('message', 'setting updated'
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
        $setting = Setting::find($id);

        $setting->delete();

        return redirect('home/settings'
            )->with('message', 'setting deleted'
            )->with('result', 'success');
    }
}
