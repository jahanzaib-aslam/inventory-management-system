<?php

namespace App\Http\Requests\user;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'id'            =>      'required|exists:users,id',
            'name'          =>      'required|sometimes',
            'email'         =>      'required|email|sometimes|unique:users,email',
            'password'      =>      'required|sometimes'
        ];
    }
}
