<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreMusicRequest extends Request
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
            // 'music'  => 'required|mimes:mpga|max:64000000',
            'music'     => 'required|max:64000000',
            'image' => 'required|image',
        ];
    }
}