<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index() {
        $wCount = Wishlist::count();
        if(isset(Auth::user()->id)){
            $show = Wishlist::where('user_id','=',Auth::user()->id)->get();
            return view('frontend.wishlist')->with(compact('show', 'wCount'));
        }else{
            return view('frontend.wishlist')->with(compact('show', 'wCount'));
        }
    }

    public function add($id){   
        $status = Wishlist::where('user_id', '=', Auth::user()->id)->where('prod_id', '=', $id)->first();
        if(isset($status->user_id) and isset($status->prod_id)) {
            return back()->with('info', 'Sản phẩm đã tồn tại trong danh sách yêu thích!');
        }
        else {
            $wishlist = new Wishlist();
            $wishlist->prod_id = $id;
            $wishlist->user_id = Auth::user()->id;
            $wishlist->save();
            return back()->with('status', 'Thêm vào danh sách yêu thích thành công!');
        }
    }

    public function delete($id) {
        $product = Wishlist::findOrFail($id);
        $product->delete();
        return back()->with('status', 'Xóa khỏi danh sách yêu thích thành công!');
    }
}
