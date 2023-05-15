<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index() {
        $userId = Auth::user()->id;
        $ordersInfo = Orders::where('user_id', $userId)
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.id as id', 'orders.po_number as ordersNo', 'orders.order_status as oStatus' , 'orders.order_date as ordersDate', 'users.name as userName', 'users.id as userId')
        ->orderBy('orders.id', 'desc')
        ->paginate(3);
        // dd($ordersInfo);
        return view('frontend.my-orders')->with('ordersInfo', $ordersInfo);
    }

    public function detail($id) {
        // chi tiết đơn hàng
        $orderDetails = Orders::join('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.*', 'users.name as uName', 'users.email as uEmail', 'users.phone as uPhone')
        ->where('orders.id', '=', $id)
        ->first();
        // dd($orderDetails);
        
        // sản phẩm
         $ordersProduct =  DB::table('orders')
        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
        ->join('products', 'order_details.prod_id', '=', 'products.id')
        ->select('orders.*', 
                'order_details.*', 
                'products.prod_image as pImg', 
                'products.prod_name as pName', 
                'products.prod_original_price',
                'products.prod_selling_price')
        ->where('order_id','=', $id)
        ->get();

        // tổng tiền
        $ordersPrice =  DB::table('orders')
        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
        ->where('order_id','=', $id)
        // ->select('orders.order_total as oTotal') 
        ->select('order_details.price', 'order_details.quantity')       
        ->sum('order_details.price');
        // dd($ordersPrice);
        
        return view('frontend.detail-orders')
        ->with('orderDetails', $orderDetails)
        ->with('ordersProduct', $ordersProduct)
        ->with('ordersPrice', $ordersPrice);
    }

    public function edit($id) {
        $orders = Orders::findOrFail($id);
        return view('frontend.cancel-orders')->with('orders', $orders);
    }

    public function cancelOrders(Request $request, $id) {
        $validatedData = $request->validate([
            'order_cancel' => 'required'
        ], [
            'order_cancel.required' => 'Không được để trống *'
        ]);
        try {
            $orders = Orders::findOrFail($id);
            $orders->order_cancel = $request->input('order_cancel');
            $orders->order_status = $request->input('order_status');
            $orders->update();
            return redirect('my-orders')->with('status', 'Hủy đơn hàng thành công!');
        } catch (Exception $err) {
           $err->getMessage(); // nếu có lỗi xảy ra thì hiển thị lỗi
        }
    }
}
