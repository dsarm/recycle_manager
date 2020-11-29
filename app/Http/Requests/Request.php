<?php

namespace Recycle\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    public function response(array $errors)
    {
        $errorString = '';

        foreach ($errors as $error)
        {
            $errorString = $errorString . '- ' . $error[0] . '\n';
        }

        return redirect()->back()->withInput()->withErrors($errorString);
    }
}
