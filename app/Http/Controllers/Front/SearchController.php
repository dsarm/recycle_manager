<?php

namespace Recycle\Http\Controllers\Front;

use Illuminate\Http\Request;

use Recycle\Http\Requests;
use Recycle\Http\Controllers\Controller;

use Recycle\Http\Requests\Front\SearchRecycleRequest;
use Recycle\Domain\Services\SearchRecycleService;

class SearchController extends Controller
{

	protected $searchRecycleService;

	public function __construct(
	        SearchRecycleService $searchRecycleService)
	    {
	        $this->searchRecycleService = $searchRecycleService;
	    }

    public function searchRecycles(SearchRecycleRequest $request)
    {

    	$recycles = $this->searchRecycleService->searchRecycleInsideArea(
    		$request->input()
		);
    	

    	return response()->json($recycles);
        
    }

}
