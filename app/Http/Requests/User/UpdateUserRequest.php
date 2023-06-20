<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => ['required', 'regex:/^[a-zA-Z ]+$/'],
            'email' => ['required', Rule::unique('users', 'email')->ignore($this->user->id), 'email'],
            'password' => ['nullable', 'confirmed'],
            'phone_number' => ['required'],
            'status' => ['nullable', Rule::in(User::STATUS)],
            'roles' => ['required', Rule::exists('roles', 'name')],
        ];
    }
}
