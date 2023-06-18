<?php

namespace App\Http\Requests;

use App\Enums\ProductUnitEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'unit' => ['string', Rule::in(array_column(ProductUnitEnum::cases(), 'value'))],
            'unit_price' => ['numeric', 'min:0'],
            'batch_number' => ['required', 'numeric',Rule::unique('stores', 'batch_number')->ignore(request()->store->id)],
            'purchasing_price' => ['numeric', 'min:0'],
            'production_date' => ['date_format:Y-m-d'],
            'expiry_date' => ['date_format:Y-m-d', 'after_or_equal:production_date'],
            'quantity' => ['integer', 'min:0'],
            'remaining_quantity' => ['integer', 'min:0', 'max:quantity'],
            'product_id' => ['exists:products,id']
        ];
    }
}
