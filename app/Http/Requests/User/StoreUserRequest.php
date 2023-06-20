<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return
            [
                'username' => ['required', 'regex:/^[a-zA-Z ]+$/'],
                'email' => ['required', Rule::unique('users', 'email'), 'email'],
                'password' => ['required', 'confirmed'],
                'phone_number' => ['required'],
                'status' => ['required', Rule::in(User::STATUS)],
                'roles' => ['required', Rule::exists('roles', 'name')]
            ];
    }
}
