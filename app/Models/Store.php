<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Store extends Model
{
    use HasFactory;
    protected $fillable = [
        'id', 'unit', 'unit_price', 'purchasing_price','batch_number', 'production_date', 'expiry_date', 'quantity', 'remaining_quantity', 'product_id', 'is_active'
    ];
    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
    public function changeStatus()
    {
        $this->is_active = !$this->is_active;
        $this->save();
    }
}
