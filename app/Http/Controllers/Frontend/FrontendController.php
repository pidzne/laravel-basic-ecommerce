<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Http\Controllers\Controller;
use App\Models\Slide;

class FrontendController extends Controller
{
    public function index() {
        $category = Category::where('cate_status', '0')->get();
        $product = Product::where('prod_status', '0')->orderBy('created_at', 'desc')->limit(10)->get();
        $slider = Slide::where('slider_status', '0')->get();
        $prodByTopSell = Product::where('prod_status', '0')->where('prod_top_selling', '1')->orderBy('prod_selling_price', 'DESC')->limit(2)->get();
        $prodByViews = Product::where('prod_status', '0')->orderBy('prod_views', 'desc')->limit(5)->get();
        $prodByPromo = Product::where('prod_status', '0')->where('prod_selling_price', '>=', '1')->orderBy('prod_selling_price', 'DESC')->limit(10)->get();
        return view('frontend.index')
        ->with('category', $category)
        ->with('product', $product)
        ->with('slider', $slider)
        ->with('prodByTopSell', $prodByTopSell)
        ->with('prodByViews', $prodByViews)
        ->with('prodByPromo', $prodByPromo);
    }

    public function getAboutUs() {
        return view('frontend.about-us');
    }

    public function getFaq() {
        return view('frontend.faq');
    }

    public function getSuccessOrders() { 
        return view('frontend.success-order');
    }

    public function deleteProdCart($rowId) {
        Cart::remove($rowId);
        return back()->with('status', 'Xóa sản phẩm thành công!');
    }
}
