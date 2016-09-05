<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreVideoRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'  => 'required',
            'artist'    => 'required',
            'url'   => 'required|url|min:38',
        ];
    }
}
