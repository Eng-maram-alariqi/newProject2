<?php

namespace App\Http\Requests;

use App\Enums\ProductUnitEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        return [
            'unit' => ['required', 'string', Rule::in(array_column(ProductUnitEnum::cases(), 'value'))],
            'unit_price' => ['required', 'numeric', 'min:0'],
            'batch_number' => ['required', 'numeric','unique:stores,batch_number'],
            'purchasing_price' => ['required', 'numeric', 'min:0'],
            'production_date' => ['required', 'date_format:Y-m-d'],
            'expiry_date' => ['required', 'date_format:Y-m-d', 'after_or_equal:production_date'],
            'quantity' => ['required', 'integer', 'min:0'],
            'product_id' => ['required', 'exists:products,id']
        ];
    }
}
