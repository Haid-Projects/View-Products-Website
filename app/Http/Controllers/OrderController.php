<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // View all orders for the authenticated user
    public function index()
    {
        $orders = Order::where('user_id', auth()->id())->get();
        return view('orders.index', compact('orders'));
    }

    // Show a single order
    public function show($orderId)
    {
        $order = Order::with('orderItems')->where('id', $orderId)->where('user_id', auth()->id())->firstOrFail();
        return view('orders.show', compact('order'));
    }
}
