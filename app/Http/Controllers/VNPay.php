<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VNPay extends Controller
{
    public function create(Request $request)
    {

        $vnp_TmnCode = env('VNP_CODE');
        $vnp_HashSecret = env('VNP_HASH');
        $vnp_Url = env('VNP_URL');
        $vnp_Returnurl = env('VNP_RETURN_URL');

        $vnp_TxnRef = $request->id;
        $vnp_OrderInfo = $request->info;
        $vnp_OrderType = "100000";
        $vnp_Amount = $request->total * 100;
        $vnp_Locale = "vn";
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = array(
            "vnp_Version" => "2.0.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . $key . "=" . $value;
            } else {
                $hashdata .= $key . "=" . $value;
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            // $vnpSecureHash = md5($vnp_HashSecret . $hashdata);
            $vnpSecureHash = hash('sha256', $vnp_HashSecret . $hashdata);
            $vnp_Url .= 'vnp_SecureHashType=SHA256&vnp_SecureHash=' . $vnpSecureHash;
        }
        return redirect($vnp_Url);
    }

    public function return(Request $request)
    {
        $url = session('url_prev','/');
        session()->forget('url_prev');
        if ($request->vnp_ResponseCode == "00") {
            if($request->vnp_TxnRef){
                $order = Order::find($request->vnp_TxnRef);
                $order->status = true;
                $order->save();
                $payment = new Payment();
                $payment->order_id = $request->vnp_TxnRef;
                $payment->user_id = Auth::user()->id;
                $payment->payment = 'vnpay';
                $payment->info = $request->vnp_TransactionNo.' - '.$request->vnp_OrderInfo;
                $payment->price = (int)($request->vnp_Amount/100);
                $payment->status = true;
                $payment->save();
            }
            reset_cart();
            return redirect()->route('show-order', ['id' => $request->vnp_TxnRef])->with('success', 'Đã thanh toán đơn hàng thành công!');
        }else{
            return redirect($url)->with('error', ['Đơn hàng chưa được thanh toán!']);
        }
        return redirect($url)->with('error', ['Lỗi trong quá trình thanh toán đơn hàng']);
    }
}
