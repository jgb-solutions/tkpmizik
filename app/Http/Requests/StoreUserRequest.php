<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreUserRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'  => 'required',
            'email' => 'required|email|different:name|unique:users',
            'password'  => 'required|same:password_confirm|min:6',
            'telephone' => 'numeric'
        ];
    }
}
