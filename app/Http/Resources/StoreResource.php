<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoreResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'unit' => $this->unit,
            'batch_number' => $this->batch_number,
            'unit_price' => $this->unit_price,
            'purchasing_price' => $this->purchasing_price,
            'production_date' => $this->production_date,
            'expiry_date' => $this->expiry_date,
            'quantity' => $this->quantity,
            'remaining_quantity' => $this->remaining_quantity,
            'product' => ProductResource::make($this->product),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ];
    }
}
