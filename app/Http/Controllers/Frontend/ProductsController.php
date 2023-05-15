<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Album;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\Comment;
use App\Models\Category;
use App\Models\Color;
use App\Models\DetailInfo;
use App\Models\Size;

class ProductsController extends Controller
{
    // truyền view xuống cho tất cả các blade template
    public function __construct(){
        // $wCount = Wishlist::count();
        $category = Category::all();
        $brand = Brand::all();
        // view()->share(compact('wCount', 'category', 'brand'));
        view()->share(compact('category', 'brand'));
    }

    public function productDetail($id) {   
        // sp chi tiết
        $prod_detail =  Product::findOrFail($id);
        // sp cùng loại
        $prod_related =  Product::where('cate_id', '=', $prod_detail->cate_id)->where('id', '!=', $id)->limit(5)->get();
        // album ảnh thumbnail
        $gallery = Album::where('album_status', '=', '0')->select('albums.album_image as aImg')->where('prod_id', '=', $id)->get();
        // show bình luận
        $showCmt1 = Comment::where('status', '=', '0')->where('prod_id', '=', $prod_detail->id)->get();
        // show bình luận - phân trang
        $showCmt = Comment::join('users', 'comments.user_id', 'users.id')
        ->select('comments.*', 'users.name as userName', 'users.image as userImg')
        ->where('status', '=', '0')
        ->where('prod_id', '=', $prod_detail->id)
        ->orderBy('id', 'desc')
        ->paginate(3);
       
        // đếm đánh giá 
        $reviewCount = Comment::where('prod_id', '=', $prod_detail->id)->count();
        $total5Stars = Comment::where('status', '0')->where('prod_id', '=', $prod_detail->id)->where('rating', '=', '5')->count();
        $total4Stars = Comment::where('status', '0')->where('prod_id', '=', $prod_detail->id)->where('rating', '=', '4')->count();
        $total3Stars = Comment::where('status', '0')->where('prod_id', '=', $prod_detail->id)->where('rating', '=', '3')->count();
        $total2Stars = Comment::where('status', '0')->where('prod_id', '=', $prod_detail->id)->where('rating', '=', '2')->count();
        $total1Star = Comment::where('status', '0')->where('prod_id', '=', $prod_detail->id)->where('rating', '=', '1')->count();
        
        // kiểm tra đánh giá sao
        $checkCmt = count($showCmt1);
        if ($checkCmt > 0) {
            // tổng sao = tổng lượt sao / số lượt bình luận
            $sumRatings = round(($total5Stars * 5 + $total4Stars * 4 + $total3Stars * 3 + $total2Stars * 2 + $total1Star * 1) / count($showCmt1));
        } else {
            $sumRatings = 0;
        }

        // đếm số lượt xem sản phẩm
        $countViews = Product::findOrFail($id);
        $countViews->prod_views = $countViews->prod_views + 1;
        $countViews->save();

        // màu sản phẩm
        $prodColor = Color::where('prod_id', $id)->get();
        // kích cỡ sản phẩm
        $prodSize = Size::where('prod_id', $id)->get();

        // thông tin chi tiết sản phẩm
        $prodInfo = DetailInfo::where('prod_id', $id)->get();
        return view('frontend.product-detail', compact('prod_detail', 'prod_related', 'gallery', 'showCmt', 'showCmt1', 'countViews', 'sumRatings', 'reviewCount', 'prodColor', 'prodSize', 'prodInfo'));
    }

    public function addCmt(Request $request){
        $validatedData = $request->validate([
            'prod_rating' => 'required',
            'content' => 'required',
        ], [
            'prod_rating.required' => 'Không được để trống *',
            'content.required' => 'Không được để trống *',
        ]);
       
        $comment = new Comment;
        $comment->user_id = Auth::user()->id;
        $comment->prod_id = $request->prod_id;
        $comment->content = $request -> content;
        $comment->rating = $request->prod_rating;
        $comment->status = 0;
        $comment->save();
        return back()->with('status', 'Gửi bình luận thành công!');
    }

    public function productByCategory($id) { 
        $isExists = Category::where('id', '=', $id)->exists();
        if ($isExists) {
            $category = Category::where('id', '=', $id)->first();
            $product = Product::where('cate_id', $category->id)->where('prod_status', '0')->orderBy('created_at', 'desc')->limit(10)->get();
            return view('frontend.product-cate', compact('category', 'product'));
        } else {
            return back()->with('info', 'Không tìm thấy sản phẩm theo danh mục');
        }
    }

    public function allProducts(Request $request) {
        $allProducts = Product::all();
        return view('frontend.products', compact('allProducts'));
    }

    // lọc danh mục
    public function filterByCate(Request $request) {
        $category = Category::all();
        if ($request->get('filterCate')) {
            $checked = $_GET['filterCate'];
            $allProducts = Product::whereIn('cate_id', $checked)->where('prod_status', '0')->orderBy('created_at', 'desc')->get();
        } else {
            $allProducts = Product::all();
        }
        return view('frontend.products', compact('category', 'allProducts'));
    }

    // lọc thương hiệu
    public function filterByBrand(Request $request) {
        $brand = Brand::all();
        if ($request->get('filterBrand')) {
            $checked = $_GET['filterBrand'];
            $allProducts = Product::whereIn('brand_id', $checked)->where('prod_status', '0')->orderBy('created_at', 'desc')->get();
        } else {
            $allProducts = Product::all();
        }
        return view('frontend.products', compact('brand', 'allProducts'));
    }

    //bộ lọc view
    public function filterByView() {
        $keywords = $_GET['viewSelected'];
        $allProducts = Product::all();
        if ($keywords == 1) {
            $allProducts = Product::orderBy('products.prod_views', 'desc')->get();
            return view('frontend.products', compact('allProducts'));
        } else if ($keywords == 2) {
            $allProducts = Product::orderBy('products.prod_views', 'asc')->get();
            return view('frontend.products', compact('allProducts'));
        } else {
            $allProducts = Product::all();
            return view('frontend.products', compact('allProducts', 'keywords'));
        }
    }

    //bộ lọc sao
    public function filterByRating() {
        $keywords = $_GET['ratingSelected'];
        $allProducts = Product::all();
        if ($keywords == 1) {
            $allProducts = DB::table('comments')
            ->select('products.*', 'prod_id', DB::raw('SUM(rating) as total'))
            ->join('products', 'comments.prod_id', '=', 'products.id')
            ->groupBy('comments.prod_id')
            ->orderBy('total', 'desc')
            ->get();
            return view('frontend.products', compact('allProducts'));
        } else if ($keywords == 2) {
            $allProducts = DB::table('comments')
            ->select('products.*', 'prod_id', DB::raw('SUM(rating) as total'))
            ->join('products', 'comments.prod_id', '=', 'products.id')
            ->groupBy('comments.prod_id')
            ->orderBy('total', 'asc')
            ->get();
            return view('frontend.products', compact('allProducts'));
        } else {
            $allProducts = Product::all();
            return view('frontend.products', compact('allProducts'));
        }
    }

    //bộ lọc giá
    public function filterByPrice() {
        $keywords = $_GET['priceSelected'];
        $allProducts = Product::all();
        if ($keywords == 1) {
            $allProducts = Product::orderBy('products.prod_original_price', 'desc')->get();
            return view('frontend.products', compact('allProducts'));
        } else if ($keywords == 2) {
            $allProducts = Product::orderBy('products.prod_original_price', 'asc')->get();
            return view('frontend.products', compact('allProducts'));
        } else {
            $allProducts = Product::all();
            return view('frontend.products', compact('allProducts'));
        }
    }   
}
