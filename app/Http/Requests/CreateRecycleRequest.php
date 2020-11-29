<?php

namespace Recycle\Http\Requests;

use Recycle\Http\Requests\Request;

class CreateRecycleRequest extends Request
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
            'code' => 'required',
            'lng' => 'required',
            'lat' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'name' => 'max:255',
            'description' => 'max:255',
        ];
    }
}
