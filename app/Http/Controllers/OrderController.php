<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateRequest;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $orders = Order::all();

        return view('order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('order.show', compact('order'));
    }

    public function create(Product $product)
    {
        return view('order.create', compact('product'));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Order::create($data);

        return redirect()->route('order.index');
    }

    public function update(Order $order, UpdateRequest $request)
    {
        $data = $request->validated();
        $order->update($data);
        $order->refresh();

        return redirect()->route('order.index', $order->id);
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()->route('order.index');
    }
}
