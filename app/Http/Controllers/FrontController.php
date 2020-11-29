<?php

namespace Recycle\Http\Controllers;

use Illuminate\Http\Request;

use Recycle\Http\Requests;
use Recycle\Http\Controllers\Controller;

class FrontController extends Controller
{

    public function index()
    {
        return view('front.index');
    }

}
