<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class VNPay extends Controller
{
    public function create($productId)
    {
        // Tìm thông tin sản phẩm dựa vào $productId
        $product = Order::find($productId);
        // Tạo mã QR dựa trên thông tin sản phẩm

        $qrCode = QrCode::size(350)->generate($product->sub_total); // Ví dụ: Sử dụng tên sản phẩm
        // dd($qrCode);
        return view('pages.vnp', compact('product', 'qrCode'));
    }
}
