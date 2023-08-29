<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Spatie\Analytics\Analytics;
use App\Http\Controllers\Controller;
use App\Models\Products;

class DashboardsControllerAdmin extends Controller
{
    public function index()
    {
        $tatol = Order::all();
        $total = 0;
        foreach ($tatol as $item) {
            $total = $total + $item->total;
        }
        $cart = Cart::all();
        $count_cart = count($cart);
        $productCount = Products::all()->count();
        return view('dashboards.dashboard', compact('total', 'count_cart', 'productCount'));
    }
}
