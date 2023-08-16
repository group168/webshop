<?php

namespace App\Http\Controllers\dashboard;

use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Spatie\Analytics\Period;
use Spatie\Analytics\Analytics;
use App\Http\Controllers\Controller;

class DashboardsControllerAdmin extends Controller
{
    public function index()
    {
        $tatol = Order::all();
        $total = 0;
        foreach ($tatol as $item) {
            $total = $total + $item->total;
        }
        //  dd($total);
        $cart = Cart::all();
        $count_cart = count($cart);
        // foreach ($a as $item) {
        //     dd($item);
        // }
        // dd($a);
        // Create an instance of the Analytics class
        return view('dashboards.dashboard', compact('total', 'count_cart'));
    }
}
