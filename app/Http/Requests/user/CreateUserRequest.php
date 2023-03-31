<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'              =>      'required|string',
            'email'             =>      'required|email|max:50|unique:users,email',
            'username'          =>      'required|string|max:15',
            'password'          =>      'required|max:50'
        ];
    }
}