<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Services\OrderService;
use Yajra\DataTables\DataTables;

class OrderController extends Controller
{
    public function __construct(public OrderService $orderService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = Order::query();
        return DataTables::of($model)->toJson();

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        $order = $this->orderService->create($request->validated());
        return OrderResource::make($order);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return OrderResource::make($order);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        $order = $this->orderService->update($request->validated(), $order);
        return OrderResource::make($order);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return response()->noContent();
    }
}
