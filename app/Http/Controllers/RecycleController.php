<?php

namespace Recycle\Http\Controllers;

use Illuminate\Http\Request;

use Recycle\Recycle;

use Recycle\Jobs\CreateRecycle;
use Recycle\Jobs\UpdateRecycle;
use Recycle\Jobs\RemoveRecycle;

use Recycle\Http\Requests\Home\Recycles\CreateRecycleRequest;
use Recycle\Http\Requests\Home\Recycles\UpdateRecycleRequest;

use Recycle\Http\Controllers\Controller;

class RecycleController extends Controller
{

    public function __construct()
    {
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.recycles.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mode = 'create';

        return view('home.recycles.form', compact('mode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRecycleRequest $request)
    {

        $this->dispatch(
            new CreateRecycle(
                $request->input()
            )
        );

        return redirect('home/recycles'
            )->with('message', 'recycle created'
            )->with('result', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('home.recycles.show');
    }

    public function map()
    {
        return view('home.recycles.map');
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

        return view('home.recycles.form', compact('id', 'mode'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateRecycleRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRecycleRequest $request, $id)
    {
        
        $recycle = Recycle::find($id);

        $this->dispatch(
            new UpdateRecycle(
                $request->input(),
                $recycle
            )
        );

        return redirect()->route('home.recycles.edit', ['id' => $id])->with('message', 'recycle updated'
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
        $recycle = Recycle::find($id);

        $this->dispatch(
            new RemoveRecycle(
                $recycle
            )
        );

        return redirect()->route('home.recycles')->with('message', 'recycle removed'
            )->with('result', 'success');
    }
}

