<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        // Get orders created by the authenticated user
        $ordersBy = Order::where('created_by', auth()->user()->id)->get();

        // Get all orders with details
        $orders = Order::with('order_items.product.brand', 'order_items.product.category')
                       ->where('created_by', auth()->user()->id)
                       ->get();

        return Inertia::render('User/Dashboard', ['orders' => $orders, 'ordersBy' => $ordersBy]);
    }
}
