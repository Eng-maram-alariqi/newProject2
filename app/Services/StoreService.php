<?php

namespace App\Services;

use App\Models\Store;

class StoreService
{
    public function create(array $data)
    {
       $store= Store::create($data);
        return $store;
    }
    public function update(array $data,Store $store)
    {
        $store->update($data);
        return $store;
    }
}
