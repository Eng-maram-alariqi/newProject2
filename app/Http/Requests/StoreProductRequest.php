<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>['required', 'string'],
            'product_category_id'=>['required', 'exists:product_categories,id'],
            'image'=>['required', 'string'],
        ];
    }
}
