<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
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
            'name'                  =>      'required|string',
            'productImage'          =>      'required|file|mimes:png,jpg',
            'description'           =>      'required|max:5000',
            'product_type_id'       =>      'required|exists:product_types,id',
            'purchase_type_id'      =>      'required|exists:purchase_type,id'
        ];
    }
}