<?php

namespace App\Http\Requests;

use App\Models\Music;
use App\Http\Requests\Request;

class UpdateMusicRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules(Music $music)
    {
        $rules = [];

        if ($music->price == 'paid') {
            $rules['code'] = 'required|min:8';
        }

        $rules['image'] = 'image';
        return $rules;
    }
}
