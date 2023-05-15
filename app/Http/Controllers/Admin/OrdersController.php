<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function index() {
        $ordersInfo = Orders::join('users', 'orders.user_id', '=', 'users.id')
        ->select('orders.id as id', 'orders.po_number as ordersNo', 'orders.order_status as oStatus' , 'orders.order_date as ordersDate', 'orders.order_cancel as oCancel', 'orders.payment_method', 'users.name as userName', 'users.id as userId')
        ->orderBy('orders.id', 'desc')
        // ->get();
        ->paginate(5);
        // dd($ordersInfo);
        return view('admin.orders.list-orders')->with('ordersInfo', $ordersInfo);
    }

    public function show($id) {
        // chi tiết đơn hàng
        $orderDetails = Orders::join('users', 'orders.user_id', '=', 'users.id')
        // ->join('order_details', 'orders.id', '=', 'order_details.id')
        ->select('orders.*', 'users.name as uName', 'users.email as uEmail', 'users.phone as uPhone')
        ->where('orders.id', '=', $id)
        ->first();
        // dd($orderDetails);

        // sản phẩm
         $ordersProduct =  DB::table('orders')
        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
        ->join('products', 'order_details.prod_id', '=', 'products.id')
        // ->where('order_id','=', $id)
        ->select('orders.*', 
                'order_details.*', 
                'products.prod_image as pImg', 
                'products.prod_name as pName',
                'products.prod_original_price',
                'products.prod_selling_price')
        ->where('order_id','=', $id)
        ->get();
        // dd($ordersProduct);
        // ->paginate(5);

        // tổng tiền
        $ordersPrice =  DB::table('orders')
        ->join('order_details', 'orders.id', '=', 'order_details.order_id')
        ->where('order_id','=', $id)
        // ->select('orders.order_total as oTotal') 
        ->select('order_details.price', 'order_details.quantity')       
        ->sum('order_details.price');
        // dd($ordersPrice);
        return view('admin.orders.detail-orders')
        ->with('orderDetails', $orderDetails)
        ->with('ordersProduct', $ordersProduct)
        ->with('ordersPrice', $ordersPrice);
    }

    public function edit($id) {
        $orders = Orders::findOrFail($id);
        return view('admin.orders.edit-order')->with('orders', $orders);
    }

    public function update(Request $request, $id) {
        // $validatedData = $request->validate([
        //     'order_status' => 'required',
        // ], [
        //     'order_status.required' => 'Không được để trống *',
        // ]);
        $orders = Orders::findOrFail($id);
        $orders->order_status = $request->input('order_status');
        $orders->update();
        return redirect()->route('order_admin.index')->with('status', 'Cập nhật trạng thái đơn hàng thành công!');
    }

    public function destroy($id) {
        $orders = Orders::findOrFail($id);
        $orders->delete();
        return redirect()->route('order_admin.index')->with('status', 'Xóa đơn hàng thành công!');
    }

    public function multipleSearchOrder(Request $request) { 
        // tìm theo trạng thái
        if ($request->filled('searchByStatus')) {
            $data = Orders::join('users', 'orders.user_id', '=', 'users.id')
            ->select('orders.id as id', 'orders.po_number as ordersNo', 'orders.order_status as oStatus' , 'orders.order_date as ordersDate', 'orders.payment_method', 'users.name as userName', 'users.id as userId')
            ->where('order_status', $request->searchByStatus)
            ->orderBy('orders.id', 'desc')
            ->paginate(5);
            return view('admin.orders.list-orders')->with('ordersInfo', $data);
        } 
        else {
            return redirect()->route('order_admin.index');
        }
    }
}

