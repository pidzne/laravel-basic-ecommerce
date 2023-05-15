<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use App\Models\Orders;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class AnalyticsController extends Controller
{
    public function index() {
        // tổng doanh thu
        // $revenue = Orders::where('order_status', 3)->orWhere('payment_method', 1)->sum('order_total');
        $revenue = OrderDetails::join('orders', 'order_details.order_id', '=', 'orders.id')
        ->select('orders.order_status', 'order_details.price', 'order_details.quantity')
        ->where('order_status', 3)
        ->sum('order_details.price');

        // thống kê kho hàng
        $t = Product::count('id');  
        // dd($t);

        $totalProdByCate = DB::table('products')
        ->join('categories', 'products.cate_id', '=', 'categories.id')
        ->select('categories.cate_name as cName', 'categories.cate_image as cImg', DB::raw('count(cate_id) as total'))
        ->groupBy('cate_id')
        ->orderByDesc('total')
        ->get();
        // dd($totalProdByCate);

        $topProdHighest = DB::table('order_details')
        ->join('products', 'order_details.prod_id', '=', 'products.id')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->select('prod_id', 'prod_name as pName', 'prod_image as pImg', 'prod_original_price', 'prod_selling_price', 'color', 'size', 'price', DB::raw('sum(quantity) as total'), DB::raw('sum(price * quantity) as pTotal'))
        ->groupBy('prod_id', 'color')
        ->where('order_status', 3)
        ->orWhere('order_status', 7)
        ->orderBy('total', 'desc')
        ->limit(5)
        ->get();
        // dd($topProdHighest);

        
        

        $topProdLowest = DB::table('order_details')
        ->join('products', 'order_details.prod_id', '=', 'products.id')
        ->join('orders', 'order_details.order_id', '=', 'orders.id')
        ->select('prod_id', 'prod_name as pName', 'prod_image as pImg', 'prod_original_price', 'prod_selling_price', 'color', 'size', 'price', DB::raw('sum(quantity) as total'), DB::raw('sum(price * quantity) as pTotal'))
        ->groupBy('prod_id', 'color')
        ->where('order_status', 3)
        ->orWhere('order_status', 7)
        ->orderBy('total', 'asc')
        ->limit(5)
        ->get();

        // lấy ds sản phẩm được mua lưu tại bảng orders và order_details theo id sp
        $getListProdOrderByProdId = Orders::join('order_details','orders.id', '=', 'order_details.order_id')->select('order_details.prod_id as id')->pluck('id');
        // lấy ra các sản phẩm với điều kiện là id của sp đó không có trong ds sản phẩm được mua tại bảng orders và order_details
        $prodNotSold = Product::whereNotIn('id', $getListProdOrderByProdId)->select('prod_name', 'prod_image', 'prod_quantity', 'prod_original_price')->paginate(5);
        // dd($prodNotSold);

        $orderStatus0 = Orders::where('order_status', 0)->count('id');
        $orderStatus1 = Orders::where('order_status', 1)->count('id');
        $orderStatus2 = Orders::where('order_status', 2)->count('id');
        $orderStatus3 = Orders::where('order_status', 3)->count('id');
        $orderCancel = Orders::where('order_cancel', '>', '0')->orWhere('order_status', '5')->count('id');
        $orderOnline = Orders::where('order_status', 7)->count('id');

        return view('admin.analytics.stats', compact('revenue', 'topProdHighest', 'topProdLowest', 'totalProdByCate', 't', 'prodNotSold', 'orderStatus0', 'orderStatus1', 'orderStatus2', 'orderStatus3', 'orderCancel', 'orderOnline'));
    }

    public function googleChart() {
        $dataOrderStatus = Orders::select(['id, order_status'])->get();
        foreach ($dataOrderStatus as $key => $value) {
            # code...
        }
        
    }
}
