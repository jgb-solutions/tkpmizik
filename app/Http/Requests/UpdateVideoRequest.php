<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateVideoRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
      return [
         // 'name'   => 'min:6',
         'image' => 'image'
      ];
    }
}
