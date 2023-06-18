<?php

namespace App\Services;

use App\Models\Order;

class OrderService
{
    public function create(array $data)
    {
        $order= Order::create($data);
        return $order;
    }
    public function update(array $data,Order $order)
    {
        $order->update($data);
        return $order;
    }
}
