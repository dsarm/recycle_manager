<?php

namespace Recycle\Http\Requests\Setting;

use Recycle\Http\Requests\Request;

class UpdateSettingRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
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
            'name' => 'required|max:255',
            'description' => 'required|max:255',
            'code' => 'required|max:255',
            'value' => 'required|min:6|max:255',
        ];
    }
}
