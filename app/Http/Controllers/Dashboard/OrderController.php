<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Order;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Exception;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('dashboards');
    }
    public function index(Request $request)
    {
        $limit = 10;
        if ($request->session()->has('limit')) {
            $limit = $request->session()->get('limit');
        }
        //        if($request->session()->has('sort-product')){
        //            $sort = $request->session()->get('sort-product');
        //            $sorts = $request->session()->get('sort-products');
        //
        //            $product = Products::orderBy($sort, $sorts)->paginate($limit);
        //        }else{
        //            $product = Products::orderBy('name', 'desc')->paginate($limit);
        //        }
        //        if($request->ajax){
        //            return view('dashboards.ajax.body-table-product', ['lists'=>$product]);
        //        }
        $order = Order::orderBy('id', 'desc')->with('user')->paginate($limit);
        // dd($order);
        return view('dashboards.order.index', [
            'title' => 'Đơn Hàng',
            'lists' => $order
        ]);
    }
    public function post_delete($id)
    {
        try {
            Order::find($id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success'
            ], 200);
        } catch (Exception $exception) {
            Log::error('Message' . $exception->getMessage());
            return response()->json([
                'code' => 500,
                'message' => 'fail'
            ], 500);
        }
    }
    public function post_view($id)
    {

        $order = Order::find($id);

        // if ($request->id) {
        //     $category = Categories::find($id);
        //     if ($category)
        //         return view('dashboards.category.view-category', ['title' => 'Danh sách danh mục', 'category' => $category, 'categories' => Categories::orderBy('name', 'desc')->get()]);
        //     return redirect(route('category'));
        // }
        // return redirect(route('category'));
    }
}
