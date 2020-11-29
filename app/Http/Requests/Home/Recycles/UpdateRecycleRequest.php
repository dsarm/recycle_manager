<?php

namespace Recycle\Http\Requests\Home\Recycles;

use Recycle\Http\Requests\Request;

class UpdateRecycleRequest extends Request
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
            'recycle_id' => 'required|exists:recycle,id',
            'code' => 'required',
            'lng' => 'required',
            'lat' => 'required',
            'pitch' => 'required',
            'heading' => 'required',
            'address' => 'required',
            'postal_code' => 'required',
            'city' => 'required',
            'country' => 'required',
            'name' => 'required|max:255',
            'description' => 'max:255',
        ];
    }
}
