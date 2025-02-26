<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Order\StoreRequest;
use App\Http\Requests\API\Order\UpdateRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::all();

        return OrderResource::collection($orders);
    }

    public function show(Order $order)
    {
        return OrderResource::make($order);
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $order = Order::create($data);

        return OrderResource::make($order);
    }

    public function update(Order $order, UpdateRequest $request)
    {
        $data = $request->validated();
        $order->update($data);
        $order->refresh();

        return OrderResource::make($order);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return response()->noContent();
    }
}
