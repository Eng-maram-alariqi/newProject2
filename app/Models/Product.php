<?php

namespace App\Models;

use App\Traits\SaveMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use SoftDeletes, HasFactory, InteractsWithMedia, SaveMedia;

    protected $fillable = [
        'id', 'name', 'product_category_id', 'is_active'
    ];
    public function productCategory(): BelongsTo
    {
        return $this->belongsTo(ProductCategory::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('default')
            ->singleFile();
    }
    public function scopeSearch($query, string $search)
    {
        return $query
            ->whereLike(['name'], $search);
    }

    public function scopeFilter($query, string $status)
    {
        return $query
            ->where('product_category_id', $status);
    }
    public function changeStatus()
    {
        $this->is_active = !$this->is_active;
        $this->save();
    }
    public function stores(): HasMany
    {
        return $this->hasMany(Store::class);
    }
}
