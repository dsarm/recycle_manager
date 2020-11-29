<?php

namespace Recycle\Http\Requests\Front;

use Recycle\Http\Requests\Request;

class SearchRecycleRequest extends Request
{
    /**
     * Determine if the Recycle is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'north' => 'required|numeric',
            'east' => 'required|numeric',
            'south' => 'required|numeric',
            'west' => 'required|numeric'
        ];
    }
}
