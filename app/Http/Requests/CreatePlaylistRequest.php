<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreatePlaylistRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required'
        ];
    }
}
