<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'=>['string'],
            'product_category_id'=>['exists:product_categories,id'],
            'image'=>['string'],

        ];
    }
}
