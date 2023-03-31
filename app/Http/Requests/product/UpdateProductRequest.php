<?php

namespace App\Http\Requests\product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'id'                    =>      'required|exists:products,id',
            'name'                  =>      'required|string|sometimes',
            'productImage'          =>      'required|file|mimes:png,jpg|sometimes',
            'description'           =>      'required|max:5000|sometimes',
            'product_type_id'       =>      'required|exists:product_types,id|sometimes',
            'purchase_type_id'      =>      'required|exists:purchase_type,id|sometimes'
        ];
    }
}
