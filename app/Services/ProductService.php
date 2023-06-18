<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function create(array $data)
    {
       $product= Product::create($data);
        if (isset($data['image']))
            $product->saveMedia(['image' => $data['image']]);
        return $product;
    }
    public function update(array $data,Product $product)
    {
        $product->update($data);
        if (isset($data['image'])) {
            $product->clearMediaCollection();
            $product->saveMedia(['image' => $data['image']]);
        }
        return $product;
    }
}
