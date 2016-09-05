<?php

namespace App\Http\Requests;

use App\Models\User;
use App\Http\Requests\Request;

class UpdateUserRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules(User $user)
    {
        return [
            'name'      => 'required',
            'username'  => "alpha_num|unique:users,username,{$user->username}",
            'email'     => 'required|email|different:name',
            'password'  => 'min:6|same:password_confirm',
            'image'     => 'image',
            'telephone' => 'numeric'
        ];
    }
}